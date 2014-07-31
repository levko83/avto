<?php /* Smarty version Smarty-3.1.15, created on 2014-04-04 12:18:29
         compiled from "/var/www/ponzps26/data/www/new.extraload.com.ua/protected/views/drives/drivesSubMenuItem.tpl" */ ?>
<?php /*%%SmartyHeaderCode:31885914852fccdfbed3eb4-52381588%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '605b5e4ca3db15e84d85ff94522fe58246005e5a' => 
    array (
      0 => '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/views/drives/drivesSubMenuItem.tpl',
      1 => 1396603092,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31885914852fccdfbed3eb4-52381588',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52fccdfc0931e9_86768728',
  'variables' => 
  array (
    'this' => 0,
    'inStock' => 0,
    'item' => 0,
    'disks_type_id' => 0,
    'outStock' => 0,
    'item1' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52fccdfc0931e9_86768728')) {function content_52fccdfc0931e9_86768728($_smarty_tpl) {?><?php if (!is_callable('smarty_function_imageResizer')) include '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/vendor/Smarty/plugins/function.imageResizer.php';
?><!--_____________________ Левая колонка _________________________-->

    <aside id="sidebar-first">
        <div id="filter-tire" class="filter">
            <?php echo $_smarty_tpl->getSubTemplate ("application.views.drives._blockSearchByDrives", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        </div>
    </aside>

<!--_________________________________________ Основной контента _________________________________________-->
<section id="center">
    <div id="squeeze">
        <?php if ($_smarty_tpl->tpl_vars['this']->value->breadcrumbs) {?>
            <?php echo $_smarty_tpl->getSubTemplate ("application.views.site._breadcrumbs", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <?php }?>
        <a class="filter-button" href="#filter-tire-780">Фильтр</a>
        <div class="drive-index clearfix">
            <!--________________________________Блок Шапка продукта________________________________-->
            <div class="drive-index-title">
                <h2><?php echo $_smarty_tpl->tpl_vars['this']->value->title;?>
</h2>
                <div class="drive-index-body">
                    <?php echo $_smarty_tpl->tpl_vars['this']->value->text;?>

                </div>
            </div>
            <!--___________Блок Параметров товара___________-->
            <div class="drive-index-block">
                <div id="tabs">
                    <ul class="tabs_menu">
                        <li class="first"><a>Есть в наличии</a></li>
                        <li class="last"><a>Нет в наличии</a></li>
                    </ul>
                    <div class="tabs_content">
                        <div class="clearfix">
                            <div class="in-stock clearfix">
                                <?php if (count($_smarty_tpl->tpl_vars['inStock']->value)>0) {?>
                                    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['inStock']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                                        
                                        <a href="<?php echo Yii::app()->createUrl("drives/index",array("v12"=>array($_smarty_tpl->tpl_vars['item']->value["vendor_id"]),"v4"=>$_smarty_tpl->tpl_vars['disks_type_id']->value,"v13"=>1));?>
">
                                            <img src="<?php echo smarty_function_imageResizer(array('product_type'=>"disks_vendor",'imageName'=>$_smarty_tpl->tpl_vars['item']->value["vendor_image"],'width'=>120,'height'=>105),$_smarty_tpl);?>
" alt="">
                                            <?php echo $_smarty_tpl->tpl_vars['item']->value["vendor_name"];?>

                                        </a>
                                    <?php } ?>
                                <?php } else { ?>
                                    Товары отсутствуют
                                <?php }?>
                            </div>
                        </div>
                        <div>
                            <div class="not-available">
                                <?php if (count($_smarty_tpl->tpl_vars['outStock']->value)>0) {?>
                                    <?php  $_smarty_tpl->tpl_vars['item1'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item1']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['outStock']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item1']->key => $_smarty_tpl->tpl_vars['item1']->value) {
$_smarty_tpl->tpl_vars['item1']->_loop = true;
?>
                                        
                                        <a href="<?php echo Yii::app()->createUrl("drives/index",array("v12"=>array($_smarty_tpl->tpl_vars['item1']->value["vendor_id"]),"v4"=>$_smarty_tpl->tpl_vars['disks_type_id']->value));?>
">
                                            <img src="<?php echo smarty_function_imageResizer(array('product_type'=>"disks_vendor",'imageName'=>$_smarty_tpl->tpl_vars['item1']->value["vendor_image"],'width'=>100,'height'=>35),$_smarty_tpl);?>
" alt="">
                                            <?php echo $_smarty_tpl->tpl_vars['item1']->value["vendor_name"];?>

                                        </a>
                                    <?php } ?>
                                <?php } else { ?>
                                    Товары отсутствуют
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- фильтр для планшета и телефона -->
<?php if (BrowserDetector::isMobile()) {?>
    <div id="filter-tire-780" class="filter">
        <?php echo $_smarty_tpl->getSubTemplate ("application.views.tires._blockSearchByDrivesMobile", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </div>
<?php }?><?php }} ?>
