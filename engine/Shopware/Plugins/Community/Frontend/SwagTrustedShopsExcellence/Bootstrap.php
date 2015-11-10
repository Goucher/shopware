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

use Doctrine\ORM\Tools\SchemaTool;
use Enlight_Components_Db_Adapter_Pdo_Mysql as PDO_Connection;
use Shopware\Components\Model\ModelManager;
use Shopware\SwagTrustedShopsExcellence\Components\MigrationService;
use Shopware\SwagTrustedShopsExcellence\Subscriber\Backend;
use Shopware\SwagTrustedShopsExcellence\Subscriber\Checkout;
use Shopware\SwagTrustedShopsExcellence\Subscriber\ControllerPath;
use Shopware\SwagTrustedShopsExcellence\Subscriber\Cronjobs;
use Shopware\SwagTrustedShopsExcellence\Subscriber\Email;
use Shopware\SwagTrustedShopsExcellence\Subscriber\Frontend;
use Shopware\SwagTrustedShopsExcellence\Subscriber\Javascript;
use Shopware\SwagTrustedShopsExcellence\Subscriber\Less;
use Shopware\SwagTrustedShopsExcellence\Subscriber\Resources;

/**
 * Shopware Trusted Shops Excellence Plugin - Bootstrap
 *
 * @category  Shopware
 * @package   Shopware\Plugins\SwagTrustedShopsExcellence
 * @copyright Copyright (c) shopware AG (http://www.shopware.com)
 */
class Shopware_Plugins_Frontend_SwagTrustedShopsExcellence_Bootstrap extends Shopware_Components_Plugin_Bootstrap
{
    /**
     * @var ModelManager $em
     */
    private $em;

    /**
     * @var PDO_Connection $db
     */
    private $db;

    /**
     * Returns the meta information about the plugin
     * as an array.
     * Keep in mind that the plugin description located
     * in the info.txt.
     *
     * @return array
     */
    public function getInfo()
    {
        return array(
            'version' => $this->getVersion(),
            'label' => $this->getLabel(),
            'link' => 'http://www.shopware.com/',
            'description' => file_get_contents($this->Path() . 'info_de.txt') . file_get_contents(
                    $this->Path() . 'info_en.txt'
                )
        );
    }

    /**
     * Returns the version of the plugin as a string
     *
     * @return string
     * @throws Exception
     */
    public function getVersion()
    {
        $info = json_decode(file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'plugin.json'), true);

