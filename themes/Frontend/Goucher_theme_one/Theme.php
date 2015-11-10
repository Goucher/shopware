<?php

namespace Shopware\Themes\Goucher_theme_one;

use Shopware\Components\Form as Form;

class Theme extends \Shopware\Components\Theme
{
    protected $extend = 'Responsive';

    protected $name = <<<'SHOPWARE_EOD'
Goucher Theme V 1.0
SHOPWARE_EOD;

    protected $description = <<<'SHOPWARE_EOD'
Goucher Theme
SHOPWARE_EOD;

    protected $author = <<<'SHOPWARE_EOD'
Jens Keull
SHOPWARE_EOD;

    protected $license = <<<'SHOPWARE_EOD'

SHOPWARE_EOD;

    public function createConfig(Form\Container\TabContainer $container)
    {
    }
}