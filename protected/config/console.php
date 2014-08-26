<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.

include "db_settings.php";

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Console Application',

	// preloading 'log' component
	'preload'=>array('log'),

	// application components
	'components'=>array(
		'db'=>array(
            'class'=>'system.db.CDbConnection',
            'enableProfiling' => true,
            'enableParamLogging' => true,
            'connectionString' => "mysql:host={$_db_settings->host};dbname={$_db_settings->main_db_name}",
            'emulatePrepare' => true,
            'username' => $_db_settings->main_db_user,
            'password' => $_db_settings->main_db_pass,
            'charset' => 'utf8',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
			),
		),
	),
);
