<?php

    // uncomment the following to define a path alias
    // Yii::setPathOfAlias('local','path/to/local-folder');

    // This is the main Web application configuration. Any writable
    // CWebApplication properties can be configured here.


    $cfg = array(
        'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
        'name'=>'Avto',
        'language' => 'ru',

        // preloading 'log' component
        'preload'=>array('log', 'session'),

        // autoloading model and component classes
        'import'=>array(
            'application.models.*',
            'application.components.*',
            'application.widgets.*',
            'ext.easyimage.EasyImage',
            'ext.yiiext.components.shoppingCart.*',
            'application.extensions.nestedset.*',
        ),

        //'theme'=>'bootstrap',

        'modules'=>array(
            'gii'=>array(
                'class'=>'system.gii.GiiModule',
                'password'=>'123',
                // If removed, Gii defaults to localhost only. Edit carefully to taste.
                'ipFilters'=>array('127.0.0.1','::1'),
            ),
            'admin' => array(
                'defaultController' => 'products',
            ),
        ),

        // application components
        'components'=>array(

            "session" => array(
                "autoStart" => true,
            ),

            'shoppingCart' =>
                array(
                    'class' => 'ext.yiiext.components.shoppingCart.EShoppingCart',
                ),

            'authManager' => array(
                'class' => 'PhpAuthManager',
                'defaultRoles' => array('guest'),
            ),

            'user'=>array(
                // enable cookie-based authentication
                'class' => 'WebUser',
                'allowAutoLogin' => true,
                'loginUrl' => array('admin/login/login'),
            ),
            /*
            'request'=>array(
                'enableCsrfValidation' => true,
            ),
             *
             */
            'viewRenderer'=>array(
                'class'=>'application.extensions.yiiext.renderers.smarty.ESmartyViewRenderer',
                  'fileExtension' => '.tpl',
                  //'pluginsDir' => 'application.smartyPlugins',
                  //'configDir' => 'application.smartyConfig',
                  //'prefilters' => array(array('MyClass','filterMethod')),
                  //'postfilters' => array(),
                  //'config'=>array(
                  //    'force_compile' => YII_DEBUG,
                  //   ... any Smarty object parameter
            ),
            /*
            'clientScript' => array(
                 'packages' => array(
                     'jquery' => array(
                         'baseUrl' => '/js/jquery-ui/',
                         'js' => array('jquery-1.8.3.js', 'jquery.blockUI.js', 'jquery.form.js'),
                     ),
                     'jquery-ui' => array(
                         'baseUrl' => '/js/jquery-ui/',
                         'js' => array('jquery-ui-1.9.2.custom.js'),
                         'css' => array('jquery-ui-1.9.2.custom.css'),
                         'depends' => array('jquery'),
                     ),
                     'colorbox' => array(
                         'baseUrl' => '/js/colorbox/',
                         'js' => array('jquery.colorbox.js', 'jquery.colorbox-ru.js'),
                         'css' => array('colorbox.css'),
                         'depends' => array('jquery'),
                     ),
                 ),
             ),
            */
            // uncomment the following to enable URLs in path-format
            'urlManager'=>array(
                'urlFormat' => 'path',
                'showScriptName' => false,
                'rules'=>array(
                                //array("class" => 'application.components.MainUrlRule'),
                                array("class" => 'application.components.TiresSubMenuUrlRule'),
                                array("class" => 'application.components.DrivesUrlRule'),
                                array("class" => 'application.components.TiresUrlRule'),
                                'index.html' => 'site/index',
                                //'tires.html' => 'tires/index',

                                //'shini-<type>.html' => array('tires/tiresSubMenu', "type" => "type") ,
                                //'shini-<type>-<type1>.html' => array('tires/tiresSubMenu', "type" => "type", "type1" => "type1") ,

                                'tires/<id:\d+>-<translit:[a-zA-Z0-9\_\/\-\.\,]+>.html' => 'tires/tire',
                                'diski-tipa-<type>.html' => 'drives/drivesSubMenu',
//                                'drives.html' => 'drives/index',
//                                'drives.html?filter=<filter>' => 'drives/index',
                                'drives/<id:\d+>-<translit:[a-zA-Z0-9\_\/\-\.\,]+>.html' => 'drives/drive',
                                'about.html' => "site/about",
                                'contacts.html' => "site/contacts",
                                'delivery.html' => 'site/delivery',
                                'delivery/<region_translit>.html' => 'site/deliveryRegion',
                                'delivery/<region_translit>/<city_translit>.html' => 'site/deliveryCity',
                                'order_detail.html' => 'cart/orderDetail',
//                                'shins/<id:\d+>__<linkProductName:[a-zA-Z0-9\_\/\-\.\,]+>.html' => 'site/viewShina',
//                                'shins.html' => 'site/shins',
//                                'disks.html' => 'site/disks',
//                                'search.html' => 'site/search',
                                // ЧПУ для админки
                                'admin' => 'admin/products/index',
                                'admin/login' => 'admin/login/login',
                                'admin/lock' => 'admin/login/lock',
                                'admin/changePass' => 'admin/users/changePass',
                                'admin/products/disks' => 'admin/products/disks',
                                'admin/products/shins' => 'admin/products/shins',
                                'admin/products/shins/edit' => 'admin/products/updateShins',
                                'admin/products/shins/edit/<id>' => 'admin/products/updateShins',
                                'admin/products/shins/delete/<id>' => 'admin/products/deleteShins',
                                'admin/products/disks/edit' => 'admin/products/updateDisks',
                                'admin/products/disks/edit/<id>' => 'admin/products/updateDisks',
                                'admin/products/disks/delete/<id>' => 'admin/products/deleteDisks',
                                'admin/products/news' => 'admin/products/news',
                                'admin/vendors' => 'admin/vendors/index',
                                'admin/vendors/edit/<id>' => 'admin/vendors/edit',
                                'admin/pages' => 'admin/pages/index',
                                'admin/pages/edit/<id>' => 'admin/pages/edit',
                                'admin/users' => 'admin/users/index',
                                'admin/<product_type>_vendors' => 'admin/vendors/productsVendorsIndex',
                                'admin/<product_type>_vendors/edit/<id>' => 'admin/vendors/productsVendorsEdit',
                ),
            ),
            'easyImage' => array(
                'class' => 'application.extensions.easyimage.EasyImage',
            ),
            'mobileDetect' => array(
                'class' => 'ext.MobileDetect.MobileDetect'
            ),
            // uncomment the following to use a MySQL database
            'errorHandler'=>array(
                // use 'site/error' action to display errors
                'errorAction'=>'site/error',
            ),
            'log' => array(
                'class'=>'CLogRouter',
                'routes'=>array(
                    array(
                        'class'=>'CFileLogRoute',
                        'levels'=>'trace, info, error',
                        'categories'=>'system.*',
                    ),
                    array(
                        'class' => 'CWebLogRoute',
                        'categories' => 'application',
                        'levels'=>'error, warning, trace, profile, info',
                    ),
                )
            ),
        ),

        // application-level parameters that can be accessed
        // using Yii::app()->params['paramName']
        'params'=>array(
            // this is used in contact page
            'adminEmail'=>'webmaster@example.com',
            'imagePath' => "http://extraload.com.ua/published/publicdata/FOSHINA/attachments/SC/products_pictures",
        ),
    );

    // локльная разработка
    $localDbConn = array(
        'db'=>array(
            'class'=>'system.db.CDbConnection',
            'enableProfiling' => true,
            'connectionString' => 'mysql:host=localhost;dbname=avto',
            'emulatePrepare' => true,
            'username' => 'avto',
            'password' => 'jkmufdjtdjl',
            'charset' => 'utf8',
        ),
        'sphinx'=>array(
            'class'=>'system.db.CDbConnection',
            'connectionString' => 'mysql:host=localhost;port=9306',
            'charset' => 'utf8',
            'enableProfiling' => true,
        ),
        'search' => array(
            'class' => 'application.components.DGSphinxSearch',
            'server' => 'localhost',
            'port' => 9312,
            'maxQueryTime' => 3000,
            'enableProfiling'=>1,
            'enableResultTrace'=>1,
            'fieldWeights' => array(
                'name' => 10000,
                'keywords' => 100,
            ),
        ),
        'db1'=>array(
            'class'=>'system.db.CDbConnection',
            'enableProfiling' => true,
            'connectionString' => 'mysql:host=localhost;dbname=avto_parser',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'tablePrefix'=>'SC_',
        ),
    );

    // удаленный сервер
    $remoteDbConn = array(
        'db'=>array(
            'class'=>'system.db.CDbConnection',
            'enableProfiling' => true,
            'enableParamLogging' => true,
            'connectionString' => 'mysql:host=localhost;dbname=avto',
            'emulatePrepare' => true,
            'username' => 'avto',
            'password' => 'jkmufdjtdjl',
            'charset' => 'utf8',
        ),
        'sphinx'=>array(
            'class'=>'system.db.CDbConnection',
            'connectionString' => 'mysql:host=77.72.129.179;port=9306',
            'charset' => 'utf8',
            'enableProfiling' => true,
        ),
        'db1'=>array(
            'class'=>'system.db.CDbConnection',
            'enableProfiling' => true,
            'enableParamLogging' => true,
            'connectionString' => 'mysql:host=localhost;dbname=avto_parser',
            'emulatePrepare' => true,
            'username' => 'avto_parser',
            'password' => 'jkmufdjtdjlf',
            'charset' => 'utf8',
            'tablePrefix'=>'SC_',
        ),
    );

    $currDB = PHP_OS == "WINNT" ? $localDbConn : $remoteDbConn;

    foreach($currDB as $k => $v){
        $cfg["components"][$k] = $v;
    }

    return $cfg;

