<?php
/**
 * Shopware 4
 * Copyright © shopware AG
 *
 * According to our dual licensing model, this program can be used either
 * under the terms of the GNU Affero General Public License, version 3,
 * or under a proprietary license.
 *
 * The texts of the GNU Affero General Public License with an additional
 * permission and of our proprietary license can be found at and
 * in the LICENSE file you have received along with this program.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * "Shopware" is a registered trademark of shopware AG.
 * The licensing of the program under the AGPLv3 does not imply a
 * trademark license. Therefore any rights, title and interest in
 * our trademarks remain entirely with us.
 */

namespace Shopware\SwagTrustedShopsExcellence\Components;

use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\TransactionRequiredException;
use Enlight_Components_Db_Adapter_Pdo_Mysql;
use Exception;
use Shopware\Components\Api\Exception\NotFoundException;
use Shopware\Components\Api\Exception\ParameterMissingException;
use Shopware\Components\Api\Exception\ValidationException;
use Shopware\Components\Api\Resource\Article;
use Shopware\Components\Api\Resource\Translation;
use Shopware\Components\Model\ModelManager;
use Shopware\Components\Model\QueryBuilder;
use Shopware\Models\Article\Article as ArticleModel;
use Shopware\Models\Article\Detail;
use Shopware\Models\Shop\Repository;
use Shopware\Models\Tax\Tax;
use Shopware_Components_Config;
use sOrder;
use Symfony\Component\Validator\ConstraintViolation;
use Zend_Cache_Core;

/**
 * Shopware SwagTrustedShopsExcellence Plugin - TrustedShops Component
 *
 * @category  Shopware
 * @package   Shopware\Plugins\SwagTrustedShopsExcellence\Components
 * @copyright Copyright (c) shopware AG (http://www.shopware.com)
 */
class SoapApi
{
    /**
     * @var ModelManager
     */
    private $em;

    /**
     * @var Shopware_Components_Config
     */
    private $config;

    /**
     * @var Config
     */
    private $tsConfig;

    /**
     * @var Enlight_Components_Db_Adapter_Pdo_Mysql $db
     */
    private $db;

    /**
     * initialises $em as ModelManager
     * sets soap settings
     *
     * @param ModelManager $em
     * @param Shopware_Components_Config $config
     * @param Config $tsConfig
     */
    public function __construct(ModelManager $em, Shopware_Components_Config $config, Config $tsConfig)
    {
        ini_set('soap.wsdl_cache_enabled', 1);
        $this->em = $em;
        $this->config = $config;
        $this->tsConfig = $tsConfig;
        $this->db = Shopware()->Container()->get('db');
    }

    /**
     * gets the Trusted Shops Data via Json
     * data is used for connection test and importing TS articles
     *
     * @param $shopId
     * @return mixed|string
     */
    public function getTrustedShopsData($shopId)
    {
        $settings = $this->tsConfig->getSettings($shopId);

        if (empty($settings['trustedShopsId'])) {
            return 'noTsId';
        }
        if (empty($settings['trustedShopsUser'])) {
            return 'noTsUser';
        }
        if (empty($settings['trustedShopsPassword'])) {
            return 'noTsPassword';
        }

        $ts_url = $settings['trustedShopsTestSystem'] ? 'qa' : 'www';

        $json = file_get_contents(
            'http://' . $ts_url . '.trustedshops.com/ts_services/checkShopStatus/'
            . $settings['trustedShopsId'] . '/'
            . $settings['trustedShopsUser'] . '/'
            . $settings['trustedShopsPassword']
        );

        $data = json_decode($json);

        if ($data->status == 'SUCCESS') {
            return $data->result;
        } else {
            return $data;
        }
    }

