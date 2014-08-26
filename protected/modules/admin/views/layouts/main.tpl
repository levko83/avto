<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    {*<title>{if isset($this->title)}{$this->title}{else}Админка{/if}</title>*}
    <title>{Yii::app()->name} - Управление сайтом</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="{Yii::app()->request->baseUrl}/bootstrap/plugins/glyphicons/css/glyphicons.css" rel="stylesheet" />
    <link href="{Yii::app()->request->baseUrl}/bootstrap/plugins/glyphicons_halflings/css/halflings.css" rel="stylesheet" />

    <link href="{Yii::app()->request->baseUrl}/bootstrap/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="{Yii::app()->request->baseUrl}/bootstrap/plugins/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
    <link href="{Yii::app()->request->baseUrl}/bootstrap/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="{Yii::app()->request->baseUrl}/bootstrap/css/style-metro.css" rel="stylesheet" type="text/css"/>
    <link href="{Yii::app()->request->baseUrl}/bootstrap/plugins/jquery-ui/jquery-ui-1.10.1.custom.css" rel="stylesheet" type="text/css"/>
    <link href="{Yii::app()->request->baseUrl}/bootstrap/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="{Yii::app()->request->baseUrl}/bootstrap/css/style-responsive.css" rel="stylesheet" type="text/css"/>
    <link href="{Yii::app()->request->baseUrl}/bootstrap/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="{Yii::app()->request->baseUrl}/bootstrap/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{Yii::app()->request->baseUrl}/bootstrap/plugins/bootstrap-tag/css/bootstrap-tag.css" rel="stylesheet" type="text/css" />
    <link href="{Yii::app()->request->baseUrl}/bootstrap/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css" />
    <link href="{Yii::app()->request->baseUrl}/bootstrap/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
    <!-- BEGIN:File Upload Plugin CSS files-->
    <link href="{Yii::app()->request->baseUrl}/bootstrap/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet" type="text/css" >
    <!-- END:File Upload Plugin CSS files-->
    <link href="{Yii::app()->request->baseUrl}/bootstrap/css/pages/inbox.css" rel="stylesheet" type="text/css" />
    <link href="{Yii::app()->request->baseUrl}/css/admin/form.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
    <link rel="shortcut icon" href="favicon.ico" />
    <script src="{Yii::app()->request->baseUrl}/js/admin/systemMessage.js"></script>
</head>

