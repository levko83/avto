<?php /* Smarty version Smarty-3.1.15, created on 2014-02-21 17:39:40
         compiled from "/var/www/ponzps26/data/www/new.extraload.com.ua/protected/views/layouts/main_page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:204017847552cd6a902b5307-43855087%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a608262ca08142c8230cd8d54cf6c09db5353078' => 
    array (
      0 => '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/views/layouts/main_page.tpl',
      1 => 1392997146,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '204017847552cd6a902b5307-43855087',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52cd6a902c4357_66887334',
  'variables' => 
  array (
    'this' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52cd6a902c4357_66887334')) {function content_52cd6a902c4357_66887334($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['this']->value->beginContent('//layouts/main');?>

    <section id="center">
        <div id="squeeze">
            <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

        </div>
    </section>
    <!--________________________________ Правая Колонка ________________________________-->
    <aside id="sidebar-second">
<!--        Акции-->
        <div class="action">
            <h3>Акция!</h3>
            <div class="content clearfix">
                <div class="field field-name-body field-type-text-with-summary field-label-hidden">
                    <p>Только в период с 01.12.2013 до 01.01.2014 вы имеете возможность преобрести комплект зимних шин и получить в пару к ним бесплатные диски!
                    </p>
                </div>
            </div>
            <div class="read-all clearfix">
                <a class"read" href="#">Узнать больше об акции</a>
            </div>
        </div>
<!--        Товары со скидкой-->
        <?php echo $_smarty_tpl->getSubTemplate ("application.views.site._blockActions", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </aside>
    <!--_______________ Блок новостей __________________-->
    <section class="sections-news news clearfix">
        <div id="block-news clearfix">
            <h2 class=title>Новости</h2>
            <div class="content clearfix">
                <div class="view-row clearfix">
                    <div class="image-row"><a href="#"><img src="/images/css/prim1.jpg" alt=" " title=" " /></a></div>
                    <div class="data text-line">31 Октября 2013</div>
                    <div class=row-title><a href="#">Компактный кроссовер Honda дебютировал официально</a></div>
                    <div class="desc text-line"><span class=label>Премьера серийного паркетника Honda Vezel состоялась сегодня на автосалоне в Токио. Уже известно, что модель станет глобальной, а в качестве базовой...<a class=linc href="/internal.html">Читать дальше</a></div>
                </div>
                <div class="view-row clearfix">
                    <div class="image-row"><a href="#"><img src="/images/css/prim2.jpg" alt=" " title=" " /></a></div>
                    <div class="data text-line">31 Октября 2013</div>
                    <div class=row-title><a href="#">Компактный кроссовер Honda дебютировал официально</a></div>
                    <div class="desc text-line"><span class=label>Премьера серийного паркетника Honda Vezel состоялась сегодня на автосалоне в Токио. Уже известно, что модель станет глобальной, а в качестве базовой...<a class=linc href="/internal.html">Читать дальше</a></div>
                </div>
            </div>
            <div class="read-all clearfix">
                <a class"read" href="#">Просмотреть все новости</a>
            </div>
        </div>
    </section>
<?php echo $_smarty_tpl->tpl_vars['this']->value->endContent();?>

<?php }} ?>
