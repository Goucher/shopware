<?php

namespace Shopware\SwagTrustedShopsExcellence\Subscriber;

use Enlight\Event\SubscriberInterface;
use Enlight_Components_Db_Adapter_Pdo_Mysql as PDO_Connection;
use Shopware\Models\Shop\Shop;
use Shopware\SwagTrustedShopsExcellence\Components\Config;
use Shopware\SwagTrustedShopsExcellence\Components\SoapApi;

/**
 * Class Frontend
 *
 * @package Shopware\SwagTrustedShopsExcellence\Subscriber
 */
class Frontend implements SubscriberInterface
{
    /**
     * @var $bootstrapPath
     */
    private $bootstrapPath;

    /**
     * @var PDO_Connection $db
     */
    private $db;

    /**
     * @var Config
     */
    private $tsConfig;

    /**
     * @var \Enlight_Template_Manager
     */
    private $template;

    /**
     * @var \Shopware\Models\Shop\Shop
     */
    private $shop;

    /**
     * @var string
     */
    private $sessionId;

    /**
     * @var SoapApi
     */
    private $tsSoapApi;

    /**
     * initialises the bootstrapPath variable
     *
     * @param $bootstrapPath
     * @param $db
     * @param $config
     * @param $template
     * @param $shop
     * @param $sessionId
     * @param $tsSoapApi
     */
    public function __construct(
        $bootstrapPath,
        PDO_Connection $db,
        Config $config,
        \Enlight_Template_Manager $template,
        Shop $shop,
        $sessionId,
        SoapApi $tsSoapApi
    ) {
        $this->bootstrapPath = $bootstrapPath;
        $this->db = $db;
        $this->tsConfig = $config;
        $this->template = $template;
        $this->shop = $shop;
        $this->sessionId = $sessionId;
        $this->tsSoapApi = $tsSoapApi;
    }

    /**
     * Returns an array of event names this subscriber wants to listen to.
     *
     * @return array The event names to listen to
     */
    public static function getSubscribedEvents()
    {
        return array(
            'Enlight_Controller_Action_PostDispatchSecure_Frontend' => 'onFrontendPostDispatch',
            'Enlight_Controller_Action_PostDispatchSecure_Frontend_Checkout' => 'onCheckoutPostDispatch',
            'Shopware_Modules_Admin_Regenerate_Session_Id' => 'onUpdateSessionId'
        );
    }

    /**
     * Helper method to get whether or not the current template is a responsive template
     *
     * @return bool
     */
    public function isResponsiveTemplate()
    {
        return Shopware()->Shop()->getTemplate()->getVersion() >= 3;
    }

    /**
     * updates the session ID, if it changed
     *
     * @param \Enlight_Event_EventArgs $args
     */
    public function onUpdateSessionId(\Enlight_Event_EventArgs $args)
    {
        $this->sessionId = $args->get('newSessionId');
    }

    /**
     * returns the TrustedShops configuration for the submitted shopID
     *
     * @param $shopId
     * @return array
     */
    private function getConfig($shopId)
    {
        return $this->tsConfig->getTrustedShopBasicConfig($shopId);
    }

    /**
     * extends the checkout controller to show the trustedShops items
     *
     * @param \Enlight_Event_EventArgs $args
     * @return void
     */
    public function onCheckoutPostDispatch(\Enlight_Event_EventArgs $args)
    {
        /** @var $subject \Enlight_Controller_Action */
        $subject = $args->getSubject();
        $view = $subject->View();
        $request = $subject->Request();
        $shopId = $this->shop->getId();

        //get basic config of trusted shop for the seal template and trusted shop id
        $config = $this->getConfig($shopId);

        $basket = $view->sBasket;

        //if the current controller is the checkout controller extend the config for the basket
        if ($request->getActionName() != 'finish') {
            $this->controlBasketTsArticle($subject, $request, $basket['Amount']);
        }

        $basketConfig = $this->getTrustedShopBasketConfig($subject, $basket['Amount']);
        $config = array_merge($basketConfig, $config);

        $config['excellence'] = $this->tsSoapApi->checkCertificateTypeIfExcellence($shopId, false);

        if (isset($basket['content'])) {
            foreach ($basket['content'] as &$article) {
                $explode = explode('_', $article['ordernumber']);
                if (count($explode) == 4 && substr($explode[0], 0, 2) == 'TS') {
                    $article['trustedShopArticle'] = true;
                }
            }

            //set delivery date
            $config['deliveryDate'] = $this->getDeliveryDate($basket['content']);
        }

        if ($request->getActionName() == 'finish') {
            $paymentName = $view->sPayment;
            $config['paymentName'] = $this->tsConfig->getTsPaymentCode($paymentName['name']);
        }

        //extend template
        $view->sTrustedShops = $config;

        if (!$this->isResponsiveTemplate()) {
            $this->template->addTemplateDir($this->bootstrapPath . 'Views/emotion');

            $view->extendsTemplate('frontend/plugins/swag_trusted_shops/index/index.tpl');
            $view->extendsTemplate('frontend/plugins/swag_trusted_shops/checkout/cart.tpl');
            if ($request->getActionName() == 'finish') {
                $view->extendsTemplate('frontend/plugins/swag_trusted_shops/checkout/finish.tpl');
            }
        } else {
            $this->template->addTemplateDir($this->bootstrapPath . 'Views/responsive');
        }
    }

