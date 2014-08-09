<?php
/**
 * some function for debug
 * Made in 'Mwl'
 */


require_once 'FirePHP.class.php';

class myDebug
{
	static protected $_firephp = null;
	
	protected static function _firephp()
	{
		if(is_null(self::$_firephp)){
			self::$_firephp = FirePHP::getInstance(true);
		}
		return self::$_firephp;
	}
	
	public static function dump($vars, $label = null)
	{
	    return self::_firephp()->fb($vars, $label);
	}
}


function fdump($vars, $label = null)
{
    return myDebug::dump($vars, $label);
}