        if ($info) {
            return $info['currentVersion'];
        } else {
            throw new Exception('The plugin has an invalid version file.');
        }
    }

    /**
     * Returns the well-formatted name of the plugin
     * as a sting
     *
     * @return string
     */
    public function getLabel()
    {
        return 'Trusted Shops 2.0';
    }

    /**
     * Plugin install method to subscribe all required events.
     *
     * @access public
     * @return bool success
     */
    public function install()
    {
        $this->createEvents();
        $this->createDatabaseTables();
        $this->deleteACLResource();
        $this->addACLResource();
        $this->createMenuEntry();
        $this->createSchema();
        $this->createCronJobs();
        $this->doMigration($this->getId());

        return true;
    }

    /**
     * enable method
     * activates the menu entry
     *
     * @return array
     */
    public function enable()
    {
        $sql = "UPDATE `s_core_menu`
                SET `active` = 1
                WHERE `name` LIKE 'Trusted Shops';";
        $this->db->query($sql);

        return array('success' => true, 'invalidateCache' => array('frontend', 'template', 'config', 'backend'));
    }

    /**
     * disable method
     * deactivates the menu entry
     *
     * @return array
     */
    public function disable()
    {
        $sql = "UPDATE `s_core_menu`
                SET `active` = 0
                WHERE `name` LIKE 'Trusted Shops';";
        $this->db->query($sql);

        return array('success' => true, 'invalidateCache' => array('frontend', 'template', 'config', 'backend'));
    }

    /**
     * Standard uninstall method which removes the trusted shops db tables
     *
     * @return boolean
     */
    public function uninstall()
    {
        $sql = "DELETE FROM s_core_states
				WHERE description LIKE 'TS - Antrag%'";
        $this->db->query($sql);

        $sql = "DELETE FROM s_crontab
				WHERE pluginID = ?";
        $this->db->query($sql, array($this->getId()));

        return parent::uninstall();
    }

    /**
     * Plugin update method to handle the update process
     *
     * @param string $oldVersion
     * @return bool|void
     * @throws Exception
     */
    public function update($oldVersion)
    {
        // Check if shopware version matches
        if (!$this->assertVersionGreaterThen('4.2.0')) {
            throw new Exception('This plugin requires Shopware 4.2.0 or a later version');
        }

        if (version_compare($oldVersion, '2.0.0', '<')) {
            $this->createDatabaseTables();
            $this->createSchema();
            $this->doMigration($this->getId());
            $this->createMenuEntry();
            $this->createEvents();

            $sql = "DELETE FROM s_crontab
					WHERE pluginID = ?
						AND name LIKE 'TSGetRatingImage'";
            $this->db->query($sql, array($this->getId()));

            $sql = "DELETE s_core_config_elements
	    			FROM s_core_config_forms
	    			INNER JOIN s_core_config_elements
	    				ON s_core_config_elements.form_id = s_core_config_forms.id
	    			WHERE s_core_config_forms.plugin_id = ?";
            $this->db->query($sql, array($this->getId()));

            try {
                $sql = "ALTER TABLE s_plugin_swag_trusted_shops_excellence_orders
					    ADD `shop_id` INT(11) NOT NULL";
                $this->db->query($sql);
            } catch (Exception $e) {
            }
        }

        if (version_compare($oldVersion, '2.0.4', '<')) {
            try {
                $sql = "ALTER TABLE `s_plugin_swag_trusted_shops`
                        ADD `trustedShopsInStockDeliveryTime` INT(11) DEFAULT NULL ,
                        ADD `trustedShopsNotInStockDeliveryTime` INT(11) DEFAULT NULL;";
                $this->db->query($sql);
            } catch (Exception $e) {
            }
        }

        if (version_compare($oldVersion, '2.1.2', '<')) {
            $this->deleteACLResource();
            $this->addACLResource();
        }

        if (version_compare($oldVersion, '2.1.5', '<')) {
            $this->generateAttribute();

            $sql = "UPDATE s_articles_attributes
                    SET swag_trusted_range = attr19, swag_trusted_duration = attr20
                    WHERE (attr19 > 0 OR attr20 > 0);";
            $this->db->query($sql);
        }

        return true;
    }

    /**
     * registers the namespace of this plugin
     *
     * initialises the shopware modelManager and DB adapter
     */
    public function afterInit()
    {
        $this->em = $this->get('models');
        $this->db = $this->get('db');
        $this->Application()->Loader()->registerNamespace('Shopware\SwagTrustedShopsExcellence', $this->Path());
    }

    /**
     * Will register the DispatchLoopStartup event - all other events will be handled in event subscribers
     */
    private function createEvents()
    {
        $this->subscribeEvent('Enlight_Controller_Front_DispatchLoopStartup', 'onStartDispatch');
    }

    /**
     * This callback function is triggered at the very beginning of the dispatch process and allows
     * us to register additional events on the fly. This way you won't ever need to reinstall you
     * plugin for new events - any event and hook can simply be registered in the event subscribers
     */
    public function onStartDispatch(\Enlight_Event_EventArgs $args)
    {
        /** @var $subject \Enlight_Controller_Action */
        $subject = $args->getSubject();
        $request = $subject->Request();

        if ($request->getModuleName() == 'api') {
            return;
        }

        // work around for OPcache bug. if the new columns are not generated and not available return
        // and TS is quasi disabled
        // REMOVE AS SOON AS THE BUG IS FIXED IN THE CORE
        try {
            $result = $this->db->query("SELECT `trustedShopsInStockDeliveryTime` FROM `s_plugin_swag_trusted_shops`");
        } catch (Exception $e) {
            try {
                $sql = "ALTER TABLE `s_plugin_swag_trusted_shops`
                        ADD `trustedShopsInStockDeliveryTime` INT(11) DEFAULT NULL ,
                        ADD `trustedShopsNotInStockDeliveryTime` INT(11) DEFAULT NULL;";
                $this->db->query($sql);
            } catch (Exception $e) {
                return;
            }
        }

        $this->registerCustomModels();
        $resourcesSubscriber = new Resources(
            $this->get('config'),
            $this->em,
            $this->get('locale')
        );
        $this->Application()->Events()->addSubscriber($resourcesSubscriber);

        $template = $this->get('template');
        $tsConfig = $this->get('trusted_shops_config');
        $tsSoapApi = $this->get('trusted_shops_soapApi');

        $subscribers = array(new Email($this->Path(), $template));

        if ($request->getModuleName() == 'backend') {
            $subscribers = array_merge(
                $subscribers,
                array(
                    new Backend($this->Path(), $this->em),
                    new ControllerPath($this->Path(), $template),
                    new Cronjobs($this->em, $tsSoapApi, $tsConfig)
                )
            );
        } else {
            $sessionId = $this->get('sessionid');
            $subscribers = array_merge(
                $subscribers,
                array(
                    new Checkout($this->db, $tsConfig, $tsSoapApi, $sessionId, $this->assertMinimumVersion('5.0')),
                    new Frontend(
                        $this->Path(),
                        $this->db,
                        $tsConfig,
                        $template,
                        $this->get('shop'),
                        $sessionId,
                        $tsSoapApi
                    )
                )
            );
        }

        $subscribers = array_merge(
            $subscribers,
            array(
                new Javascript(),
                new Less()
            )
        );

        foreach ($subscribers as $subscriber) {
            $this->Application()->Events()->addSubscriber($subscriber);
        }
    }

    /**
     * This function creates all required cron jobs
     *
     * @return void
     */
    private function createCronJobs()
    {
        try {
            //Creates the TrustedShops Cronjob to get the latest trusted shop products
            $this->createCronJob('TSGetLatestProtectionItems', 'TSGetLatestProtectionItems');

            //Creates the TrustedShops Cronjob to check the order state of the pending orders
            $this->createCronJob('TSCheckOrderState', 'TSCheckOrderState', 3600);
        } catch (Exception $ex) {
            //Skip re-creating of cron, we already have it
        }
    }

    /**
     * This function creates the database table for the buyer protection articles
     *
     * @return void
     */
    private function createDatabaseTables()
    {
        $this->generateAttribute();

        //creates new database table for the trusted shops orders this table should not be deleted on uninstall
        $sql = "CREATE TABLE IF NOT EXISTS `s_plugin_swag_trusted_shops_excellence_orders` (
					`id` INT(11) NOT NULL AUTO_INCREMENT,
					`ordernumber` VARCHAR(30) NOT NULL,
					`shop_id` INT(11) NOT NULL,
					`ts_applicationId` VARCHAR(30) NOT NULL,
					`status` INT(1) DEFAULT NULL,
					PRIMARY KEY (`id`)
				) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;";
        $this->db->query($sql);

        $sql = "SELECT MAX(id)
				FROM s_core_states";
        $id = $this->db->fetchOne($sql);

        $states = array(
            array(
                'description' => 'TS - Antrag in Bearbeitung',
                'position' => 100,
                'group' => 'state',
                'mail' => 0
            ),
            array(
                'description' => 'TS - Antrag erfolgreich',
                'position' => 100,
                'group' => 'state',
                'mail' => 0
            ),
            array(
                'description' => 'TS - Antrag fehlgeschlagen',
                'position' => 100,
                'group' => 'state',
                'mail' => 0
            )
        );

        $selectSQL = "SELECT id FROM s_core_states WHERE description = ?";
        $sql = "INSERT INTO s_core_states (`id`, `description`, `position`, `group`, `mail`) VALUES (?,?,?,?,?)";

        $i = 1;
        foreach($states as $state) {
            $record = $this->db->fetchOne($selectSQL, array($state['description']));
            if(!$record) {
                $recordId = $id + $i;
                $this->db->query($sql, array($recordId, $state['description'], $state['position'], $state['group'], $state['mail']));
                $i++;
            }
        }
    }

    /**
     * generates a new attribute for the articles to
     * mark Trusted Shops articles
     */
    private function generateAttribute()
    {
        $this->em->addAttribute(
            's_articles_attributes',
            'swag',
            'is_trusted_shops_article',
            'tinyint(1)',
            true,
            0
        );

        $this->em->addAttribute(
            's_articles_attributes',
            'swag',
            'trusted_range',
            'int(11)',
            true,
            null
        );

        $this->em->addAttribute(
            's_articles_attributes',
            'swag',
            'trusted_duration',
            'varchar(20)',
            true,
            null
        );

        $this->em->generateAttributeModels(array('s_articles_attributes'));

        try {
            $sql = "CREATE INDEX swag_trusted_range ON s_articles_attributes (swag_trusted_range);";
            $this->db->query($sql);
        } catch (Exception $e) {
        }
    }

    /**
     * add the acl resource
     */
    protected function addACLResource()
    {
        $sql = "
            INSERT IGNORE INTO s_core_acl_resources (name) VALUES ('trustedshops');
            INSERT IGNORE INTO s_core_acl_privileges (resourceID,name) VALUES ( (SELECT id FROM s_core_acl_resources WHERE name = 'trustedshops'), 'read');
            INSERT IGNORE INTO s_core_acl_privileges (resourceID,name) VALUES ( (SELECT id FROM s_core_acl_resources WHERE name = 'trustedshops'), 'update');
            UPDATE s_core_menu SET resourceID = (SELECT id FROM s_core_acl_resources WHERE name = 'trustedshops') WHERE controller = 'trustedshops';";
        Shopware()->Db()->query($sql, array());
    }

    /**
     * deletes the acl resource
     */
    public function deleteACLResource()
    {
        $sql = "DELETE FROM s_core_acl_roles WHERE resourceID = (SELECT id FROM s_core_acl_resources WHERE name = 'trustedshops');
                DELETE FROM s_core_acl_privileges WHERE resourceID = (SELECT id FROM s_core_acl_resources WHERE name = 'trustedshops');
                DELETE FROM s_core_acl_resources WHERE name = 'trustedshops';";
        Shopware()->Db()->query($sql, array());
    }

    /**
     * creates the menu entry in the backend
     */
    private function createMenuEntry()
    {
        $this->createMenuItem(
            array(
                'label' => 'Trusted Shops',
                'controller' => 'TrustedShops',
                'class' => 'trusted-shops-icon',
                'action' => 'Index',
                'active' => 0,
                'parent' => $this->Menu()->findOneBy(array('label' => 'Marketing'))
            )
        );
    }

    /**
     * creates the DB tables on base of the Trusted Shops CustomModel
     */
    private function createSchema()
    {
        $this->registerCustomModels();

        $tool = new SchemaTool($this->em);

        $classes = array($this->em->getClassMetadata('Shopware\CustomModels\TrustedShops\TrustedShops'));

        try {
            $tool->createSchema($classes);
        } catch (Exception $e) {
        }
    }

    /**
     * migrates the data from the old excellence plugin and the core integration
     * to new DB table
     *
     * @param $pluginId
     */
    private function doMigration($pluginId)
    {
        $migrationService = new MigrationService($this->em);
        $migrationService->migrateData($pluginId);
    }
}