    /**
     * provides the Trusted Shops config and shows the logo and the badge
     *
     * @param \Enlight_Event_EventArgs $args
     * @return void
     */
    public function onFrontendPostDispatch(\Enlight_Event_EventArgs $args)
    {
        /** @var $subject \Enlight_Controller_Action */
        $subject = $args->getSubject();
        $view = $subject->View();
        $request = $subject->Request();
        $shopId = $this->shop->getId();

        if ($request->getControllerName() == 'checkout') {
            return;
        }

        //get basic config of trusted shop for the seal template and trusted shop id
        $config = $this->getConfig($shopId);

        //extend template
        $view->sTrustedShops = $config;

        if (!$this->isResponsiveTemplate()) {
            $this->template->addTemplateDir($this->bootstrapPath . 'Views/emotion');

            $view->extendsTemplate('frontend/plugins/swag_trusted_shops/index/index.tpl');
        } else {
            $this->template->addTemplateDir($this->bootstrapPath . 'Views/responsive');
        }
    }

    /**
     * This function controls the buyer protection item in the basket.
     *
     * @param \Enlight_Controller_Action $controller
     * @param \Enlight_Controller_Request_RequestHttp $request
     * @param $basketAmount
     * @return void
     */
    private function controlBasketTsArticle($controller, $request, $basketAmount)
    {
        //get total basket amount
        $amount = $this->getAmount($controller->getShippingCosts(), $basketAmount);

        $basketArticle = $this->isTsArticleInBasket();
        //Always use the brutto-value
        if ($controller->View()->sAmountWithTax) {
            $amount = $controller->View()->sAmountWithTax;
        }
        if (empty($basketArticle)) {
            return;
        }

        $sql = "SELECT COUNT(id)
				FROM s_order_basket
				WHERE sessionID = ?
					AND modus = 0";
        $articleAmount = $this->db->fetchOne($sql, array($this->sessionId));

        if ($articleAmount > 1) {
            if ($amount > 0) {
                //get trusted shop article data
                $toAddArticle = $this->getTsArticleByAmount($amount);
                if ($toAddArticle['tsProductID'] == $basketArticle['ordernumber']) {
                    return;
                }
            }
        }

        $sql = "DELETE FROM s_order_basket
				WHERE id = ?
					AND sessionID = ?";
        $this->db->query($sql, array($basketArticle['id'], $this->sessionId));
        $controller->View()->sTsArticleRemoved = true;
        $controller->forward($request->getActionName());
    }

    /**
     * Returns the trusted shop article data for the checkout controller.
     *
     * @param $checkoutController
     * @param $basketAmount
     * @return array
     */
    private function getTrustedShopBasketConfig($checkoutController, $basketAmount)
    {
        $amount = $this->getAmount($checkoutController->getShippingCosts(), $basketAmount);

        if ($checkoutController->View()->sAmountWithTax) {
            $amount = $checkoutController->View()->sAmountWithTax;
        }

        //get trusted shop article data
        $article = $this->getTsArticleByAmount($amount);

        //set trusted shop parameters
        $trustedShop = array('displayProtectionBox' => !$this->isTsArticleInBasket(), 'article' => $article);

        return $trustedShop;
    }