    /**
     * checks if the TS-ID has Excellence service
     * setting is cached for one day
     *
     * @param $shopId
     * @param $onConfigSave
     * @return bool
     */
    public function checkCertificateTypeIfExcellence($shopId, $onConfigSave)
    {
        $id = 'SwagTrustedShopsExcellence_CertificateTypeCheck';
        /* @var Zend_Cache_Core $cache */
        $cache = Shopware()->Cache();
        $tsData = $this->getTrustedShopsData($shopId);

        if ($onConfigSave) {
            $cachedContent = '';
        } else {
            // load from cache
            $cachedContent = $cache->load($id);
        }

        // If cache is empty, perform request
        if ($cachedContent !== 'EXCELLENCE') {
            $content = $tsData->certificateType;
            // If content was not loaded from cache, save it
            $cache->save($content, $id, array('Shopware_Plugin'), 86400);
        } else {
            $content = $cachedContent;
        }

        if ($content === 'EXCELLENCE' && $tsData->wsLoginOK) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * This function updates the buyer protection article in the database
     *
     * @param $shopId
     * @return string | errors
     * @throws ORMException
     * @throws OptimisticLockException
     * @throws TransactionRequiredException
     * @throws Exception
     * @throws NotFoundException
     * @throws ParameterMissingException
     */
    public function updateTrustedShopsProtectionItems($shopId)
    {
        $result = $this->getTrustedShopsData($shopId);

        if (!$result->protectionItems || !$result->wsLoginOK) {
            return $result;
        } else {
            $tsProducts = $result->protectionItems;
        }

        if(!$tax = $this->getTax()){
            return $tax;
        }

        foreach ($tsProducts as $product) {
            $articleData = $this->createArticleData($tax, $product);
            try {
                $this->createArticle($articleData);
            } catch (ValidationException $ve) {
                $this->throwViolationException($ve);
            }
        }

        return 'SUCCESS';
    }

    /**
     * create the TS-Article
     *
     * @param array $articleData
     * @throws NotFoundException
     * @throws ParameterMissingException
     * @throws ValidationException
     */
    private function createArticle(array $articleData)
    {
        /* @var Article $articleResource */
        $articleResource = new Article();
        $articleResource->setManager($this->em);

        $articleDetailRepostiory = $this->em->getRepository('Shopware\Models\Article\Detail');
        $articleDetailModel = $articleDetailRepostiory->findOneBy(
            array('number' => $articleData['mainDetail']['number'])
        );
        /* @var ArticleModel $articleModel */
        $articleModel = null;
        if ($articleDetailModel) {
            if($this->checkIfArticleExists($articleDetailModel)) {
                $articleModel = $articleDetailModel->getArticle();
            } else {
                $this->deleteDetail($articleDetailModel);
            }
        }

        if ($articleModel) {
            $articleResource->update($articleModel->getId(), $articleData);
            $this->createArticleTranslation($articleModel, true);
        } else {
            $newArticle = $articleResource->create($articleData);
            $this->createArticleTranslation($newArticle);
        }
    }

    /**
     * Checks if the article realy exists
     *
     * @param Detail $articleDetailModel
     * @return bool
     */
    private function checkIfArticleExists(Detail $articleDetailModel)
    {
        $articleId = $articleDetailModel->getArticle()->getId();
        $sql = "SELECT id FROM s_articles WHERE id = :articleId";

        $result = $this->db->fetchOne($sql, array('articleId' => $articleId));
        if(!empty($result)) {
            return true;
        }
        return false;
    }

    /**
     * @param Detail $articleDetailModel
     * @return bool
     */
    private function deleteDetail(Detail $articleDetailModel)
    {
        $ordernumber = $articleDetailModel->getNumber();
        $sql = "DELETE FROM s_articles_details WHERE ordernumber = :num";
        try {
            $this->db->query($sql, array('num' => $ordernumber));
        } catch(\Exception $ex){
            return false;
        }
        return true;
    }

    /**
     * Create the TS-Article translation
     *
     * @param ArticleModel $articleModel
     * @param bool $isUpdate
     * @throws ParameterMissingException
     */
    private function createArticleTranslation(ArticleModel $articleModel, $isUpdate = false)
    {
        /* @var Translation $translationResource */
        $translationResource = new Translation();
        $translationResource->setManager($this->em);

        if($isUpdate){
            $translationResource->update($articleModel->getId(), $this->getTranslationArray());
        } else {
            $translationResource->create(array_merge(array('key' => $articleModel->getId()), $this->getTranslationArray()));
        }
    }

    /**
     * @param ValidationException $ex
     * @throws Exception
     */
    private function throwViolationException(ValidationException $ex)
    {
        $errors = array();
        /** @var ConstraintViolation $violation */
        foreach ($ex->getViolations() as $violation) {
            $errors[] = sprintf('%s: %s', $violation->getPropertyPath(), $violation->getMessage());
        }
        throw new Exception(implode(', ', $errors));
    }

    /**
     * Calculate the Price
     *
     * @param Tax $tax
     * @param $product
     * @return float
     */
    private function calculatePrice(Tax $tax, $product)
    {
        $price = empty($product->netPrice) ? 0.00000001 : $product->netPrice;
        $price *= ($tax->getTax() + 100) / 100;
        return $price;
    }

    /**
     * Create the Article-Data-Array
     *
     * @param Tax $tax
     * @param $product
     *
     * @return array
     */
    private function createArticleData(Tax $tax, $product)
    {
        $price = $this->calculatePrice($tax, $product);

        return array(
            'name' => 'Käuferschutz',
            'active' => true,
            'tax' => $tax->getTax(),
            'supplier' => 'Trusted Shops',
            'mainDetail' => array(
                'number' => $product->tsProductID,
                'active' => true,
                'instock' => 0,
                'attribute' => array(
                    'swagTrustedRange' => $product->protectedAmount,
                    'swagTrustedDuration' => $product->protectionDurationDays,
                    'swagIsTrustedShopsArticle' => 1
                ),
                'prices' => array(
                    array(
                        'customerGroupKey' => 'EK',
                        'from' => 1,
                        'price' => $price
                    )
                )
            )
        );
    }

    /**
     * Create the Translation Array and return it
     *
     * @return array
     */
    private function getTranslationArray()
    {
        if($this->isShopwareFive()){
            return array('type' => 'article', 'shopId' => 2, 'data' => array('name' => 'Customer Protection'));
        } else {
            return array('type' => 'article', 'localeId' => 2, 'data' => array('name' => 'Customer Protection'));
        }
    }

    /**
     * check if the current environment is Shopware 5
     *
     * @return mixed
     */
    private function isShopwareFive()
    {
        return version_compare(Shopware()->Config()->version, '5.0.0', '>=');
    }

    /**
     * deletes the Trusted Shops articles from the database if shop owner has
     * no Excellence service anymore
     *
     * @throws Exception
     * @throws NotFoundException
     * @throws ParameterMissingException
     */
    public function deleteTrustedShopsArticles()
    {
        $builder = $this->getQueryBuilder();
        $tsIds = $builder->getQuery()->getArrayResult();
        if (empty($tsIds)) {
            return;
        }

        /* @var Article $articleResource */
        $articleResource = new Article();
        $articleResource->setManager($this->em);

        try {
            foreach ($tsIds as $tsId) {
                $articleResource->delete($tsId['id']);
            }
        } catch (ValidationException $e) {
            $errors = array();
            /** @var ConstraintViolation $violation */
            foreach ($e->getViolations() as $violation) {
                $errors[] = sprintf('%s: %s', $violation->getPropertyPath(), $violation->getMessage());
            }
            throw new Exception(implode(', ', $errors));
        }
    }

    /**
     * Create the Doctrine Querybuilder
     *
     * @return \Doctrine\ORM\QueryBuilder|QueryBuilder
     */
    private function getQueryBuilder()
    {
        $builder = $this->em->createQueryBuilder();

        $builder->select(array('article.id'))
            ->from('Shopware\Models\Article\Article', 'article')
            ->innerJoin('article.attribute', 'attribute')
            ->innerJoin('article.details', 'details')
            ->andWhere('article.name = :name')
            ->andWhere('attribute.swagIsTrustedShopsArticle = 1')
            ->andWhere('details.number LIKE :number')
            ->setParameter('name', 'Käuferschutz')
            ->setParameter('number', 'TS%');

        return $builder;
    }

    /**
     * sends the buyer protection request for the confirmed order.
     *
     * @param sOrder $orderData
     * @param string $tsProductId
     * @param $shopId
     * @return array | soap response
     */
    public function sendBuyerProtectionRequest(sOrder $orderData, $tsProductId, $shopId)
    {
        $soapData = $this->prepareDataForSoapRequest($orderData, $tsProductId, $shopId);

        return $this->sendSoapRequest('requestForProtectionV2', $soapData, $shopId);
    }

    /**
     * prepares the data for the soap request
     *
     * @param sOrder $order
     * @param string $tsProductId
     * @param $shopId
     * @return array | data for the soap call
     */
    private function prepareDataForSoapRequest(sOrder $order, $tsProductId, $shopId)
    {
        /** @var Repository $shopRepository */
        $shopRepository = $this->em->getRepository('Shopware\Models\Shop\Shop');
        $shop = $shopRepository->findOneBy(array('id' => $shopId));

        $settings = $this->tsConfig->getSettings($shopId);
        $user = $order->sUserData;
        $basket = $order->sBasketData;
        $userID = $user['billingaddress']['customernumber'];
        $currency = $shop->getCurrency()->toArray();
        $payment = $user['additional']['payment']['name'];
        $payment = $this->tsConfig->getTsPaymentCode($payment);
        $orderNumber = $order->sOrderNumber;
        $orderDate = date('Y-m-d', time()) . 'T' . date('H:i:s', time());
        $shopSystemVersion = 'Shopware/' . $this->config->get('Version') . ' ? TS v0.1';
        $decimalAmount = (double) $basket['AmountNumeric'];
        $tsId = $settings['trustedShopsId'];

        return array(
            $tsId,
            $tsProductId,
            $decimalAmount,
            strtoupper($currency['currency']),
            strtoupper($payment),
            $user['additional']['user']['email'],
            $userID,
            $orderNumber,
            $orderDate,
            $shopSystemVersion,
            $settings['trustedShopsUser'],
            $settings['trustedShopsPassword']
        );
    }

    /**
     * sends a request to Trusted Shops to check the status of the order
     *
     * @param array $tsSoapParameter
     * @param $shopId
     * @return array | soap response
     */
    public function getRequestState(Array $tsSoapParameter, $shopId)
    {
        return $this->sendSoapRequest('getRequestState', $tsSoapParameter, $shopId);
    }

    /**
     * implements and performs the general soap request to Trusted Shops
     *
     * @param string $soapFunction
     * @param array $soapData
     * @param $shopId
     * @internal param $requestURLSuffix
     * @return string or int | soap resonse data
     */
    private function sendSoapRequest($soapFunction, array $soapData = null, $shopId)
    {
        define('SOAP_ERROR', -1);
        $settings = $this->tsConfig->getSettings($shopId);

        $ts_url = $settings['trustedShopsTestSystem'] ? 'protection-qa.trustedshops.com' : 'protection.trustedshops.com';
        //special url for protection request on save order
        $wsdlUrl = 'https://' . $ts_url . '/ts/protectionservices/ApplicationRequestService?wsdl';

        try {
            $client = new \Zend_Soap_Client($wsdlUrl);
            $returnValue = $client->__call($soapFunction, $soapData);
        } catch (\SoapFault $fault) {
            $returnValue = $fault->faultcode . ' ' . $fault->faultstring;
        }

        return $returnValue;
    }

    /**
     * Returns smallest taxId
     *
     * @return int
     */
    private function getTaxId()
    {
        $builder = $this->em->getDBALQueryBuilder();
        $taxId = $builder->select('MIN(id) AS id')->from('s_core_tax', 'tax')->execute()->fetch();

        return (int) $taxId['id'];
    }

    /**
     * Try to get the Tax object
     *
     * @return bool|Tax
     * @throws ORMException
     * @throws OptimisticLockException
     * @throws TransactionRequiredException
     */
    private function getTax()
    {
        $taxId = $this->getTaxId();
        /** @var Tax $tax */
        $tax = $this->em->find('Shopware\Models\Tax\Tax', $taxId);
        if (!$tax instanceof Tax) {
            echo json_encode(array("success" => false, "message" => "Tax with id: {$taxId} does not exist!"));
            return false;
        }
        return $tax;
    }
}
