<?php

// трюк для поддержки в PhpStorm


require(dirname(__FILE__) . '/framework/YiiBase.php');
class Yii extends YiiBase {
    /**
     * @static
     * @return CWebApplication
     */
    public static function app()
    {
        return parent::app();
    }
}
// ------------------------------------
date_default_timezone_set("Europe/Kiev");

error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
//error_reporting(E_ALL & E_NOTICE & E_WARNING);

#error_reporting(E_ALL);

// change the following paths if necessary
//$yii=dirname(__FILE__).'/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
$is_debug = substr($_SERVER["HTTP_HOST"], -4) == ".loc" ? true : false;
defined('YII_DEBUG') or define('YII_DEBUG', true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',100);

//require_once($yii);
Yii::createWebApplication($config)->run();
