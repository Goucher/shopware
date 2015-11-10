<?php

namespace Shopware\SwagTrustedShopsExcellence\Subscriber;

use Enlight\Event\SubscriberInterface;
use Shopware\Components\Model\ModelManager;
use Shopware\SwagTrustedShopsExcellence\Components\Config;
use Shopware\SwagTrustedShopsExcellence\Components\SoapApi;

class Resources implements SubscriberInterface
{
    /**
     * @var \Shopware_Components_Config
     */
    private $config;

    /**
     * @var ModelManager
     */
    private $em;

    /**
     * @var \Zend_Locale
     */
    private $locale;

    /**
     * initialises the bootstrapPath variable
     *
     * @param $config
     * @param $models
     * @param $locale
     */
    public function __construct($config, $models, $locale)
    {
        $this->config = $config;
        $this->em = $models;
        $this->locale = $locale;
    }

    /**
     * Returns an array of event names this subscriber wants to listen to.
     *
     * @return array The event names to listen to
     */
    public static function getSubscribedEvents()
    {
        return array(
            'Enlight_Bootstrap_InitResource_trusted_shops_soapApi' => 'onInitResourceTrustedShopsSoapApi',
            'Enlight_Bootstrap_InitResource_trusted_shops_config' => 'onInitResourceTrustedShopsConfig'
        );
    }

    /**
     * returns the TrustedShops SoapApi Component
     *
     * @return SoapApi
     */
    public function onInitResourceTrustedShopsSoapApi()
    {
        return new SoapApi(
            $this->em, $this->config, new Config($this->em, $this->locale)
        );
    }

    /**
     * returns the TrustedShops Config Component
     *
     * @return Config
     */
    public function onInitResourceTrustedShopsConfig()
    {
        return new Config(
            $this->em, $this->locale
        );
    }
}
