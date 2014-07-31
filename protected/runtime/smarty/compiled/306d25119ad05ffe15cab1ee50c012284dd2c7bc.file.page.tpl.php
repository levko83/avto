<?php /* Smarty version Smarty-3.1.15, created on 2014-04-04 12:42:02
         compiled from "/var/www/ponzps26/data/www/new.extraload.com.ua/protected/views/site/page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16831816452fcbe96cbfe89-46870476%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '306d25119ad05ffe15cab1ee50c012284dd2c7bc' => 
    array (
      0 => '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/views/site/page.tpl',
      1 => 1396603092,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16831816452fcbe96cbfe89-46870476',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52fcbe96cf8040_50324558',
  'variables' => 
  array (
    'this' => 0,
    'model' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52fcbe96cf8040_50324558')) {function content_52fcbe96cf8040_50324558($_smarty_tpl) {?><section id="center">
    <?php if ($_smarty_tpl->tpl_vars['this']->value->breadcrumbs) {?>
        <?php echo $_smarty_tpl->getSubTemplate ("application.views.site._breadcrumbs", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php }?>
    <div id="squeeze">
        <article class="node">
          <?php echo $_smarty_tpl->tpl_vars['model']->value->text;?>

        </article>
    </div>
</section><?php }} ?>
