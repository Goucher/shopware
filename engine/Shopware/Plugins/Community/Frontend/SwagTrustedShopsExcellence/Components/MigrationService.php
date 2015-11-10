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

use Doctrine\DBAL\Connection;
use Shopware\Components\Model\ModelManager;
use Shopware\CustomModels\TrustedShops\TrustedShops;
use Shopware\Models\Shop\Repository;
use Shopware\Models\Shop\Shop;

/**
 * Shopware SwagTrustedShopsExcellence Plugin - MigrationService Component
 *
 * @category  Shopware
 * @package   Shopware\Plugins\SwagTrustedShopsExcellence\Components
 * @copyright Copyright (c) shopware AG (http://www.shopware.com)
 */
class MigrationService
{
    /**
     * @var ModelManager $em
     */
    private $em;

    /**
     * @var Connection $db
     */
    private $db;

    /**
     * initialises $em as ModelManager
     * initialises $db as DB component
     *
     * @param ModelManager $em
     */
    public function __construct(ModelManager $em)
    {
        $this->em = $em;
        $this->db = $em->getConnection();
    }

    /**
     * gets the old data of the Trusted Shops core integration and the Trusted Shops Excellence plugin
     * and fills them into the new DB table of this plugin
     *
     * @param $pluginId
     */
    public function migrateData($pluginId)
    {
        $tsValues = $this->getTsClassicData();
        $tsExcValues = $this->getTsExcellenceData($pluginId);

        /** @var Repository $shopRepository */
        $shopRepository = $this->em->getRepository('Shopware\Models\Shop\Shop');
        $shops = $shopRepository->getActiveShops();
        /** @var Shop $shop */
        foreach ($shops as $shop) {
            if (!$shop) {
                continue;
            }

            $shopId = $shop->getId();
            $oldTsId = $tsValues[$shopId];
            $oldTsEID = $tsExcValues['tsEID'][$shopId];
            $oldTsWebServiceUser = $tsExcValues['tsWebServiceUser'][$shopId];
            $oldTsWebServicePassword = $tsExcValues['tsWebServicePassword'][$shopId];
            $tsExcValues['testSystemActive'][$shopId] ? $oldTestSystemActive = $tsExcValues['testSystemActive'][$shopId] : $oldTestSystemActive = 0;
            $tsExcValues['ratingActive'][$shopId] ? $oldRatingActive = $tsExcValues['ratingActive'][$shopId] : $oldRatingActive = 1;

            /* @var TrustedShops $trustedShopsModel */
            $trustedShopsModel = $this->em->getRepository('Shopware\CustomModels\TrustedShops\TrustedShops')->findOneBy(
                array('shopId' => $shopId)
            );

            if (!$oldTsId && !$oldTsEID) {
                continue;
            }

            if (!$trustedShopsModel) {
                $trustedShopsModel = new TrustedShops;
                $trustedShopsModel->setShopId($shopId);
                $oldTsEID ? $trustedShopsModel->setTrustedShopsId($oldTsEID) : $trustedShopsModel->setTrustedShopsId(
                    $oldTsId
                );
                $trustedShopsModel->setTrustedShopsUser($oldTsWebServiceUser);
                $trustedShopsModel->setTrustedShopsPassword($oldTsWebServicePassword);
                $trustedShopsModel->setTrustedShopsTestSystem($oldTestSystemActive);
                $trustedShopsModel->setTrustedShopsShowRatingWidget($oldRatingActive);
                $trustedShopsModel->setTrustedShopsShowRatingsButtons(0);
                $trustedShopsModel->setTrustedShopsRateLaterDays(7);
            }

            $this->em->persist($trustedShopsModel);
            $this->em->flush();
        }

        $this->deactivateOldTsComponents();
    }

    /**
     * gets the values from the core integration
     *
     * @return array
     */
    private function getTsClassicData()
    {
        $tsElementId = $this->getTsClassicElementId();

        $sql = 'SELECT shop_id, value
                FROM `s_core_config_values`
                WHERE `element_id` = ?';
        $tsValuesTemp = $this->db->fetchAll($sql, array($tsElementId));

        $tsValues = array();
        foreach ($tsValuesTemp as $value) {
            $tsValues[$value['shop_id']] = unserialize($value['value']);
        }

        return $tsValues;
    }

    /**
     * returns the Trusted Shops Classic formID
     *
     * @return int
     */
    private function getTsClassicFormId()
    {
        $sql = "SELECT id
                FROM  `s_core_config_forms`
                WHERE  `name` LIKE  'TrustedShop'";
        $tsFormId = $this->db->fetchColumn($sql);

        return $tsFormId;
    }

    /**
     * returns the Trusted Shops Classic elementID
     *
     * @return int
     */
    private function getTsClassicElementId()
    {
        $tsFormId = $this->getTsClassicFormId();

        $sql = "SELECT id
                FROM `s_core_config_elements`
                WHERE `form_id` = ?";
        $tsElementId = $this->db->fetchColumn($sql, array($tsFormId));

        return $tsElementId;
    }

    /**
     * gets the values of the excellence plugin
     *
     * @return array
     * @param $pluginId
     */
    private function getTsExcellenceData($pluginId)
    {
        $sql = "SELECT id
                FROM  `s_core_config_forms`
                WHERE  `plugin_id` = ?";
        $tsExcFormId = $this->db->fetchColumn($sql, array($pluginId));

        $sql = "SELECT id, name, value
                FROM `s_core_config_elements`
                WHERE `form_id` = ?";
        $tsExcElementsTemp = $this->db->fetchAll($sql, array($tsExcFormId));

        $tsExcElements = array();
        foreach ($tsExcElementsTemp as $element) {
            $tsExcElements[] = array(
                'id' => $element['id'],
                'name' => $element['name'],
                'defaultValue' => $element['value']
            );
        }

        $tsExcValuesTemp = array();
        foreach ($tsExcElements as $element) {
            $sql = "SELECT shop_id,element_id, value
                    FROM `s_core_config_values`
                    WHERE `element_id` = ?";
            $tsExcValuesTemp[] = $this->db->fetchAll($sql, array($element['id']));
        }

        //converts the data into a nice array
        $tsExcValues = array();
        foreach ($tsExcElements as $element) {
            foreach ($tsExcValuesTemp as $values) {
                if (empty($values)) {
                    continue;
                }
                foreach ($values as $value) {
                    if ($element['id'] == $value['element_id']) {
                        $tsExcValues[$element['name']][$value['shop_id']] = unserialize($value['value']);
                    }
                }
            }
        }

        return $tsExcValues;
    }

    /**
     * deletes the entries for the TS Classic core integration
     */
    private function deactivateOldTsComponents()
    {
        $tsFormId = $this->getTsClassicFormId();
        $tsElementId = $this->getTsClassicElementId();

        $sql = "DELETE FROM s_core_config_elements
	            WHERE id = ?";
        $this->db->executeUpdate($sql, array($tsElementId));

        $sql = "DELETE FROM s_core_config_element_translations
	            WHERE element_id = ?";
        $this->db->executeUpdate($sql, array($tsElementId));

        $sql = "DELETE FROM s_core_config_forms
	            WHERE id = ?";
        $this->db->executeUpdate($sql, array($tsFormId));

        $sql = "DELETE FROM s_core_config_form_translations
	            WHERE form_id = ?";
        $this->db->executeUpdate($sql, array($tsFormId));
    }
}
