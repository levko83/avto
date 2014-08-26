<?php

// change the following paths if necessary

ini_set("memory_limit", "512M");

error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

$yiic=dirname(__FILE__).'/../framework/yiic.php';

$config=dirname(__FILE__).'/config/console.php';

require_once($yiic);
