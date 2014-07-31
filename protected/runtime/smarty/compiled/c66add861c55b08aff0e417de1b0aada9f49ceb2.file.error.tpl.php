<?php /* Smarty version Smarty-3.1.15, created on 2014-01-08 17:11:12
         compiled from "/var/www/ponzps26/data/www/new.extraload.com.ua/protected/views/site/error.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2483331252cd6a9025e740-90853369%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c66add861c55b08aff0e417de1b0aada9f49ceb2' => 
    array (
      0 => '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/views/site/error.tpl',
      1 => 1389192911,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2483331252cd6a9025e740-90853369',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'code' => 0,
    'message' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52cd6a902abe01_91573043',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52cd6a902abe01_91573043')) {function content_52cd6a902abe01_91573043($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['code']->value>0) {?>
    <h2>Ошибка <?php echo $_smarty_tpl->tpl_vars['code']->value;?>
</h2>
<?php }?>
<div class="error">
    <?php echo $_smarty_tpl->tpl_vars['message']->value;?>

</div><?php }} ?>
