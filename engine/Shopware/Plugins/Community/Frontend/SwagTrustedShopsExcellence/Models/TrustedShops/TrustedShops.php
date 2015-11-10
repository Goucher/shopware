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

namespace Shopware\CustomModels\TrustedShops;

use Shopware\Components\Model\ModelEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Shopware SwagTrustedShopsExcellence Plugin - TrustedShops Model
 *
 * @category Shopware
 * @package  Shopware\Plugins\SwagTrustedShopsExcellence\Models
 * @copyright Copyright (c) shopware AG (http://www.shopware.com)
 *
 * @ORM\Entity
 * @ORM\Table(name="s_plugin_swag_trusted_shops")
 */
class TrustedShops extends ModelEntity
{
    /**
     * @var integer $shopId
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $shopId;

    /**
     * @var string $trustedShopId
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $trustedShopsId;

    /**
     * @var string $trustedShopsUser
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $trustedShopsUser;

    /**
     * @var string $trustedShopsPassword
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $trustedShopsPassword;

    /**
     * @var boolean $trustedShopsTestSystem
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $trustedShopsTestSystem;

    /**
     * @var boolean $trustedShopsShowRatingWidget
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $trustedShopsShowRatingWidget;

    /**
     * @var boolean $trustedShopsShowRatingsButtons
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $trustedShopsShowRatingsButtons;

    /**
     * @var int $trustedShopsRateLaterDays
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $trustedShopsRateLaterDays;

    /**
     * @var string $trustedShopsLanguageRatingButtons
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $trustedShopsLanguageRatingButtons;

    /**
     * @var int $trustedShopsWidthRatingButtons
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $trustedShopsWidthRatingButtons;

    /**
     * @var string $trustedShopsTrustBadgeCode
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $trustedShopsTrustBadgeCode;

    /**
     * @var int $trustedShopsInStockDeliveryTime
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $trustedShopsInStockDeliveryTime;

    /**
     * @var int $trustedShopsNotInStockDeliveryTime
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $trustedShopsNotInStockDeliveryTime;

    /**
     * @param int $shopId
     */
    public function setShopId($shopId)
    {
        $this->shopId = $shopId;
    }

    /**
     * @return int
     */
    public function getShopId()
    {
        return $this->shopId;
    }

    /**
     * @param string $trustedShopId
     */
    public function setTrustedShopsId($trustedShopId)
    {
        $this->trustedShopsId = $trustedShopId;
    }

    /**
     * @return string
     */
    public function getTrustedShopsId()
    {
        return $this->trustedShopsId;
    }

    /**
     * @param string $trustedShopsUser
     */
    public function setTrustedShopsUser($trustedShopsUser)
    {
        $this->trustedShopsUser = $trustedShopsUser;
    }

    /**
     * @return string
     */
    public function getTrustedShopsUser()
    {
        return $this->trustedShopsUser;
    }

    /**
     * @param string $trustedShopsPassword
     */
    public function setTrustedShopsPassword($trustedShopsPassword)
    {
        $this->trustedShopsPassword = $trustedShopsPassword;
    }

    /**
     * @return string
     */
    public function getTrustedShopsPassword()
    {
        return $this->trustedShopsPassword;
    }

    /**
     * @param boolean $trustedShopsTestSystem
     */
    public function setTrustedShopsTestSystem($trustedShopsTestSystem)
    {
        $this->trustedShopsTestSystem = $trustedShopsTestSystem;
    }

    /**
     * @return boolean
     */
    public function getTrustedShopsTestSystem()
    {
        return $this->trustedShopsTestSystem;
    }

    /**
     * @param boolean $trustedShopsShowRatingWidget
     */
    public function settrustedShopsShowRatingWidget($trustedShopsShowRatingWidget)
    {
        $this->trustedShopsShowRatingWidget = $trustedShopsShowRatingWidget;
    }

    /**
     * @return boolean
     */
    public function gettrustedShopsShowRatingWidget()
    {
        return $this->trustedShopsShowRatingWidget;
    }

    /**
     * @param boolean $trustedShopsShowRatingsButtons
     */
    public function setTrustedShopsShowRatingsButtons($trustedShopsShowRatingsButtons)
    {
        $this->trustedShopsShowRatingsButtons = $trustedShopsShowRatingsButtons;
    }

    /**
     * @return boolean
     */
    public function getTrustedShopsShowRatingsButtons()
    {
        return $this->trustedShopsShowRatingsButtons;
    }

    /**
     * @param int $trustedShopsRateLaterDays
     */
    public function setTrustedShopsRateLaterDays($trustedShopsRateLaterDays)
    {
        $this->trustedShopsRateLaterDays = $trustedShopsRateLaterDays;
    }

    /**
     * @return int
     */
    public function getTrustedShopsRateLaterDays()
    {
        return $this->trustedShopsRateLaterDays;
    }

    /**
     * @param string $trustedShopsLanguageRatingButtons
     */
    public function setTrustedShopsLanguageRatingButtons($trustedShopsLanguageRatingButtons)
    {
        $this->trustedShopsLanguageRatingButtons = $trustedShopsLanguageRatingButtons;
    }

    /**
     * @return string
     */
    public function getTrustedShopsLanguageRatingButtons()
    {
        return $this->trustedShopsLanguageRatingButtons;
    }

    /**
     * @param int $trustedShopsWidthRatingButtons
     */
    public function setTrustedShopsWidthRatingButtons($trustedShopsWidthRatingButtons)
    {
        $this->trustedShopsWidthRatingButtons = $trustedShopsWidthRatingButtons;
    }

    /**
     * @return int
     */
    public function getTrustedShopsWidthRatingButtons()
    {
        return $this->trustedShopsWidthRatingButtons;
    }

    /**
     * @return string
     */
    public function getTrustedShopsTrustBadgeCode()
    {
        return $this->trustedShopsTrustBadgeCode;
    }

    /**
     * @param string $trustedShopsTrustBadgeCode
     */
    public function setTrustedShopsTrustBadgeCode($trustedShopsTrustBadgeCode)
    {
        $this->trustedShopsTrustBadgeCode = $trustedShopsTrustBadgeCode;
    }

    /**
     * @return int
     */
    public function getTrustedShopsInStockDeliveryTime()
    {
        return $this->trustedShopsInStockDeliveryTime;
    }

    /**
     * @param int $trustedShopsInStockDeliveryTime
     * @return $this
     */
    public function setTrustedShopsInStockDeliveryTime($trustedShopsInStockDeliveryTime)
    {
        $this->trustedShopsInStockDeliveryTime = $trustedShopsInStockDeliveryTime;

        return $this;
    }

    /**
     * @return int
     */
    public function getTrustedShopsNotInStockDeliveryTime()
    {
        return $this->trustedShopsNotInStockDeliveryTime;
    }

    /**
     * @param int $trustedShopsNotInStockDeliveryTime
     * @return $this
     */
    public function setTrustedShopsNotInStockDeliveryTime($trustedShopsNotInStockDeliveryTime)
    {
        $this->trustedShopsNotInStockDeliveryTime = $trustedShopsNotInStockDeliveryTime;

        return $this;
    }
}
