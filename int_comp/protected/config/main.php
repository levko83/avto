<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

include __DIR__."/../../../protected/config/db_settings.php";

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Integration comp.',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool

		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'111',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),

	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
		/*'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		// uncomment the following to use a MySQL database

		'db'=>array(
            'class' => 'system.db.CDbConnection',
			'connectionString' => "mysql:host={$_db_settings->host};dbname={$_db_settings->parser_db_name}",
			'emulatePrepare' => true,
			'username' => $_db_settings->parser_db_user,
			'password' => $_db_settings->parser_db_pass,
			'charset' => 'utf8',
            'tablePrefix'=>'SC_',
		),

        'db_main'=>array(
            'class' => 'system.db.CDbConnection',
            'connectionString' => "mysql:host={$_db_settings->host};dbname={$_db_settings->main_db_name}",
            'emulatePrepare' => true,
            'username' => $_db_settings->main_db_user,
            'password' => $_db_settings->main_db_pass,
            'charset' => 'utf8',
            'tablePrefix'=>'SC_',
        ),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
		'cache'=>array(
            'class'=>'system.caching.CFileCache',
        ),
        'settings'=>array(
            'class'                 => 'application.extensions.CmsSettings',
            'cacheComponentId'  => 'cache',
            'cacheId'           => 'global_website_settings',
            'cacheTime'         => 84000,
            'tableName'     => '{{int_settings}}',
            'dbComponentId'     => 'db',
            'createTable'       => true,
            'dbEngine'      => 'InnoDB',
        ),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);