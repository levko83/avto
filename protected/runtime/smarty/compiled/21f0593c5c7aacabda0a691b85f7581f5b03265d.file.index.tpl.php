<?php /* Smarty version Smarty-3.1.15, created on 2014-02-13 13:08:50
         compiled from "/var/www/ponzps26/data/www/new.extraload.com.ua/protected/views/site/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:68459838652cd928524f0a2-12174525%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '21f0593c5c7aacabda0a691b85f7581f5b03265d' => 
    array (
      0 => '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/views/site/index.tpl',
      1 => 1392289719,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '68459838652cd928524f0a2-12174525',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52cd928529da67_74687307',
  'variables' => 
  array (
    'shinsDisplays' => 0,
    'shinsDisplay' => 0,
    'disksDisplays' => 0,
    'diskDisplay' => 0,
    'avtoMark' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52cd928529da67_74687307')) {function content_52cd928529da67_74687307($_smarty_tpl) {?><?php if (!is_callable('smarty_function_imageResizer')) include '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/vendor/Smarty/plugins/function.imageResizer.php';
?>    <section class="sections-car clearfix">
        <!--___________Блок Подбор по автомобилю___________-->
        <div class="selection-car clearfix">
            <?php echo $_smarty_tpl->getSubTemplate ("application.views.site._blockSearchByAvto", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        </div>
        <!--___________Блок Оплата и доставка___________-->
        <div class="payment-delivery clearfix">
            <h2> Оплата и доставка </h2>
            <ul>
                <li class="element-0">Бесплатная доставка по всей Украине!</li>
                <li class="element-1">Без предоплаты и комиссии!</li>
                <li class="element-2">100% гарантия возврата!</li>
                <li class="element-3">Работаем 7 дней в неделю!<span>ПН-CБ: с 9:00 до 21:00<br>ВС: с 10:00 до 18:00</span></li>
            </ul>
        </div>
    </section>
    <section class="sections-tire tire-drive clearfix">
        <h2> Шины </h2>
        <!--__________________Блок Шины_________________-->
        <div class="tire clearfix">
            <div id="tire-form" class="tire-drive-form">
                <?php echo $_smarty_tpl->getSubTemplate ("application.views.site._blockSearchShins", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            </div>
            <div id="block-tire" class="slider-tire-drive">
                <div class="content clearfix">
                    <div class="slider-filter">
                        <div class="search-form clearfix">
                            <div class="pagination">
                                Листать
                            </div>
                        </div>
                    </div>
                    <div class="jcarousel-clip">
                        <ul class="jcarousel-list">
                            <?php  $_smarty_tpl->tpl_vars['shinsDisplay'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['shinsDisplay']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['shinsDisplays']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['shinsDisplay']->key => $_smarty_tpl->tpl_vars['shinsDisplay']->value) {
$_smarty_tpl->tpl_vars['shinsDisplay']->_loop = true;
?>
                            <li class=ad>
                                <div class=img>
                                    <a href="/tires/<?php echo $_smarty_tpl->tpl_vars['shinsDisplay']->value["shins_display_id"];?>
-<?php echo $_smarty_tpl->tpl_vars['shinsDisplay']->value["shins_display_translit"];?>
.html">
                                        <img src="<?php echo smarty_function_imageResizer(array('product_type'=>"tire",'imageName'=>$_smarty_tpl->tpl_vars['shinsDisplay']->value['image_name'],'width'=>125,'height'=>125),$_smarty_tpl);?>
" alt=" " title=" " />
                                    </a>
                                </div>
                                <div class=title>
                                    <a href="/tires/<?php echo $_smarty_tpl->tpl_vars['shinsDisplay']->value["shins_display_id"];?>
-<?php echo $_smarty_tpl->tpl_vars['shinsDisplay']->value["shins_display_translit"];?>
.html">
                                        <?php echo $_smarty_tpl->tpl_vars['shinsDisplay']->value['shins_display_name'];?>

                                    </a>
                                </div>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="sections-drive tire-drive clearfix">
        <h2> Диски </h2>
        <!--__________________Блок Диски_________________-->
        <div class="drive clearfix">
            <div id="tire-form" class="tire-drive-form">
                <?php echo $_smarty_tpl->getSubTemplate ("application.views.site._blockSearchDisks", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            </div>
            <div id="block-drive" class="slider-tire-drive">
                <div class="content clearfix">
                    <div class="slider-filter">
                        <div class="search-form clearfix">
                            <div class="pagination">
                                Листать
                            </div>
                        </div>
                    </div>
                    <div class="jcarousel-clip">
                        <ul class="jcarousel-list">
                            <?php  $_smarty_tpl->tpl_vars['diskDisplay'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['diskDisplay']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['disksDisplays']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['diskDisplay']->key => $_smarty_tpl->tpl_vars['diskDisplay']->value) {
$_smarty_tpl->tpl_vars['diskDisplay']->_loop = true;
?>
                            <li class=ad>
                                <div class=img>
                                    <a href="/drives/<?php echo $_smarty_tpl->tpl_vars['diskDisplay']->value["disks_display_id"];?>
-<?php echo $_smarty_tpl->tpl_vars['diskDisplay']->value["disks_display_translit"];?>
.html">
                                        <img src="<?php echo smarty_function_imageResizer(array('product_type'=>"drive",'imageName'=>$_smarty_tpl->tpl_vars['diskDisplay']->value['image_name'],'width'=>125,'height'=>125),$_smarty_tpl);?>
" alt=" " title=" " />
                                    </a>
                                </div>
                                <div class=title>
                                    <a href="/drives/<?php echo $_smarty_tpl->tpl_vars['diskDisplay']->value["disks_display_id"];?>
-<?php echo $_smarty_tpl->tpl_vars['diskDisplay']->value["disks_display_translit"];?>
.html">
                                        <?php echo $_smarty_tpl->tpl_vars['diskDisplay']->value['disks_display_name'];?>

                                    </a>
                                </div>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="selection-brands">
            <h2>Подбор по марке авто</h2>
            <ul class="clearfix">
                <?php  $_smarty_tpl->tpl_vars['avtoMark'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['avtoMark']->_loop = false;
 $_from = AvtoMarks::model()->getData(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['avtoMark']->key => $_smarty_tpl->tpl_vars['avtoMark']->value) {
$_smarty_tpl->tpl_vars['avtoMark']->_loop = true;
?>
                <li>
                    <a href="#"><?php echo $_smarty_tpl->tpl_vars['avtoMark']->value->value;?>
</a>
                </li>
                <?php } ?>
            </ul>
        </div>
    </section><?php }} ?>
