<?php
class Shopware_Proxies_sCoreProxy extends sCore implements Enlight_Hook_Proxy
{
    public function executeParent($method, $args = array())
    {
        return call_user_func_array(array($this, 'parent::' . $method), $args);
    }

    public static function getHookMethods()
    {
        return array ();
    }
    
}
