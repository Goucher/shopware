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

use Shopware\Components\Model\ModelManager;
use Shopware\Models\Shop\Repository;

/**
 * Shopware SwagTrustedShopsExcellence Plugin - TrustedShops Component
 *
 * @category  Shopware
 * @package   Shopware\Plugins\SwagTrustedShopsExcellence\Components
 * @copyright Copyright (c) shopware AG (http://www.shopware.com)
 */
class Config
{
    /**
     * @var ModelManager
     */
    private $em;

    /**
     * @var \Zend_Locale
     */
    private $locale;

    /**
     * @param ModelManager $em
     * @param $locale
     */
    public function __construct(ModelManager $em, \Zend_Locale $locale)
    {
        $this->em = $em;
        $this->locale = $locale;
    }

    /**
     * collects the settings data for the committed shopId
     *
     * @param $shopId
     * @return array
     */
    public function getSettings($shopId)
    {
        if (!$shopId) {
            /** @var Repository $shopRepository */
            $shopRepository = $this->em->getRepository('Shopware\Models\Shop\Shop');
            $shop = $shopRepository->getActiveDefault();
            $shopId = $shop->getId();
        }

        $builder = $this->em->createQueryBuilder();
        $builder->select(array('settings'))
                ->from('Shopware\CustomModels\TrustedShops\TrustedShops', 'settings')
                ->where('settings.shopId = :shopId')
                ->setParameters(array('shopId' => $shopId));

        $data = $builder->getQuery()->getArrayResult();

        if (empty($data)) {
            $data = $this->getDefaultData($shopId, $builder);
        }

        if (array_key_exists(0, $data)) {
            $data = $data[0];
        }

        return $data;
    }

    protected function getDefaultData($shopId, $builder)
    {
        $shopRepository = $this->em->getRepository('Shopware\Models\Shop\Shop');
        $shop = $shopRepository->getActiveDefault();

        //get default shop's settings
        $builder->setParameters(array('shopId' => $shop->getId()));
        $data = $builder->getQuery()->getArrayResult();

        if (array_key_exists(0, $data)) {
            $data = $data[0];
        }

        //check whether default shop's settings are empty too
        if (empty($data)) {
            $data = array(
                'id' => $shopId,
                'shopId' => $shopId,
                'trustedShopsTestSystem' => 0,
                'trustedShopsShowRatingWidget' => 1,
                'trustedShopsShowRatingsButtons' => 0,
                'trustedShopsRateLaterDays' => 7,
                'trustedShopsLanguageRatingButtons' => 'de',
                'trustedShopsWidthRatingButtons' => 290
            );
        } else {
            $data['id'] = $shopId;
            $data['shopId'] = $shopId;
            $data['emptyId'] = $data['trustedShopsId'];
            $data['emptyUser'] = $data['trustedShopsUser'];
            $data['emptyPassword'] = $data['trustedShopsPassword'];

            $data['trustedShopsId'] = '';
            $data['trustedShopsUser'] = '';
            $data['trustedShopsPassword'] = '';
            $data['trustedShopsTrustBadgeCode'] = '';
        }

        return $data;
    }

    /**
     * Returns the Trusted Shops config used in the frontend
     *
     * @param $shopId
     * @return array
     */
    public function getTrustedShopBasicConfig($shopId)
    {
        $config = $this->getSettings($shopId);

        $sql = "SELECT id, description
				FROM s_core_states
				WHERE description LIKE 'TS - Antrag%'
				ORDER BY id";
        $states = $this->em->getConnection()->fetchAll($sql);

        //set trusted shop parameters
        $trustedShop = array(
            'id' => $config['trustedShopsId'],
            'rating_active' => $config['trustedShopsShowRatingWidget'],
            'rating_buttons' => $config['trustedShopsShowRatingsButtons'],
            'rating_link' => $this->getRatingLink($config['trustedShopsId']),
            'rate_later_days' => $config['trustedShopsRateLaterDays'],
            'user' => $config['trustedShopsUser'],
            'pw' => $config['trustedShopsPassword'],
            'trustBadgeCode' => $config['trustedShopsTrustBadgeCode'],
            'stateWaiting' => $states[0],
            'stateSuccess' => $states[1],
            'stateError' => $states[2]
        );

        return $trustedShop;
    }

    /**
     * This function returns the rating link for Trusted Shops.
     *
     * @param $tsID
     * @return string
     */
    private function getRatingLink($tsID)
    {
        $isoCode = $this->locale->toString();

        switch ($isoCode) {
            case 'de_DE':
                return 'https://www.trustedshops.de/bewertung/info_' . $tsID . '.html';
            case 'de_AT':
                return 'https://www.trustedshops.at/bewertung/info_' . $tsID . '.html';
            case 'de_CH':
                return 'https://www.trustedshops.ch/bewertung/info_' . $tsID . '.html';
            case 'fr_FR':
                return 'https://www.trustedshops.fr/evaluation/info_' . $tsID . '.html';
            case 'es_ES':
                return 'https://www.trustedshops.es/evaluacion/info_' . $tsID . '.html';
            case 'pl_PL':
                return 'https://www.trustedshops.pl/opinia/info_' . $tsID . '.html';
            default:
                return 'https://www.trustedshops.com/buyerrating/info_' . $tsID . '.html';
        }
    }

    /**
     * This function maps the shopware payments with the Trusted Shops payments
     *
     * @param $payment
     * @return string
     */
    public function getTsPaymentCode($payment)
    {
        switch (strtolower($payment)) {
            case 'cash':
                return 'CASH_ON_DELIVERY';

            case 'clickandbuy':
                return 'CLICKANDBUY';

            case 'debit':
            case 'sofortlastschrift_multipay':
            case 'lastschriftbysofort_multipay':
            case 'heidelpay_dd':
            case 'heidelpay_sue':
            case 'heidelpay_gir':
                return 'DIRECT_DEBIT';

            case 'invoice':
            case 'sofortrechnung_multipay':
            case 'billsafe_invoice':
            case 'PaymorrowInvoice':
            case 'heidelpay_iv':
            case 'KlarnaInvoice':
                return 'INVOICE';

            case 'ipayment':
            case 'skrill':
            case 'BuiswPaymentPayone':
            case 'heidelpay_cc':
            case 'heidelpay_dc':
            case 'heidelpay_ide':
                return 'CREDIT_CARD';

            case 'moneybookers':
                return 'OTHER';

            case 'paypalexpress':
            case 'heidelpay_pay':
                return 'PAYPAL';

            case 'prepayment':
            case 'vorkassebysofort_multipay':
            case 'heidelpay_pp':
                return 'PREPAYMENT';

            case 'saferpay':
                return 'CREDIT_CARD';

            case 'sofortueberweisung':
            case 'sofortueberweisung_multipay':
                return 'DIRECT_E_BANKING';

            default:
                return 'OTHER';
        }
    }
}
