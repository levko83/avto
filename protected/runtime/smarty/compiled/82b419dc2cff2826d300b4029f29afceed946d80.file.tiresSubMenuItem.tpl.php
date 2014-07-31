<?php /* Smarty version Smarty-3.1.15, created on 2014-04-16 09:46:52
         compiled from "/var/www/ponzps26/data/www/new.extraload.com.ua/protected/views/tires/tiresSubMenuItem.tpl" */ ?>
<?php /*%%SmartyHeaderCode:74232339352fccdef85e4a2-54845167%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '82b419dc2cff2826d300b4029f29afceed946d80' => 
    array (
      0 => '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/views/tires/tiresSubMenuItem.tpl',
      1 => 1397558823,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '74232339352fccdef85e4a2-54845167',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52fccdef9b5055_27211074',
  'variables' => 
  array (
    'this' => 0,
    'inStock' => 0,
    'item' => 0,
    'v10' => 0,
    'v8' => 0,
    'outStock' => 0,
    'item1' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52fccdef9b5055_27211074')) {function content_52fccdef9b5055_27211074($_smarty_tpl) {?><?php if (!is_callable('smarty_function_imageResizer')) include '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/vendor/Smarty/plugins/function.imageResizer.php';
?><!--_____________________ Левая колонка _________________________-->

    <aside id="sidebar-first">
        <div id="filter-tire" class="filter">
            <?php echo $_smarty_tpl->getSubTemplate ("application.views.tires._blockSearchByTires", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        </div>
    </aside>

<!--_________________________________________ Основной контента _________________________________________-->
<section id="center">
    <div id="squeeze">
        <a class="filter-button" href="#filter-tire-780">Фильтр</a>
        <?php if ($_smarty_tpl->tpl_vars['this']->value->breadcrumbs) {?>
            <?php echo $_smarty_tpl->getSubTemplate ("application.views.site._breadcrumbs", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <?php }?>
        <div class="tires-index clearfix">
            <!--________________________________Блок Шапка продукта________________________________-->
            <div class="tires-index-title">
                <h2><?php echo $_smarty_tpl->tpl_vars['this']->value->title;?>
</h2>
                <div class="tires-index-body">
                    <?php echo $_smarty_tpl->tpl_vars['this']->value->text;?>

                </div>
            </div>
            <!--___________Блок Параметров товара___________-->
            <div class="tires-index-block">
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
                                        
                                        <a href="<?php echo Yii::app()->createUrl("tires/index",array("v11"=>array($_smarty_tpl->tpl_vars['item']->value["vendor_id"]),"v10"=>$_smarty_tpl->tpl_vars['v10']->value,"v8"=>$_smarty_tpl->tpl_vars['v8']->value,"v13"=>1));?>
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
                                        <a href="<?php echo Yii::app()->createUrl("tires/index",array("v11"=>array($_smarty_tpl->tpl_vars['item1']->value["vendor_id"]),"v10"=>$_smarty_tpl->tpl_vars['v10']->value,"v8"=>$_smarty_tpl->tpl_vars['v8']->value));?>
">
                                            <img src="<?php echo smarty_function_imageResizer(array('product_type'=>"disks_vendor",'imageName'=>$_smarty_tpl->tpl_vars['item1']->value["vendor_image"],'width'=>120,'height'=>105),$_smarty_tpl);?>
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

    
        
    
<?php }} ?>
