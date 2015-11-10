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

use Shopware\CustomModels\TrustedShops\TrustedShops;
use Shopware\SwagTrustedShopsExcellence\Components\Config;
use Shopware\SwagTrustedShopsExcellence\Components\SoapApi;

/**
 * Shopware SwagTrustedShopsExcellence Plugin - TrustedShops Backend Controller
 *
 * @category  Shopware
 * @package   Shopware\Plugins\SwagTrustedShopsExcellence\Controllers\Backend
 * @copyright Copyright (c) shopware AG (http://www.shopware.com)
 */
class Shopware_Controllers_Backend_TrustedShops extends Shopware_Controllers_Backend_ExtJs
{
    protected function initAcl()
    {
        //read module
        $this->addAclPermission('getSettings', 'read', 'Insufficient Permissions');

        $this->addAclPermission('setSettings', 'update', 'Insufficient Permissions');
        $this->addAclPermission('importBuyerProtectionItems', 'update', 'Insufficient Permissions');
        $this->addAclPermission('connectionTest', 'update', 'Insufficient Permissions');
    }

    /**
     * returns the TrustedShops component
     *
     * @return Config
     */
    private function getConfigComponent()
    {
        return $this->get('trusted_shops_config');
    }

    /**
     * returns the TrustedShops component
     *
     * @return SoapApi
     */
    private function getSoapApiComponent()
    {
        return $this->get('trusted_shops_soapApi');
    }

    /**
     * returns the Shopware Auth component
     *
     * @return Shopware_Components_Auth
     */
    private function getShopwareAuth()
    {
        return $this->get('auth');
    }

    /**
     * method that returns the settings to the backend module
     */
    public function getSettingsAction()
    {
        $shopId = $this->Request()->getParam('shopId');

        $data = $this->getConfigComponent()->getSettings($shopId);

        $locale = substr($this->getShopwareAuth()->getIdentity()->locale->getLocale(), 0, 2);
        $data['trustedShopsBackendLanguage'] = $locale;

        $this->View()->assign(array('data' => $data, 'success' => true,));
    }

    /**
     * sets the settings for the committed shop
     */
    public function setSettingsAction()
    {
        $request = $this->Request();
        $trustedShopsParams = $request->getParams();

        /* @var TrustedShops $trustedShopsModel */
        $trustedShopsModel = $this->getModelManager()->getRepository('Shopware\CustomModels\TrustedShops\TrustedShops')
            ->findOneBy(array('shopId' => $trustedShopsParams['shopId']));

        if ($trustedShopsModel) {
            $trustedShopsModel->fromArray($trustedShopsParams);
        } else {
            $trustedShopsModel = new TrustedShops;
            $trustedShopsModel->fromArray($trustedShopsParams);
        }

        $this->getModelManager()->persist($trustedShopsModel);
        $this->getModelManager()->flush();

        $isExcellence = $this->getSoapApiComponent()->checkCertificateTypeIfExcellence($trustedShopsParams['shopId'], true);

        if (!$isExcellence) {
            $this->getSoapApiComponent()->deleteTrustedShopsArticles();
        }

        $this->View()->assign(array('data' => $trustedShopsParams['shopId'], 'success' => true,));
    }