<body class="page-header-fixed">
    <div class="header navbar navbar-inverse navbar-fixed-top">
    <!-- BEGIN TOP NAVIGATION BAR -->
        <div class="navbar-inner">
            <div class="container-fluid">
                <!-- BEGIN LOGO -->
                <a class="brand" href="index.html">
                    <img src="{Yii::app()->request->baseUrl}/bootstrap/img/logoSparta.png" alt="logo" />
                </a>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
                    <img src="{Yii::app()->request->baseUrl}/bootstrap/img/menu-toggler.png" alt="" />
                </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN TOP NAVIGATION MENU -->
                {*Тут будет верхнее навигационное меню*}
                {if not Yii::app()->user->isGuest}
                <ul class="nav pull-right">
                    <li class="dropdown user">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <img alt="" src="{Yii::app()->request->baseUrl}/bootstrap/img/avatar1_small.jpg" />
                            <span class="username">{Yii::app()->session["user_fio"]} ({Yii::app()->user->roleDesc})</span>
                            <i class="icon-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            {*<li><a href="extra_profile.html"><i class="icon-user"></i> My Profile</a></li>*}
                            {*<li><a href="page_calendar.html"><i class="icon-calendar"></i> My Calendar</a></li>*}
                            {*<li><a href="inbox.html"><i class="icon-envelope"></i> My Inbox <span class="badge badge-important">3</span></a></li>*}
                            {*<li><a href="#"><i class="icon-tasks"></i> My Tasks <span class="badge badge-success">8</span></a></li>*}
                            {*<li class="divider"></li>*}
                            <li><a href="javascript:;" id="trigger_fullscreen"><i class="icon-move"></i> Полноэкранный режим</a></li>
                            <li><a href="{Yii::app()->createUrl("admin/login/lock")}"><i class="icon-lock"></i> Заблокировать экран</a></li>
                            <li><a href="{Yii::app()->createUrl("admin/changePass")}"><i class="icon-refresh"></i> Изменить пароль</a></li>
                            <li><a href="{Yii::app()->createUrl("admin/login/logout")}"><i class="icon-key"></i> Выход</a></li>
                        </ul>
                    </li>
                </ul>
                {/if}
                <!-- END TOP NAVIGATION MENU -->
            </div>
        </div>
        <!-- END TOP NAVIGATION BAR -->
    </div>
    <!-- END HEADER -->
    <!-- BEGIN CONTAINER -->
    <div class="page-container row-fluid">
        <!-- BEGIN SIDEBAR -->
        <div class="page-sidebar nav-collapse collapse">
            <!-- BEGIN SIDEBAR MENU -->
            {*Левое меню*}            
            {widget name="zii.widgets.CMenu"
                    encodeLabel=false
                    activateParents=true
                    htmlOptions=["class" => "page-sidebar-menu"]
                    items=[
                        ["label" => "<div class='sidebar-toggler hidden-phone'></div>"],
                        [
                         "label" => "<i class='icon-shopping-cart'></i> <span class='title'>Магазин</span><span class='arrow'></span>",
                         "visible" => Yii::app()->user->checkAccess("callCenter") or Yii::app()->user->checkAccess("manager"),
                         "url" => "javascript:;",
                         "submenuOptions" => ["class" => "sub-menu"],
                         "items" => [
                                      [
                                         "label" => "<i class='icon-qrcode'></i><span class='badge badge-info'>{Statistica::getInstance()->getCount("products")}</span> <span class='title'>Товары</span><span class='arrow'></span>",
                                         "visible" => Yii::app()->user->checkAccess("administrator"),
                                         "url" => "javascript:;",
                                         "submenuOptions" => ["class" => "sub-menu"],
                                         "items" =>
                                         [
                                            [
                                                "label" => "<i class='icon-cog'></i><span class='badge badge-info'>{Statistica::getInstance()->getCount("disks")}</span> <span class='title'>Диски</span>",
                                                "url" => ["/admin/products/disks/"]
                                            ],
                                            [
                                                "label" => "<i class='icon-sun'></i><span class='badge badge-info'>{Statistica::getInstance()->getCount("shins")}</span> <span class='title'>Шины</span>",
                                                "url" => ["/admin/products/shins/"]
                                            ]
                                         ]
                                      ],
                                      [
                                         "label" => "<i class='icon-qrcode'></i><span class='badge badge-info'>{Statistica::getInstance()->getCount("displays")}</span> <span class='title'>Дисплеи</span><span class='arrow'></span>",
                                         "visible" => Yii::app()->user->checkAccess("administrator"),
                                         "url" => "javascript:;",
                                         "submenuOptions" => ["class" => "sub-menu"],
                                         "items" =>
                                         [
                                            [
                                                "label" => "<i class='icon-cog'></i><span class='badge badge-info'>{Statistica::getInstance()->getCount("disks_displays")}</span> <span class='title'>Диски</span>",
                                                "url" => ["/admin/displays/disks"]
                                            ],
                                            [
                                                "label" => "<i class='icon-sun'></i><span class='badge badge-info'>{Statistica::getInstance()->getCount("shins_displays")}</span> <span class='title'>Шины</span>",
                                                "url" => ["/admin/displays/shins"]
                                            ]
                                         ]
                                      ],
                                      [
                                         "label" => "<i class='icon-qrcode'></i><span class='badge badge-info'>{Statistica::getInstance()->getCount("avto_marks")}</span> <span class='title'>Марки авто</span>",
                                         "visible" => Yii::app()->user->checkAccess("administrator"),
                                         "active" => Yii::app()->controller->id == 'vendors',
                                         "url" => ["/admin/vendors/index"]
                                      ],
                                      [
                                        "label" => "<i class='icon-th'></i> <span class='title'>Производители</span><span class='arrow'></span>",
                                        "url" => "javascript:;",
                                        "submenuOptions" => ["class" => "sub-menu"],
                                        "items" =>
                                        [
                                            [
                                            "label" => "<i class='icon-folder-open'></i><span class='badge badge-info'>{Statistica::getInstance()->getCount("disks_vendors")}</span> <span class='title'>Диски</span>",
                                            "url" => ["/admin/vendors/productsVendorsIndex", "product_type" => "disks"]
                                            ],
                                            [
                                            "label" => "<i class='icon-file'></i><span class='badge badge-info'>{Statistica::getInstance()->getCount("shins_vendors")}</span> <span class='title'>Шины</span>",
                                            "url" => ["/admin/vendors/productsVendorsIndex", "product_type" => "shins"]
                                            ]
                                        ]
                                      ],
                                      [
                                          "label" => "<i class='icon-th'></i><span class='badge badge-info'>{Statistica::getInstance()->getCount("orders")}</span> <span class='title'>Заказы</span><span class='arrow'></span>",
                                          "url" => "javascript:;",
                                          "submenuOptions" => ["class" => "sub-menu"],
                                          "items" =>
                                          [
                                              [
                                                  "label" => "<i class='icon-folder-open'></i> <span class='title'>Мои заказы</span>",
                                                  "url" => ["/admin/orders/index"]
                                              ],
                                              [
                                                  "label" => "<i class='icon-file'></i> <span class='title'>Новый заказ</span>",
                                                  "url" => ["/admin/orders/add"]
                                              ]
                                          ]
                                      ]
                            ]
                        ],
                        ["label" => "<i class='icon-pencil'></i><span class='badge badge-info'>{Statistica::getInstance()->getCount("news")}</span> <span class='title'>Новости</span>",
                         "active" => Yii::app()->controller->id == 'news',
                         "visible" => Yii::app()->user->checkAccess("administrator"),
                         "url" => ["/admin/news/index"]
                        ],
                        ["label" => "<i class='icon-book'></i><span class='badge badge-info'>{Statistica::getInstance()->getCount("pages")}</span> <span class='title'>Страницы</span>",
                         "active" => Yii::app()->controller->id == 'pages',
                         "visible" => Yii::app()->user->checkAccess("administrator"),
                         "url" => ["/admin/pages/index"]
                        ],
                        ["label" => "<i class='icon-user'></i><span class='badge badge-info'>{Statistica::getInstance()->getCount("users")}</span> <span class='title'>Пользователи</span>",
                         "url" => ["/admin/users/index"],
                         "active" => Yii::app()->controller->id == 'users',
                         "visible" => Yii::app()->user->checkAccess("administrator")
                        ],
                        ["label" => "<i class='icon-cog'></i> <span class='title'>Доставка</span>",
                        "url" => "javascript:;",
                        "visible" => Yii::app()->user->checkAccess("administrator"),
                        "submenuOptions" => ["class" => "sub-menu"],
                        "items" => [
                            [
                                "label" => "<i class='icon-briefcase'></i> <span class='title'>Интайм</span>",
                                "url" => ["/admin/delivery/intime"],
                                "visible" => Yii::app()->user->checkAccess("administrator")
                            ],
                            [
                                "label" => "<i class='icon-briefcase'></i> <span class='title'>Новая почта</span>",
                                "url" => ["/admin/delivery/nova"],
                                "visible" => Yii::app()->user->checkAccess("administrator")
                            ]
                          ]
                        ],
                        ["label" => "<i class='icon-cog'></i> <span class='title'>Администрирование</span>",
                         "url" => "javascript:;",
                         "visible" => Yii::app()->user->checkAccess("administrator"),
                         "submenuOptions" => ["class" => "sub-menu"],
                         "items" => [
                                [
                                    "label" => "<i class='icon-th'></i> <span class='title'>Парсер</span>",
                                    "url" => "javascript:void(0)",
                                    "itemOptions" => [
                                        "OnClick" => "document.LoginForm.submit();"
                                    ],
                                    "visible" => Yii::app()->user->checkAccess("administrator")
                                ],
                                [
                                    "label" => "<i class='icon-briefcase'></i> <span class='title'>Sphinx</span>",
                                    "url" => ["/admin/service/sphinx"],
                                    "visible" => Yii::app()->user->checkAccess("administrator")
                                ],
                                [
                                    "label" => "<i class='icon-briefcase'></i> <span class='title'>Очистить кеш</span>",
                                    "url" => ["/admin/service/clearCache"],
                                    "visible" => Yii::app()->user->checkAccess("administrator")
                                ],
                                [
                                    "label" => "<i class='icon-briefcase'></i> <span class='title'>Обслуживание</span>",
                                    "url" => ["/admin/service/index"],
                                    "visible" => Yii::app()->user->checkAccess("root")
                                ],
                                [
                                    "label" => "<i class='icon-briefcase'></i> <span class='title'>Просмотр логов</span>",
                                    "url" => ["/admin/service/showLog"],
                                    "visible" => Yii::app()->user->checkAccess("root")
                                ]
                          ]
                        ]
                    ]
            }
        </div>
        <!-- END SIDEBAR -->
        <!-- BEGIN PAGE -->
        <div class="page-content">
            <!-- BEGIN PAGE CONTAINER-->
            <div class="container-fluid">
                <!-- BEGIN PAGE HEADER-->
                <div class="row-fluid">
                    <div class="span12">
                        <h3 class="page-title">
                            {if isset($this->title)}
                                {$this->title}
                            {/if}
                        </h3>
                        {*хлебные крошки*}
                        {if isset($this->breadcrumbs)}
                        <ul class="breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a href="#">Админка</a>
                                {if count($this->breadcrumbs) > 0}
                                    <i class="icon-angle-right"></i>
                                {/if}
                            </li>
                            {foreach name=breadcrumbs from=$this->breadcrumbs key=bc_link item=bc_text}
                                <li>
                                    {*<i class="icon-home"></i>*}
                                    {if !is_int($bc_link)}
                                        <a href="{$bc_link}">{$bc_text}</a>
                                    {else}
                                        {$bc_text}
                                    {/if}
                                    {if !$smarty.foreach.breadcrumbs.last}
                                        <i class="icon-angle-right"></i>
                                    {/if}
                                </li>
                            {/foreach}
                        </ul>
                        {/if}
                        <!-- END PAGE TITLE & BREADCRUMB-->
                    </div>
                </div>
                <div class="row-fluid inbox">
                    <div class="span12">
                        {$content}
                    </div>
                    <div id="messageDialog" title="">
                        <div>
                            <span class="icon"></span>
                            <span class="message"></span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PAGE CONTAINER-->
        </div>
        <!-- END PAGE -->
    </div>
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->
    <div class="footer">
        <div class="footer-inner">
            {date('Y')} &copy; WebSparta
        </div>
        <div class="footer-tools">
			<span class="go-top">
			<i class="icon-angle-up"></i>
			</span>
        </div>
    </div>
    {if Yii::app()->user->checkAccess("administrator")}
        <form name="LoginForm" enctype="multipart/form-data" action="{Yii::app()->request->baseUrl}/parser/index_int.php?r=site/login" method="post" target="_blank">
            <input type="hidden" name="LoginForm[username]" value="admin">
            <input type="hidden" name="LoginForm[password]" value="admin5">
        </form>
    {/if}
    <!-- END FOOTER -->
    <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
    <!-- BEGIN CORE PLUGINS -->   <script src="{Yii::app()->request->baseUrl}/bootstrap/plugins/jquery-1.10.1.min.js" type="text/javascript"></script>
    <!-- BEGIN CORE PLUGINS -->   <script src="{Yii::app()->request->baseUrl}/bootstrap/plugins/jquery.ba-bbq.js" type="text/javascript"></script>
    <script src="{Yii::app()->request->baseUrl}/bootstrap/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
    <!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
    <script src="{Yii::app()->request->baseUrl}/bootstrap/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="{Yii::app()->request->baseUrl}/js/jquery-ui/jquery.form.js" type="text/javascript"></script>
    <script src="{Yii::app()->request->baseUrl}/bootstrap/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="{Yii::app()->request->baseUrl}/bootstrap/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript" ></script>

    <script src="{Yii::app()->request->baseUrl}/bootstrap/plugins/glyphicons/scripts/modernizr.js" type="text/javascript" ></script>

    <!--[if lt IE 9]>
    <script src="{Yii::app()->request->baseUrl}/bootstrap/plugins/excanvas.min.js"></script>
    <script src="{Yii::app()->request->baseUrl}/bootstrap/plugins/respond.min.js"></script>
    <![endif]-->
    <script src="{Yii::app()->request->baseUrl}/bootstrap/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="{Yii::app()->request->baseUrl}/bootstrap/plugins/jquery.blockui.min.js" type="text/javascript"></script>
    <script src="{Yii::app()->request->baseUrl}/bootstrap/plugins/jquery.cookie.min.js" type="text/javascript"></script>
    <script src="{Yii::app()->request->baseUrl}/bootstrap/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{Yii::app()->request->baseUrl}/bootstrap/plugins/bootstrap-tag/js/bootstrap-tag.js" type="text/javascript" ></script>
    <script src="{Yii::app()->request->baseUrl}/bootstrap/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript" ></script>
    <script src="{Yii::app()->request->baseUrl}/bootstrap/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript" ></script>
    <script src="{Yii::app()->request->baseUrl}/bootstrap/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript" ></script>
    <!-- BEGIN:File Upload Plugin JS files-->
    <script src="{Yii::app()->request->baseUrl}/bootstrap/plugins/jquery-file-upload/js/vendor/jquery.ui.widget.js"></script>
    <!-- The Templates plugin is included to render the upload/download listings -->
    <script src="{Yii::app()->request->baseUrl}/bootstrap/plugins/jquery-file-upload/js/vendor/tmpl.min.js"></script>
    <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
    <script src="{Yii::app()->request->baseUrl}/bootstrap/plugins/jquery-file-upload/js/vendor/load-image.min.js"></script>
    <!-- The Canvas to Blob plugin is included for image resizing functionality -->
    <script src="{Yii::app()->request->baseUrl}/bootstrap/plugins/jquery-file-upload/js/vendor/canvas-to-blob.min.js"></script>
    <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
    <script src="{Yii::app()->request->baseUrl}/bootstrap/plugins/jquery-file-upload/js/jquery.iframe-transport.js"></script>
    <!-- The basic File Upload plugin -->
    <script src="{Yii::app()->request->baseUrl}/bootstrap/plugins/jquery-file-upload/js/jquery.fileupload.js"></script>
    <!-- The File Upload file processing plugin -->
    <script src="{Yii::app()->request->baseUrl}/bootstrap/plugins/jquery-file-upload/js/jquery.fileupload-fp.js"></script>
    <!-- The File Upload user interface plugin -->
    <script src="{Yii::app()->request->baseUrl}/bootstrap/plugins/jquery-file-upload/js/jquery.fileupload-ui.js"></script>
    <script src="{Yii::app()->request->baseUrl}/bootstrap/plugins/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

    <script src="{Yii::app()->request->baseUrl}/js/ckeditor/ckeditor.js"></script>

    <!-- The XDomainRequest Transport is included for cross-domain file deletion for IE8+ -->
    <!--[if gte IE 8]><script src="assets/plugins/jquery-file-upload/js/cors/jquery.xdr-transport.js"></script><![endif]-->
    <!-- END:File Upload Plugin JS files-->
    <!-- END PAGE LEVEL PLUGINS -->
    <script src="{Yii::app()->request->baseUrl}/bootstrap/scripts/app.js"></script>
    <script src="{Yii::app()->request->baseUrl}/js/admin/app.js"></script>
    <script src="{Yii::app()->request->baseUrl}/bootstrap/scripts/inbox.js"></script>
    <script>
        jQuery(document).ready(function() {
            // initiate layout and plugins
            App.init();
            Inbox.init();
        });
    </script>
    <!-- END JAVASCRIPTS -->
</body>

</html>

