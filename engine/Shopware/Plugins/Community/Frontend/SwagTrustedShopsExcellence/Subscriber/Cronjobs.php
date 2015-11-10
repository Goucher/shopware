<?php
namespace Shopware\SwagTrustedShopsExcellence\Subscriber;

use Doctrine\DBAL\Connection;
use Doctrine\ORM\AbstractQuery;
use Enlight\Event\SubscriberInterface;
use Shopware\Models\Shop\Repository;
use Shopware\Models\Shop\Shop;
use Shopware\SwagTrustedShopsExcellence\Components\Config;
use Shopware\SwagTrustedShopsExcellence\Components\SoapApi;
use Shopware\Components\Model\ModelManager;

class Cronjobs implements SubscriberInterface
{
    /**
     * @var Connection $db
     */
    private $db;

    /**
     * @var Shop $shops
     */
    private $shops;

    /**
     * @var SoapApi $tsSoapApi
     */
    private $tsSoapApi;

    /**
     * @var Config $tsConfig
     */
    private $tsConfig;

    /**
     * initialises the bootstrapPath variable
     *
     * @param $em
     * @param $soapApi
     * @param $config
     */
    public function __construct(ModelManager $em, SoapApi $soapApi, Config $config)
    {
        $this->db = $em->getConnection();
        $this->tsSoapApi = $soapApi;
        $this->tsConfig = $config;
        /** @var Repository $shopRepository */
        $shopRepository = $em->getRepository('Shopware\Models\Shop\Shop');
        $this->shops = $shopRepository->getActiveShops(AbstractQuery::HYDRATE_ARRAY);
    }

    /**
     * Returns an array of event names this subscriber wants to listen to.
     *
     * @return array The event names to listen to
     */
    public static function getSubscribedEvents()
    {
        return array(
            'Shopware_CronJob_TSGetLatestProtectionItems' => 'onRunTSGetLatestProtectionItems',
            'Shopware_CronJob_TSCheckOrderState' => 'onRunTSCheckOrderState'
        );
    }

    /**
     * Imports an Update the latest trusted Shops ProtectionsItems
     *
     * @param \Shopware_Components_Cron_CronJob $job
     * @return boolean
     */
    public function onRunTSGetLatestProtectionItems(\Shopware_Components_Cron_CronJob $job)
    {
        $this->prepareCronJob($job);
        /* @var Shop $shop */
        foreach ($this->shops as $shop) {
            $shopId = $shop['id'];
            //get the latest trusted shops items
            $this->tsSoapApi->updateTrustedShopsProtectionItems($shopId);
        }

        echo 'Updated TrustedShops Buyer Protection items <br>';

        return true;
    }

    /**
     * This function updates the cron job times. Through this the cron job will always be active
     *
     * @param \Shopware_Components_Cron_CronJob $job
     * @return void
     */
    protected function prepareCronJob($job)
    {
        echo '<br>';
        $end = new \Zend_Date($job->get('end'));
        $start = new \Zend_Date($job->get('start'));
        $next = new \Zend_Date($job->get('next'));
        $sql = "UPDATE s_crontab
			    SET `end` = ?, `start` = ?, `next` = ?
			    WHERE id = ?";
        $this->db->executeUpdate($sql, array($end, $start, $next, $job->get('id')));
    }

    /**
     * Checks the status of the trusted shops orders
     *
     * Status Description:
     * Status 0 Pending
     * Status 1 Success
     * Status 3 Error
     *
     * @param \Shopware_Components_Cron_CronJob $job
     * @return boolean
     */
    public function onRunTSCheckOrderState(\Shopware_Components_Cron_CronJob $job)
    {
        $this->prepareCronJob($job);

        $sql = "SELECT *
			   	FROM `s_plugin_swag_trusted_shops_excellence_orders`
			   	WHERE `status` = 0";
        $trustedShopOrders = $this->db->fetchAll($sql);
        $shopId = $trustedShopOrders['shop_id'];
        //get plugin basic config
        $config = $this->tsConfig->getTrustedShopBasicConfig($shopId);

        if (empty($trustedShopOrders)) {
            return true;
        }

        //iterate the open trusted shop orders
        foreach ($trustedShopOrders as $order) {
            $returnValue = $this->tsSoapApi->getRequestState(array($config['id'], $order['ts_applicationId']), $shopId);
            switch (true) {
                case ($returnValue == 0):
                    $comment = $config['stateWaiting']['description'];
                    $status = $config['stateWaiting']['id'];
                    break;
                case ($returnValue > 0):
                    $comment = $config['stateSuccess']['description'] . ' / Garantie-Nr.: ' . $returnValue;
                    $status = $config['stateSuccess']['id'];
                    break;
                default:
                    $comment = $config['stateError']['description'];
                    $status = $config['stateError']['id'];
                    break;
            }
            echo '<br>' . $order['ordernumber'] . ':  ' . $comment . '<br>';

            $sql = "UPDATE s_order
					SET status = ?, internalcomment = ?
					WHERE ordernumber = ?";
            $this->db->executeUpdate($sql, array($status, $comment, $order['ordernumber']));

            $sql = "UPDATE s_plugin_swag_trusted_shops_excellence_orders
					SET status = ?
					WHERE id = ?";
            $this->db->executeUpdate($sql, array($returnValue, $order['id']));
        }

        return true;
    }
}