    private function getAmount($shippingCost, $amount)
    {
        $ret = 0;

        if (isset($amount)) {
            $ret += $amount;
        }

        if (isset($shippingCost['value'])) {
            $ret += $shippingCost['value'];
        }

        return $ret;
    }

    /**
     * Checks if the user has already the trusted shop article in basket
     *
     * @return bool
     */
    private function isTsArticleInBasket()
    {
        $currency = $this->shop->getCurrency()->toArray();
        $sql = "SELECT *
				FROM s_order_basket
				WHERE SUBSTR(ordernumber,1,2) = 'TS'
					AND SUBSTR(ordernumber, LENGTH(ordernumber)-2) = ?
					AND sessionID = ?";

        $exist = $this->db->fetchRow($sql, array($currency['currency'], $this->sessionId));

        return $exist;
    }

    /**
     * Returns the article data for the trusted shop article calculated by the current basket amount
     *
     * @param $amount
     * @return array
     */
    private function getTsArticleByAmount($amount)
    {
        if (empty($amount)) {
            return array();
        }
        $currency = $this->shop->getCurrency()->toArray();
        $currencyForSelect = '%' . $currency['currency'];

        $sql = "SELECT a.id AS id,
                REPLACE(ROUND(ap.price * (100+t.tax) / 100, 2), '.', ',') AS grossFee,
                ROUND(ap.price, 2) AS netFee,
                aa.swag_trusted_range AS protectedAmountDecimal,
                aa.swag_trusted_duration AS protectionDurationInt,
                ad.ordernumber AS tsProductID

                FROM s_articles AS a
                  INNER JOIN s_articles_attributes AS aa
                    ON a.id = aa.articleID
                  INNER JOIN s_articles_details AS ad
                    ON a.id = ad.articleID
                  INNER JOIN s_core_tax AS t
                    ON t.id = a.taxID
                  INNER JOIN s_articles_prices AS ap
                    ON a.id = ap.articleID
                     AND ap.pricegroup = 'EK'
                     AND ap.from = 1

                WHERE aa.swag_trusted_range >= :amount AND ad.ordernumber LIKE :currency
                ORDER BY aa.swag_trusted_range ASC LIMIT 1;";

        $nextProtectionItem = $this->db->fetchRow($sql, array('amount' => $amount, 'currency' => $currencyForSelect));
        $nextProtectionItem['currency'] = $currency['currency'];

        return $nextProtectionItem;
    }

    /**
     * Returns max delivery days for this order
     *
     * @param array $basket
     * @return string
     */
    protected function getDeliveryDate($basket)
    {
        $deliveryDays = $this->getMaxDeliveryTime($basket);

        return date('Y-m-d', strtotime("+$deliveryDays days"));
    }

    /**
     * @param array $basket
     * @return int
     */
    private function getMaxDeliveryTime($basket)
    {
        // get the SwagTrustedShop config
        $config = $this->tsConfig->getSettings($this->shop->getId());
        $deliveryTime = $config['trustedShopsInStockDeliveryTime'];
        $notInStockDeliveryTime = $config['trustedShopsNotInStockDeliveryTime'];

        // if trustedShopsNotInStockDeliveryTime is defined check if any
        // article is not in stock
        if ($notInStockDeliveryTime > 0) {
            if ($this->isArticleNotInStock($basket)) {
                return $notInStockDeliveryTime;
            }
        }

        // if trustedShopsInStockDeliveryTime is defined return it
        if ($deliveryTime > 0) {
            return $deliveryTime;
        }

        $defaultReturn = 2;
        if (!$basket) {
            return $defaultReturn;
        }

        $shippingTimes = array_column($basket, 'shippingtime');

        if (!$shippingTimes) {
            return $defaultReturn;
        }

        $maxDeliveryTime = (int) max($shippingTimes);

        if (!$maxDeliveryTime) {
            return $defaultReturn;
        }

        return $maxDeliveryTime;
    }

    /**
     * @param array $basket
     * @return bool
     */
    private function isArticleNotInStock($basket)
    {
        foreach ($basket as $article) {
            if (null === $article['instock']) {
                continue;
            }
            if ($article['instock'] <= 0) {
                return true;
            }
        }

        return false;
    }
}
