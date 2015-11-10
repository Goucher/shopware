<?php

namespace Shopware\SwagTrustedShopsExcellence\Subscriber;

use Enlight\Event\SubscriberInterface;

class ControllerPath implements SubscriberInterface
{
    /**
     * @var $bootstrapPath
     */
    private $bootstrapPath;

    /**
     * @var \Enlight_Template_Manager
     */
    private $template;

    /**
     * initialises the bootstrapPath variable
     *
     * @param $bootstrapPath
     * @param $template
     */
    public function __construct($bootstrapPath, \Enlight_Template_Manager $template)
    {
        $this->bootstrapPath = $bootstrapPath;
        $this->template = $template;
    }

    /**
     * Returns an array of event names this subscriber wants to listen to.
     *
     * @return array The event names to listen to
     */
    public static function getSubscribedEvents()
    {
        return array('Enlight_Controller_Dispatcher_ControllerPath_Backend_TrustedShops' => 'onGetTrustedShopsControllerPath');
    }

    /**
     * returns the backend controller path
     *
     * @return string
     */
    public function onGetTrustedShopsControllerPath()
    {
        $this->template->addTemplateDir($this->bootstrapPath . 'Views');

        return $this->bootstrapPath . 'Controllers/Backend/TrustedShops.php';
    }
}
