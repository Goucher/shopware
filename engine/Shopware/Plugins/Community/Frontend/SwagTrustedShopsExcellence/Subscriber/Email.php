<?php

namespace Shopware\SwagTrustedShopsExcellence\Subscriber;

use Enlight\Event\SubscriberInterface;

class Email implements SubscriberInterface
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
        return array(
            'Enlight_Controller_Action_PreDispatch_Backend_Mail' => 'onPreDispatchBackendMail',
            'Shopware_Modules_Order_SendMail_FilterVariables' => 'onBeforeSendMail'
        );
    }

    /**
     * adds the Views folder to the template directory to provide the rating images for the e-mail templates
     *
     */
    public function onBeforeSendMail()
    {
        $this->template->addTemplateDir($this->bootstrapPath . 'Views/emotion/');
    }

    /**
     * adds the Views folder to the template directory to provide the rating images for the e-mail templates
     *
     * @param \Enlight_Event_EventArgs $args
     */
    public function onPreDispatchBackendMail(\Enlight_Event_EventArgs $args)
    {
        /* @var \Enlight_Controller_Action $subject */
        $subject = $args->getSubject();

        if ($subject->Request()->getActionName() != 'sendTestmail') {
            return;
        }

        $this->template->addTemplateDir($this->bootstrapPath . 'Views/');
    }
}
