<?php /* Smarty version Smarty-3.1.15, created on 2014-05-21 17:11:20
         compiled from "/var/www/ponzps26/data/www/new.extraload.com.ua/protected/modules/admin/views/layouts/main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:198667963852ce7c8c641907-65610534%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '196fa1dc93637498dc1cfd7288c25dd3bf48233a' => 
    array (
      0 => '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/modules/admin/views/layouts/main.tpl',
      1 => 1400681435,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '198667963852ce7c8c641907-65610534',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52ce7c8c8aea65_21033652',
  'variables' => 
  array (
    'this' => 0,
    'bc_link' => 0,
    'bc_text' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52ce7c8c8aea65_21033652')) {function content_52ce7c8c8aea65_21033652($_smarty_tpl) {?><?php if (!is_callable('smarty_function_widget')) include '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/vendor/Smarty/plugins/function.widget.php';
?><!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    
    <title><?php echo Yii::app()->name;?>
 - Управление сайтом</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="<?php echo Yii::app()->request->baseUrl;?>
/bootstrap/plugins/glyphicons/css/glyphicons.css" rel="stylesheet" />
    <link href="<?php echo Yii::app()->request->baseUrl;?>
/bootstrap/plugins/glyphicons_halflings/css/halflings.css" rel="stylesheet" />

    <link href="<?php echo Yii::app()->request->baseUrl;?>
/bootstrap/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo Yii::app()->request->baseUrl;?>
/bootstrap/plugins/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo Yii::app()->request->baseUrl;?>
/bootstrap/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo Yii::app()->request->baseUrl;?>
/bootstrap/css/style-metro.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo Yii::app()->request->baseUrl;?>
/bootstrap/plugins/jquery-ui/jquery-ui-1.10.1.custom.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo Yii::app()->request->baseUrl;?>
/bootstrap/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo Yii::app()->request->baseUrl;?>
/bootstrap/css/style-responsive.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo Yii::app()->request->baseUrl;?>
/bootstrap/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="<?php echo Yii::app()->request->baseUrl;?>
/bootstrap/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="<?php echo Yii::app()->request->baseUrl;?>
/bootstrap/plugins/bootstrap-tag/css/bootstrap-tag.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo Yii::app()->request->baseUrl;?>
/bootstrap/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo Yii::app()->request->baseUrl;?>
/bootstrap/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
    <!-- BEGIN:File Upload Plugin CSS files-->
    <link href="<?php echo Yii::app()->request->baseUrl;?>
/bootstrap/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet" type="text/css" >
    <!-- END:File Upload Plugin CSS files-->
    <link href="<?php echo Yii::app()->request->baseUrl;?>
/bootstrap/css/pages/inbox.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo Yii::app()->request->baseUrl;?>
/css/admin/form.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
    <link rel="shortcut icon" href="favicon.ico" />
</head>

<body class="page-header-fixed">
    <div class="header navbar navbar-inverse navbar-fixed-top">
    <!-- BEGIN TOP NAVIGATION BAR -->
        <div class="navbar-inner">
            <div class="container-fluid">
                <!-- BEGIN LOGO -->
                <a class="brand" href="index.html">
                    <img src="<?php echo Yii::app()->request->baseUrl;?>
/bootstrap/img/logoSparta.png" alt="logo" />
                </a>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
                    <img src="<?php echo Yii::app()->request->baseUrl;?>
/bootstrap/img/menu-toggler.png" alt="" />
                </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN TOP NAVIGATION MENU -->
                
                <?php if (!Yii::app()->user->isGuest) {?>
                <ul class="nav pull-right">
                    <li class="dropdown user">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <img alt="" src="<?php echo Yii::app()->request->baseUrl;?>
/bootstrap/img/avatar1_small.jpg" />
                            <span class="username"><?php echo Yii::app()->session["user_fio"];?>
 (<?php echo Yii::app()->user->roleDesc;?>
)</span>
                            <i class="icon-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            
                            
                            
                            
                            
                            <li><a href="javascript:;" id="trigger_fullscreen"><i class="icon-move"></i> Полноэкранный режим</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl("admin/login/lock");?>
"><i class="icon-lock"></i> Заблокировать экран</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl("admin/changePass");?>
"><i class="icon-refresh"></i> Изменить пароль</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl("admin/login/logout");?>
"><i class="icon-key"></i> Выход</a></li>
                        </ul>
                    </li>
                </ul>
                <?php }?>
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
                        
            <?php ob_start();?><?php echo Statistica::getInstance()->getCount("products");?>
<?php $_tmp1=ob_get_clean();?><?php ob_start();?><?php echo Statistica::getInstance()->getCount("disks");?>
<?php $_tmp2=ob_get_clean();?><?php ob_start();?><?php echo Statistica::getInstance()->getCount("shins");?>
<?php $_tmp3=ob_get_clean();?><?php ob_start();?><?php echo Statistica::getInstance()->getCount("displays");?>
<?php $_tmp4=ob_get_clean();?><?php ob_start();?><?php echo Statistica::getInstance()->getCount("disks_displays");?>
<?php $_tmp5=ob_get_clean();?><?php ob_start();?><?php echo Statistica::getInstance()->getCount("shins_displays");?>
<?php $_tmp6=ob_get_clean();?><?php ob_start();?><?php echo Statistica::getInstance()->getCount("avto_marks");?>
<?php $_tmp7=ob_get_clean();?><?php ob_start();?><?php echo Statistica::getInstance()->getCount("disks_vendors");?>
<?php $_tmp8=ob_get_clean();?><?php ob_start();?><?php echo Statistica::getInstance()->getCount("shins_vendors");?>
<?php $_tmp9=ob_get_clean();?><?php ob_start();?><?php echo Statistica::getInstance()->getCount("orders");?>
<?php $_tmp10=ob_get_clean();?><?php ob_start();?><?php echo Statistica::getInstance()->getCount("news");?>
<?php $_tmp11=ob_get_clean();?><?php ob_start();?><?php echo Statistica::getInstance()->getCount("pages");?>
<?php $_tmp12=ob_get_clean();?><?php ob_start();?><?php echo Statistica::getInstance()->getCount("users");?>
<?php $_tmp13=ob_get_clean();?><?php echo smarty_function_widget(array('name'=>"zii.widgets.CMenu",'encodeLabel'=>false,'activateParents'=>true,'htmlOptions'=>array("class"=>"page-sidebar-menu"),'items'=>array(array("label"=>"<div class='sidebar-toggler hidden-phone'></div>"),array("label"=>"<i class='icon-shopping-cart'></i> <span class='title'>Магазин</span><span class='arrow'></span>","visible"=>Yii::app()->user->checkAccess("callCenter")||Yii::app()->user->checkAccess("manager"),"url"=>"javascript:;","submenuOptions"=>array("class"=>"sub-menu"),"items"=>array(array("label"=>"<i class='icon-qrcode'></i><span class='badge badge-info'>".$_tmp1."</span> <span class='title'>Товары</span><span class='arrow'></span>","visible"=>Yii::app()->user->checkAccess("administrator"),"url"=>"javascript:;","submenuOptions"=>array("class"=>"sub-menu"),"items"=>array(array("label"=>"<i class='icon-cog'></i><span class='badge badge-info'>".$_tmp2."</span> <span class='title'>Диски</span>","url"=>array("/admin/products/disks/")),array("label"=>"<i class='icon-sun'></i><span class='badge badge-info'>".$_tmp3."</span> <span class='title'>Шины</span>","url"=>array("/admin/products/shins/")))),array("label"=>"<i class='icon-qrcode'></i><span class='badge badge-info'>".$_tmp4."</span> <span class='title'>Дисплеи</span><span class='arrow'></span>","visible"=>Yii::app()->user->checkAccess("administrator"),"url"=>"javascript:;","submenuOptions"=>array("class"=>"sub-menu"),"items"=>array(array("label"=>"<i class='icon-cog'></i><span class='badge badge-info'>".$_tmp5."</span> <span class='title'>Диски</span>","url"=>array("/admin/displays/disks")),array("label"=>"<i class='icon-sun'></i><span class='badge badge-info'>".$_tmp6."</span> <span class='title'>Шины</span>","url"=>array("/admin/displays/shins")))),array("label"=>"<i class='icon-qrcode'></i><span class='badge badge-info'>".$_tmp7."</span> <span class='title'>Марки авто</span>","visible"=>Yii::app()->user->checkAccess("administrator"),"active"=>Yii::app()->controller->id=='vendors',"url"=>array("/admin/vendors/index")),array("label"=>"<i class='icon-th'></i> <span class='title'>Производители</span><span class='arrow'></span>","url"=>"javascript:;","submenuOptions"=>array("class"=>"sub-menu"),"items"=>array(array("label"=>"<i class='icon-folder-open'></i><span class='badge badge-info'>".$_tmp8."</span> <span class='title'>Диски</span>","url"=>array("/admin/vendors/productsVendorsIndex","product_type"=>"disks")),array("label"=>"<i class='icon-file'></i><span class='badge badge-info'>".$_tmp9."</span> <span class='title'>Шины</span>","url"=>array("/admin/vendors/productsVendorsIndex","product_type"=>"shins")))),array("label"=>"<i class='icon-th'></i><span class='badge badge-info'>".$_tmp10."</span> <span class='title'>Заказы</span><span class='arrow'></span>","url"=>"javascript:;","submenuOptions"=>array("class"=>"sub-menu"),"items"=>array(array("label"=>"<i class='icon-folder-open'></i> <span class='title'>Мои заказы</span>","url"=>array("/admin/orders/index")),array("label"=>"<i class='icon-file'></i> <span class='title'>Новый заказ</span>","url"=>array("/admin/orders/add")))))),array("label"=>"<i class='icon-pencil'></i><span class='badge badge-info'>".$_tmp11."</span> <span class='title'>Новости</span>","active"=>Yii::app()->controller->id=='news',"visible"=>Yii::app()->user->checkAccess("administrator"),"url"=>array("/admin/news/index")),array("label"=>"<i class='icon-book'></i><span class='badge badge-info'>".$_tmp12."</span> <span class='title'>Страницы</span>","active"=>Yii::app()->controller->id=='pages',"visible"=>Yii::app()->user->checkAccess("administrator"),"url"=>array("/admin/pages/index")),array("label"=>"<i class='icon-user'></i><span class='badge badge-info'>".$_tmp13."</span> <span class='title'>Пользователи</span>","url"=>array("/admin/users/index"),"active"=>Yii::app()->controller->id=='users',"visible"=>Yii::app()->user->checkAccess("administrator")),array("label"=>"<i class='icon-cog'></i> <span class='title'>Доставка</span>","url"=>"javascript:;","visible"=>Yii::app()->user->checkAccess("administrator"),"submenuOptions"=>array("class"=>"sub-menu"),"items"=>array(array("label"=>"<i class='icon-briefcase'></i> <span class='title'>Интайм</span>","url"=>array("/admin/delivery/intime"),"visible"=>Yii::app()->user->checkAccess("administrator")),array("label"=>"<i class='icon-briefcase'></i> <span class='title'>Новая почта</span>","url"=>array("/admin/delivery/nova"),"visible"=>Yii::app()->user->checkAccess("administrator")))),array("label"=>"<i class='icon-cog'></i> <span class='title'>Администрирование</span>","url"=>"javascript:;","visible"=>Yii::app()->user->checkAccess("administrator"),"submenuOptions"=>array("class"=>"sub-menu"),"items"=>array(array("label"=>"<i class='icon-th'></i> <span class='title'>Парсер</span>","url"=>"javascript:void(0)","itemOptions"=>array("OnClick"=>"document.LoginForm.submit();"),"visible"=>Yii::app()->user->checkAccess("administrator")),array("label"=>"<i class='icon-briefcase'></i> <span class='title'>Очистить кеш</span>","url"=>array("/admin/service/clearCache"),"visible"=>Yii::app()->user->checkAccess("administrator")),array("label"=>"<i class='icon-briefcase'></i> <span class='title'>Обслуживание</span>","url"=>array("/admin/service/index"),"visible"=>Yii::app()->user->checkAccess("root")),array("label"=>"<i class='icon-briefcase'></i> <span class='title'>Просмотр логов</span>","url"=>array("/admin/service/showLog"),"visible"=>Yii::app()->user->checkAccess("root")))))),$_smarty_tpl);?>

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
                            <?php if (isset($_smarty_tpl->tpl_vars['this']->value->title)) {?>
                                <?php echo $_smarty_tpl->tpl_vars['this']->value->title;?>

                            <?php }?>
                        </h3>
                        
                        <?php if (isset($_smarty_tpl->tpl_vars['this']->value->breadcrumbs)) {?>
                        <ul class="breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a href="#">Админка</a>
                                <?php if (count($_smarty_tpl->tpl_vars['this']->value->breadcrumbs)>0) {?>
                                    <i class="icon-angle-right"></i>
                                <?php }?>
                            </li>
                            <?php  $_smarty_tpl->tpl_vars['bc_text'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['bc_text']->_loop = false;
 $_smarty_tpl->tpl_vars['bc_link'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['this']->value->breadcrumbs; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['bc_text']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['bc_text']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['bc_text']->key => $_smarty_tpl->tpl_vars['bc_text']->value) {
$_smarty_tpl->tpl_vars['bc_text']->_loop = true;
 $_smarty_tpl->tpl_vars['bc_link']->value = $_smarty_tpl->tpl_vars['bc_text']->key;
 $_smarty_tpl->tpl_vars['bc_text']->iteration++;
 $_smarty_tpl->tpl_vars['bc_text']->last = $_smarty_tpl->tpl_vars['bc_text']->iteration === $_smarty_tpl->tpl_vars['bc_text']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['breadcrumbs']['last'] = $_smarty_tpl->tpl_vars['bc_text']->last;
?>
                                <li>
                                    
                                    <?php if (!is_int($_smarty_tpl->tpl_vars['bc_link']->value)) {?>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['bc_link']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['bc_text']->value;?>
</a>
                                    <?php } else { ?>
                                        <?php echo $_smarty_tpl->tpl_vars['bc_text']->value;?>

                                    <?php }?>
                                    <?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['breadcrumbs']['last']) {?>
                                        <i class="icon-angle-right"></i>
                                    <?php }?>
                                </li>
                            <?php } ?>
                        </ul>
                        <?php }?>
                        <!-- END PAGE TITLE & BREADCRUMB-->
                    </div>
                </div>
                <div class="row-fluid inbox">
                    <div class="span12">
                        <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

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
            <?php echo date('Y');?>
 &copy; WebSparta
        </div>
        <div class="footer-tools">
			<span class="go-top">
			<i class="icon-angle-up"></i>
			</span>
        </div>
    </div>
    <?php if (Yii::app()->user->checkAccess("administrator")) {?>
        <form name="LoginForm" enctype="multipart/form-data" action="<?php echo Yii::app()->request->baseUrl;?>
/parser/index_int.php?r=site/login" method="post" target="_blank">
            <input type="hidden" name="LoginForm[username]" value="admin">
            <input type="hidden" name="LoginForm[password]" value="admin5">
        </form>
    <?php }?>
    <!-- END FOOTER -->
    <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
    <!-- BEGIN CORE PLUGINS -->   <script src="<?php echo Yii::app()->request->baseUrl;?>
/bootstrap/plugins/jquery-1.10.1.min.js" type="text/javascript"></script>
    <!-- BEGIN CORE PLUGINS -->   <script src="<?php echo Yii::app()->request->baseUrl;?>
/bootstrap/plugins/jquery.ba-bbq.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->request->baseUrl;?>
/bootstrap/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
    <!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
    <script src="<?php echo Yii::app()->request->baseUrl;?>
/bootstrap/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->request->baseUrl;?>
/js/jquery-ui/jquery.form.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->request->baseUrl;?>
/bootstrap/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->request->baseUrl;?>
/bootstrap/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript" ></script>

    <script src="<?php echo Yii::app()->request->baseUrl;?>
/bootstrap/plugins/glyphicons/scripts/modernizr.js" type="text/javascript" ></script>

    <!--[if lt IE 9]>
    <script src="<?php echo Yii::app()->request->baseUrl;?>
/bootstrap/plugins/excanvas.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl;?>
/bootstrap/plugins/respond.min.js"></script>
    <![endif]-->
    <script src="<?php echo Yii::app()->request->baseUrl;?>
/bootstrap/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->request->baseUrl;?>
/bootstrap/plugins/jquery.blockui.min.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->request->baseUrl;?>
/bootstrap/plugins/jquery.cookie.min.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->request->baseUrl;?>
/bootstrap/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="<?php echo Yii::app()->request->baseUrl;?>
/bootstrap/plugins/bootstrap-tag/js/bootstrap-tag.js" type="text/javascript" ></script>
    <script src="<?php echo Yii::app()->request->baseUrl;?>
/bootstrap/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript" ></script>
    <script src="<?php echo Yii::app()->request->baseUrl;?>
/bootstrap/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript" ></script>
    <script src="<?php echo Yii::app()->request->baseUrl;?>
/bootstrap/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript" ></script>
    <!-- BEGIN:File Upload Plugin JS files-->
    <script src="<?php echo Yii::app()->request->baseUrl;?>
/bootstrap/plugins/jquery-file-upload/js/vendor/jquery.ui.widget.js"></script>
    <!-- The Templates plugin is included to render the upload/download listings -->
    <script src="<?php echo Yii::app()->request->baseUrl;?>
/bootstrap/plugins/jquery-file-upload/js/vendor/tmpl.min.js"></script>
    <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
    <script src="<?php echo Yii::app()->request->baseUrl;?>
/bootstrap/plugins/jquery-file-upload/js/vendor/load-image.min.js"></script>
    <!-- The Canvas to Blob plugin is included for image resizing functionality -->
    <script src="<?php echo Yii::app()->request->baseUrl;?>
/bootstrap/plugins/jquery-file-upload/js/vendor/canvas-to-blob.min.js"></script>
    <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
    <script src="<?php echo Yii::app()->request->baseUrl;?>
/bootstrap/plugins/jquery-file-upload/js/jquery.iframe-transport.js"></script>
    <!-- The basic File Upload plugin -->
    <script src="<?php echo Yii::app()->request->baseUrl;?>
/bootstrap/plugins/jquery-file-upload/js/jquery.fileupload.js"></script>
    <!-- The File Upload file processing plugin -->
    <script src="<?php echo Yii::app()->request->baseUrl;?>
/bootstrap/plugins/jquery-file-upload/js/jquery.fileupload-fp.js"></script>
    <!-- The File Upload user interface plugin -->
    <script src="<?php echo Yii::app()->request->baseUrl;?>
/bootstrap/plugins/jquery-file-upload/js/jquery.fileupload-ui.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl;?>
/bootstrap/plugins/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

    <script src="<?php echo Yii::app()->request->baseUrl;?>
/js/ckeditor/ckeditor.js"></script>

    <!-- The XDomainRequest Transport is included for cross-domain file deletion for IE8+ -->
    <!--[if gte IE 8]><script src="assets/plugins/jquery-file-upload/js/cors/jquery.xdr-transport.js"></script><![endif]-->
    <!-- END:File Upload Plugin JS files-->
    <!-- END PAGE LEVEL PLUGINS -->
    <script src="<?php echo Yii::app()->request->baseUrl;?>
/bootstrap/scripts/app.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl;?>
/js/admin/app.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl;?>
/bootstrap/scripts/inbox.js"></script>
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

<?php }} ?>
