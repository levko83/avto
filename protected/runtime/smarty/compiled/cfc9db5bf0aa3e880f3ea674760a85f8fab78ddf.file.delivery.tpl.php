<?php /* Smarty version Smarty-3.1.15, created on 2014-05-23 22:59:39
         compiled from "/var/www/ponzps26/data/www/new.extraload.com.ua/protected/views/site/delivery.tpl" */ ?>
<?php /*%%SmartyHeaderCode:86373954537fa8ab72e609-55177727%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cfc9db5bf0aa3e880f3ea674760a85f8fab78ddf' => 
    array (
      0 => '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/views/site/delivery.tpl',
      1 => 1400875122,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '86373954537fa8ab72e609-55177727',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'region_groups' => 0,
    'region_group' => 0,
    'region_translit' => 0,
    'region_name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_537fa8ab763a78_10565964',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_537fa8ab763a78_10565964')) {function content_537fa8ab763a78_10565964($_smarty_tpl) {?><section id="center">
    <div id="squeeze">
        <article class="node">
            <div class="p-d-wrapp clearfix">
                <h1 class="title">Оплата и доставка</h1>
                <div class="delivery p-d">
                    <div class="delivery-title p-d-title">
                        <h2>Доставка товара</h2>
                        <p>по Украине</p>
                    </div>
                    <div class="delivery-content content">
                        <div class="content-text">
                            <p>
                                <span class="bold">Доставка товара на склад транспортной компании</span>
                                <a target="_blank" href="http://novaposhta.ua/">"Новая почта"</a>
                                или
                                <a target="_blank" href="http://intime.ua/">"Интайм"</a>
                                в крупные города Украины осуществляется БЕСПЛАТНО. (см. список городов ниже)
                            </p>
                            <p>
                                <span class="bold">Адресная доставка</span>
                                товара к вашему подъезду возможна в тех городах, в которых есть склад транспортной компании
                                <a target="_blank" href="http://novaposhta.ua/">"Новая почта"</a>
                                или
                                <a target="_blank" href="http://intime.ua/">"Интайм"</a>
                                и осуществляется курьером транспортной компании.
                            </p>
                            <p> Стоимость услуги: 50 грн/заказ.</p>
                            <p>
                                Подробности уточняйте у
                                <a target="_blank" href="<?php echo Yii::app()->createUrl("site/contacts");?>
">менеджеров</a>
                                по телефонам:
                            </p>
                            <ul class="phones">
                                <li>
                                    <span class="grey_text">+38</span>
                                    <span class="bold">0(800) 30 77 77 </span>
                                    <span class="grey_text it"> - многоканальный</span>
                                </li>
                                <li>
                                    <span class="grey_text">+38</span>
                                    <span class="bold">(044) 492 77 77 </span>
                                    <span class="grey_text it"> - многоканальный</span>
                                </li>
                                <li class="kievstar">
                                    <span class="grey_text">+38</span>
                                    <span class="bold">(067) 160 77 77 </span>
                                </li>
                                <li class="mts">
                                    <span class="grey_text">+38</span>
                                    <span class="bold">(095) 175 77 77 </span>
                                </li>
                                <li class="life">
                                    <span class="grey_text">+38</span>
                                    <span class="bold">(093) 309 77 77 </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="payment p-d">
                    <div class="delivery-title p-d-title">
                        <h2>Оплата товара</h2>
                        <p>Уважаемые клиенты!</p>
                    </div>
                    <div class="delivery-content content">
                        <div class="content-text">
                            <p>
                                <span class="orange">С целью улучшения сервиса интернет-магазин "Rezina.CC"  все расходы по доставке товара и пересылке денег берет на себя!</span>
                            </p>
                            <ul class="advantages">
                                <li class="element-0"> Доставка бесплатно!</li>
                                <li class="element-1"> Без комиссии за пересылку!</li>
                                <li class="element-2"> Оплата только за товар!</li>
                            </ul>
                            <p> Вы оплачиваете товар только при получении заказа на складе транспортной компании в своем городе.</p>
                            <p> Оплата заказа осуществляется в гривнах за наличный расчет.</p>
                            <p>
                                <span class="grey_text it">*при заказе товара на сумму более 8тыс грн., интернет-магазин "Rezina.CC" оставляет за собой право взымать частичную предоплату</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="delivery-map">
                <h2> Карта городов, в которые осуществляется доставка </h2>
                <div id="mapdiv" style="width: 100%; background-color:#fff; height: 500px;"></div>
            </div>
            <div class="delivery-city-list">
                <p class="city-list-title">Список городов, в которые осуществляется доставка товара:</p>
                <?php  $_smarty_tpl->tpl_vars['region_group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['region_group']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['region_groups']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['region_group']->key => $_smarty_tpl->tpl_vars['region_group']->value) {
$_smarty_tpl->tpl_vars['region_group']->_loop = true;
?>
                    <ul>
                        <?php  $_smarty_tpl->tpl_vars['region_name'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['region_name']->_loop = false;
 $_smarty_tpl->tpl_vars['region_translit'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['region_group']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['region_name']->key => $_smarty_tpl->tpl_vars['region_name']->value) {
$_smarty_tpl->tpl_vars['region_name']->_loop = true;
 $_smarty_tpl->tpl_vars['region_translit']->value = $_smarty_tpl->tpl_vars['region_name']->key;
?>
                            <li><a href="<?php echo Yii::app()->createUrl("site/deliveryRegion",array("region_translit"=>$_smarty_tpl->tpl_vars['region_translit']->value));?>
"><?php echo $_smarty_tpl->tpl_vars['region_name']->value;?>
</a></li>
                        <?php } ?>
                    </ul>
                <?php } ?>
            </div>
        </article>
    </div>
</section>
<?php }} ?>
