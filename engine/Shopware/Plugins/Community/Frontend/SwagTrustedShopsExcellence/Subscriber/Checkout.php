<?php

namespace Shopware\SwagTrustedShopsExcellence\Subscriber;

use Enlight\Event\SubscriberInterface;
use Enlight_Components_Db_Adapter_Pdo_Mysql as PDO_Connection;
use Shopware\SwagTrustedShopsExcellence\Components\Config;
use Shopware\SwagTrustedShopsExcellence\Components\SoapApi;

class Checkout implements SubscriberInterface
{
    /**
     * @var PDO_Connection $db
     */
    private $db;

    /**
     * @var Config
     */
    private $tsConfig;

    /**
     * @var SoapApi
     */
    private $tsSoapApi;

    /**
     * @var string
     */
    private $sessionId;

    /**
     * @var bool
     */
    private $isShopware50;

    /**
     * initialises the bootstrapPath variable
     *
     * @param PDO_Connection $db
     * @param Config $tsConfig
     * @param SoapApi $tsSoapApi
     * @param $sessionId
     * @param $isShopware50
     */
    public function __construct(PDO_Connection $db, Config $tsConfig, SoapApi $tsSoapApi, $sessionId, $isShopware50)
    {
        $this->db = $db;
        $this->tsConfig = $tsConfig;
        $this->tsSoapApi = $tsSoapApi;
        $this->sessionId = $sessionId;
        $this->isShopware50 = $isShopware50;
    }

    /**
     * Returns an array of event names this subscriber wants to listen to.
     *
     * @return array The event names to listen to
     */
    public static function getSubscribedEvents()
    {
        return array(
            'Shopware_Modules_Order_SaveOrder_ProcessDetails' => 'onSaveOrder',
            'Enlight_Controller_Action_Frontend_Checkout_addArticle' => 'onAddArticle',
            'Enlight_Controller_Action_Frontend_Checkout_confirm' => array('onConfirm', 999),
            'Enlight_Controller_Action_Frontend_Checkout_cart' => array('onConfirm', 999),
            'Enlight_Controller_Action_Frontend_Checkout_ajaxCart' => array('onConfirm', 999)
        );
    }

    /**
     * @param \Enlight_Event_EventArgs $args
     */
    public function onConfirm(\Enlight_Event_EventArgs $args)
    {
        $tsArticles = $this->findTrustedShopArticleNumbersInBasket();
        if(!$tsArticles){
            return;
        }

        /* @var \Enlight_Controller_Action $subject */
        $subject = $args->getSubject();
        $view = $subject->View();

        if(!$this->isTemplateResponsive()){
            $view->extendsTemplate(__DIR__ . '/../Views/emotion/frontend/plugins/swag_trusted_shops/checkout/cart_item.tpl');
        }

        $view->assign('sTsArticleNumber', $tsArticles);
    }

    /**
     * if there are TsArticles in basket, this method returns an Array() of the articleNumbers
     * else this method returns false
     *
     * @return array|bool
     */
    private function findTrustedShopArticleNumbersInBasket()
    {
        $tsArticleNumbers = $this->getTSArticleNumbers();
        $basketItems = $this->getBasketItems();

        if(!$basketItems || !$tsArticleNumbers){
            return false;
        }

        foreach ($basketItems as $item){
            if(in_array($item['ordernumber'], $tsArticleNumbers)){
                return $item['ordernumber'];
            }
        }

        return false;
    }

    /**
     * Check if Tempate is responsive
     *
     * @return bool
     */
    private function isTemplateResponsive()
    {
        return Shopware()->Shop()->getTemplate()->getVersion() >= 3;
    }

    /**
     * @param \Enlight_Event_EventArgs $args
     */
    public function onAddArticle(\Enlight_Event_EventArgs $args)
    {
        $tsArticles = $this->getTSArticleNumbers();
        $basketItems = $this->getBasketItems();

        foreach ($basketItems as $item) {
            if (in_array($item['ordernumber'], $tsArticles)) {
                $sql = "DELETE FROM `s_order_basket`
                        WHERE id = ?
                          AND sessionID = ?";
                $this->db->query($sql, array($item['id'], $this->sessionId));
            }
        }
    }

    /**
     * get all BasketItems
     * @return array
     */
    private function getBasketItems()
    {
        $sql = "SELECT id, ordernumber
                FROM `s_order_basket`
                WHERE sessionID = ?";
        return $this->db->fetchAll($sql, array($this->sessionId));
    }

    /**
     * get all Käuferschutz article.
     * @return array
     */
    private function getTSArticleNumbers()
    {
        $sql = "SELECT details.ordernumber
                FROM `s_articles_details` AS details
                INNER JOIN `s_articles_attributes` AS attributes
                  ON attributes.articledetailsID = details.id
                INNER JOIN `s_articles` AS article
                  ON article.id = details.articleID
                WHERE ordernumber LIKE 'TS%'
                  AND attributes.swag_is_trusted_shops_article = 1
                  AND article.name = 'Käuferschutz'";

        return $this->db->fetchCol($sql);
    }

    /**
     * If the user confirm the order, this function sends the buyer protection request
     *
     * @param \Enlight_Event_EventArgs $args
     */
    public function onSaveOrder(\Enlight_Event_EventArgs $args)
    {
        /* @var \sOrder $orderSubject */
        $orderSubject = $args->getSubject();
        $shopId = $orderSubject->sSYSTEM->sSubShop['id'];

        if ($this->isShopware50) {
            $shopContext = Shopware()->Container()->get('shopware_storefront.context_service')->getShopContext();
            $shopId = $shopContext->getShop()->getId();
        }

        $article = $this->isTsArticleInOrder($orderSubject);
        if (!empty($article)) {
            $config = $this->tsConfig->getTrustedShopBasicConfig($shopId);
            $returnValue = $this->tsSoapApi->sendBuyerProtectionRequest($orderSubject, $article['ordernumber'], $shopId);

            if (is_int($returnValue) && $returnValue > 0) {
                /*
                 * Inserts the order to the trusted shops order table
                 * The Status will be updated in the cronjob onRunTSCheckOrderState
                 * Status Description:
                 * Status 0 Pending
                 * Status 1 Success
                 * Status 3 Error
                 */
                $sql = "INSERT INTO `s_plugin_swag_trusted_shops_excellence_orders`
						(`ordernumber`, `shop_id`, `ts_applicationId`, `status`)
						VALUES (?,?,?,0)";
                $this->db->query($sql, array($orderSubject->sOrderNumber, $shopId, $returnValue));

                $comment = $config['stateWaiting']['description'];
                $status = $config['stateWaiting']['id'];
            } else {
                //failed
                $comment = $config['stateError']['description'];
                $status = $config['stateError']['id'];
            }

            $sql = "UPDATE s_order
					SET internalcomment = ?, status = ?
					WHERE ordernumber = ?";
            $this->db->query($sql, array($comment, $status, $orderSubject->sOrderNumber));
        }
    }

    /**
     * This function checks if the order has a buyer protection article
     *
     * @param $order
     * @return array | empty or article data
     */
    private function isTsArticleInOrder($order)
    {
        $basket = $order->sBasketData;
        foreach ($basket['content'] as $article) {
            $explode = explode('_', $article['ordernumber']);
            if (count($explode) == 4 && substr($explode[0], 0, 2) == 'TS') {
                return $article;
            }
        }

        return array();
    }
}
