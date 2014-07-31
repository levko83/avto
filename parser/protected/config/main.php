<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
$cfg = array(
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
			'password'=>'123',
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
			'connectionString' => 'mysql:host=localhost;dbname=avto_parser',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'cbljyjdcnfybckfd',
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
                'webRoot'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..',
	),
);

// локльная разработка
$localDbConn = array(
    'db'=>array(
        'class'=>'system.db.CDbConnection',
        'connectionString' => 'mysql:host=localhost;dbname=avto_parser',
        'emulatePrepare' => true,
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
        'tablePrefix'=>'SC_',
    ),
    'db1'=>array(
        'class'=>'system.db.CDbConnection',
        'connectionString' => 'mysql:host=localhost;dbname=avto_shins_new',
        'emulatePrepare' => true,
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
    ),
);

// удаленный сервер
$remoteDbConn = array(
    'db'=>array(
        'class'=>'system.db.CDbConnection',
        'connectionString' => 'mysql:host=localhost;dbname=avto_parser',
        'emulatePrepare' => true,
        'username' => 'root',
        'password' => 'cbljyjdcnfybckfd',
        'charset' => 'utf8',
        'tablePrefix'=>'SC_',
    ),
    'db1'=>array(
        'class'=>'system.db.CDbConnection',
        'connectionString' => 'mysql:host=localhost;dbname=avto',
        'emulatePrepare' => true,
        'username' => 'root',
        'password' => 'cbljyjdcnfybckfd',
        'charset' => 'utf8',        
    ),
);

$currDB = PHP_OS == "WINNT" ? $localDbConn : $remoteDbConn;

foreach($currDB as $k => $v){
    $cfg["components"][$k] = $v;
}

return $cfg;