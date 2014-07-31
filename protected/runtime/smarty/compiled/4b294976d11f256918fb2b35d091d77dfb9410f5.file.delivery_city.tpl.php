<?php /* Smarty version Smarty-3.1.15, created on 2014-05-23 23:04:45
         compiled from "/var/www/ponzps26/data/www/new.extraload.com.ua/protected/views/site/delivery_city.tpl" */ ?>
<?php /*%%SmartyHeaderCode:997185217537fa9dd97b0c8-39213115%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4b294976d11f256918fb2b35d091d77dfb9410f5' => 
    array (
      0 => '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/views/site/delivery_city.tpl',
      1 => 1400875122,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '997185217537fa9dd97b0c8-39213115',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'region_center_name' => 0,
    'region_name' => 0,
    'select_options' => 0,
    'select_option' => 0,
    'novaWareHouses' => 0,
    'novaWareHouse' => 0,
    'intimeWareHouses' => 0,
    'intimeWareHouse' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_537fa9dd9d4b59_19197569',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_537fa9dd9d4b59_19197569')) {function content_537fa9dd9d4b59_19197569($_smarty_tpl) {?><section id="center">
    <div id="squeeze">
        <article class="node">
            <div class="city-wrapp clearfix">
                <h1 class="title">Шины в <?php echo $_smarty_tpl->tpl_vars['region_center_name']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['region_name']->value;?>
</h1>
                <div class="city-select-list">
                    <div class="row">
                    <label>Выберите город:</label>
                        <span class="input">
                        <select id="other-cities" name="other_cities" onchange="window.location = jQuery(this).find('option:selected').attr('data-link');">
                            <?php  $_smarty_tpl->tpl_vars['select_option'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['select_option']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['select_options']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['select_option']->key => $_smarty_tpl->tpl_vars['select_option']->value) {
$_smarty_tpl->tpl_vars['select_option']->_loop = true;
?>
                                <?php echo $_smarty_tpl->tpl_vars['select_option']->value;?>

                            <?php } ?>
                        </select>
                        </span>
                    </div>
                    <div id="for_benefits" class="text">
                    <div class="selection-city clearfix">
                        <div id="tabs">
                        <ul class="tabs_menu">
                            <li class="first active_tab"><a>Новая почта</a></li>
                            <li class="last"><a>ИнТайм</a></li>
                        </ul>
                        <div class="tabs_content clearfix">
                            <div style="display: block;">
                                <ul id="item0" class="warehouse_list" style="display: block;">
                                    <?php if ($_smarty_tpl->tpl_vars['novaWareHouses']->value) {?>
                                        <?php  $_smarty_tpl->tpl_vars['novaWareHouse'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['novaWareHouse']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['novaWareHouses']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['novaWareHouse']->key => $_smarty_tpl->tpl_vars['novaWareHouse']->value) {
$_smarty_tpl->tpl_vars['novaWareHouse']->_loop = true;
?>
                                            <li>
                                                <span><?php echo $_smarty_tpl->tpl_vars['novaWareHouse']->value->name;?>
: <?php echo $_smarty_tpl->tpl_vars['novaWareHouse']->value->address;?>
</span>
                                                <span><?php echo $_smarty_tpl->tpl_vars['novaWareHouse']->value->phone;?>
</span>
                                                <span>Пн.-пт: <?php echo $_smarty_tpl->tpl_vars['novaWareHouse']->value->weekday_work_hours;?>
 </span>
                                                <?php if ($_smarty_tpl->tpl_vars['novaWareHouse']->value->working_saturday!="-") {?>
                                                    <span>Суббота: <?php echo $_smarty_tpl->tpl_vars['novaWareHouse']->value->working_saturday;?>
 </span>
                                                <?php } else { ?>
                                                    <span>Суббота: выходной </span>
                                                <?php }?>
                                                <?php if ($_smarty_tpl->tpl_vars['novaWareHouse']->value->working_sunday!="-") {?>
                                                    <span>Воскресенье: <?php echo $_smarty_tpl->tpl_vars['novaWareHouse']->value->working_sunday;?>
 </span>
                                                <?php } else { ?>
                                                    <span>Воскресенье: выходной </span>
                                                <?php }?>
                                            </li>
                                        <?php } ?>
                                    <?php } else { ?>
                                        В этом городе отделений нет
                                    <?php }?>
                                </ul>
                            </div>
                            <div style="display: none;">
                                <ul id="item1" class="warehouse_list" style="display: block;">
                                    <?php if ($_smarty_tpl->tpl_vars['intimeWareHouses']->value) {?>
                                        <?php  $_smarty_tpl->tpl_vars['intimeWareHouse'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['intimeWareHouse']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['intimeWareHouses']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['intimeWareHouse']->key => $_smarty_tpl->tpl_vars['intimeWareHouse']->value) {
$_smarty_tpl->tpl_vars['intimeWareHouse']->_loop = true;
?>
                                            <li>
                                                <span><?php echo $_smarty_tpl->tpl_vars['intimeWareHouse']->value->name;?>
: <?php echo $_smarty_tpl->tpl_vars['intimeWareHouse']->value->adress;?>
</span>
                                                <span><?php echo $_smarty_tpl->tpl_vars['intimeWareHouse']->value->phone;?>
</span>
                                            </li>
                                        <?php } ?>
                                    <?php } else { ?>
                                        В этом городе отделений нет
                                    <?php }?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                    <div class="text delivery_hide_text">
                    <p>
                        Полный список городов, в которых можете приобрести шины через наш интернет-магазин,
                        находится в разделе "
                        <a href="delivery">Оплата и доставка</a>
                        ".
                    </p>
                    <div class="choice_links">
                        <div class="tire_link">
                            <span class="link_text"><a href="/shiny">Перейти к подбору шин</a>→</span>
                        </div>
                        <div class="rim_link">
                            <span class="link_text"><a href="/diski">Перейти к подбору дисков</a>→</span>
                        </div>
                    </div>
                </div>
                </div>
                </div>
        </article>
    </div>
</section><?php }} ?>