    /**
     * Fires when the user click on "Test connection" button in the plugin
     *
     * @return void
     */
    public function connectionTestAction()
    {
        $shopId = $this->Request()->getParam('shopId');
        $data = $this->getSoapApiComponent()->getTrustedShopsData($shopId);
        $message = '';

        $status = $data->status;
        $wsLoginOK = $data->wsLoginOK;
        $certificateType = $data->certificateType;
        $certificatedState = $data->certificateState;

        if ($data == 'noTsId') {
            $message .= $this->createMessageTag('connectionTest/noTsId');
        } elseif ($data == 'noTsUser') {
            $message .= $this->createMessageTag('connectionTest/noTsUser');
        } elseif ($data == 'noTsPassword') {
            $message .= $this->createMessageTag('connectionTest/noTsPassword');
        }

        if ($status == 'INVALID_TS_ID') {
            $message .= $this->createMessageTag('connectionTest/INVALID_TS_ID');
        } elseif ($status == 'SHOP_NOT_FOUND') {
            $message .= $this->createMessageTag('connectionTest/SHOP_NOT_FOUND');
        } elseif ($status == 'SERVICE_EXCEPTION') {
            $message .= $this->createMessageTag('connectionTest/SERVICE_EXCEPTION');
        }

        if ($wsLoginOK) {
            $message .= $this->createMessageTag('connectionTest/OK');
        } else {
            $message .= $this->createMessageTag('connectionTest/FAIL');

            if ($certificateType == 'CLASSIC') {
                $message .= $this->createMessageTag('connectionTest/CLASSIC');
            } elseif ($certificateType == 'C2E') {
                $message .= $this->createMessageTag('connectionTest/C2E');
            } elseif ($certificateType == 'NO_BUYER_PROTECTION') {
                $message .= $this->createMessageTag('connectionTest/NO_BUYER_PROTECTION');
            } elseif ($certificateType == 'EXCELLENCE') {
                $message .= $this->createMessageTag('connectionTest/EXCELLENCE');
            }
        }

        if ($certificatedState == 'PRODUCTION') {
            $message .= $this->createMessageTag('connectionTest/certificate/PRODUCTION');
        } elseif ($certificatedState == 'CANCELLED') {
            $message .= $this->createMessageTag('connectionTest/certificate/CANCELLED');
        } elseif ($certificatedState == 'DISABLED') {
            $message .= $this->createMessageTag('connectionTest/certificate/DISABLED');
        } elseif ($certificatedState == 'NO_AUDIT') {
            $message .= $this->createMessageTag('connectionTest/certificate/NO_AUDIT');
        } elseif ($certificatedState == 'INTEGRATION') {
            $message .= $this->createMessageTag('connectionTest/certificate/INTEGRATION');
        } elseif ($certificatedState == 'TEST') {
            $message .= $this->createMessageTag('connectionTest/certificate/TEST');
        } elseif ($certificatedState == 'INVALID_TS_ID') {
            $message .= $this->createMessageTag('connectionTest/certificate/INVALID_TS_ID');
        }

        $this->View()->assign(array('success' => true, 'message' => $message));
    }

    /**
     * Fires when the user click on "Import buyer protection articles" button in the plugin
     *
     * @return void
     */
    public function importBuyerProtectionItemsAction()
    {
        $shopId = $this->Request()->getParam('shopId');
        //import the trusted shop buyer protection items
        $data = $this->getSoapApiComponent()->updateTrustedShopsProtectionItems($shopId);
        $message = '';

        if ($data == 'noTsId') {
            $message .= $this->createMessageTag('import/noTsId');
        } elseif ($data == 'noTsUser') {
            $message .= $this->createMessageTag('import/noTsUser');
        } elseif ($data == 'noTsPassword') {
            $message .= $this->createMessageTag('import/noTsPassword');
        }

        $status = $data->status;

        if ($status == 'INVALID_TS_ID') {
            $message .= $this->createMessageTag('import/INVALID_TS_ID');
        } elseif ($status == 'SHOP_NOT_FOUND') {
            $message .= $this->createMessageTag('import/SHOP_NOT_FOUND');
        } elseif ($status == 'SERVICE_EXCEPTION') {
            $message .= $this->createMessageTag('import/SERVICE_EXCEPTION');
        }

        if ($data == 'SUCCESS') {
            $message .= $this->createMessageTag('import/OK');
        } else {
            $certificateType = $data->certificateType;

            $message .= $this->createMessageTag('import/FAIL');

            if ($certificateType == 'CLASSIC') {
                $message .= $this->createMessageTag('connectionTest/CLASSIC');
            } elseif ($certificateType == 'C2E') {
                $message .= $this->createMessageTag('connectionTest/C2E');
            } elseif ($certificateType == 'NO_BUYER_PROTECTION') {
                $message .= $this->createMessageTag('connectionTest/NO_BUYER_PROTECTION');
            } elseif ($certificateType == 'EXCELLENCE') {
                $message .= $this->createMessageTag('connectionTest/EXCELLENCE');
            }
        }

        $this->View()->assign(array('success' => true, 'message' => $message));
    }

    /**
     * Internal helper function to create the message tag
     *
     * @param $errorKey
     * @return string
     */
    private function createMessageTag($errorKey)
    {
        /* @var $namespace Enlight_Components_Snippet_Namespace */
        $namespace = $this->get('snippets')->getNamespace('backend/trusted_shops/view/main');
        $message = $namespace->get($errorKey);

        return '<p>' . $message . '</p>';
    }
}
