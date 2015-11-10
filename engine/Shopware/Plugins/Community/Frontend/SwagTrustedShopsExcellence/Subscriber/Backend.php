<?php

namespace Shopware\SwagTrustedShopsExcellence\Subscriber;

use Enlight\Event\SubscriberInterface;
use Enlight_Event_EventArgs;

class Backend implements SubscriberInterface
{
    /**
     * @var $bootstrapPath
     */
    private $bootstrapPath;

    /**
     * initialises the bootstrapPath variable
     *
     * @param $bootstrapPath
     */
    public function __construct($bootstrapPath)
    {
        $this->bootstrapPath = $bootstrapPath;
    }

    /**
     * Returns an array of event names this subscriber wants to listen to.
     *
     * @return array The event names to listen to
     */
    public static function getSubscribedEvents()
    {
        return array(
            'Enlight_Controller_Action_PostDispatchSecure_Backend_Index' => 'onPostDispatchIndex'
        );
    }

    /**
     * provides the Trusted Shops logo in the backend
     *
     * @param Enlight_Event_EventArgs $args
     */
    public function onPostDispatchIndex(Enlight_Event_EventArgs $args)
    {
        /* @var \Enlight_Controller_Action $subject */
        $subject = $args->getSubject();
        $view = $subject->View();

        $view->addTemplateDir($this->bootstrapPath . 'Views/');
        $view->extendsTemplate('backend/trusted_shops/menu_entry.tpl');
    }
}
