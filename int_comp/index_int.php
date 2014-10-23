<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/../framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';
/*@error_reporting (E_ALL);

ini_set("display_errors","1");
if (version_compare(phpversion(), "5.0.0", ">")==1) {
    ini_set("error_reporting", E_ALL | E_STRICT);
} else {
    ini_set("error_reporting", E_ALL);
}*/
// remove the following lines when in production mode
//defined('YII_DEBUG') or define('YII_DEBUG',true);

ini_set('memory_limit', '512M');
ini_set('set_time_limit', '240');

error_reporting(E_ALL & ~E_NOTICE);
defined('YII_DEBUG') or define('YII_DEBUG',true);

// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);
require_once($yii);
Yii::createWebApplication($config)->run();