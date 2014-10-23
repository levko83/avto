<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.

include __DIR__."/../../../protected/config/db_settings.php";

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Console Application',

	// preloading 'log' component
	'preload'=>array('log'),

    'import'=>array(
        'application.models.*',
        'application.components.*',
    ),

	// application components
	'components'=>array(
        'db'=>array(
            'class' => 'system.db.CDbConnection',
            'connectionString' => "mysql:host={$_db_settings->host};dbname={$_db_settings->parser_db_name}",
            'emulatePrepare' => true,
            'username' => $_db_settings->parser_db_user,
            'password' => $_db_settings->parser_db_pass,
            'charset' => 'utf8',
            'tablePrefix'=>'SC_',
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