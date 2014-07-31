<?php /* Smarty version Smarty-3.1.15, created on 2014-01-09 12:40:12
         compiled from "/var/www/ponzps26/data/www/new.extraload.com.ua/protected/modules/admin/views/login/error.tpl" */ ?>
<?php /*%%SmartyHeaderCode:108264664852ce7c8c5ecdb1-10084510%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ae4761f7246ee41721a8e78b7192a0a33e21e382' => 
    array (
      0 => '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/modules/admin/views/login/error.tpl',
      1 => 1389192911,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '108264664852ce7c8c5ecdb1-10084510',
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
  'unifunc' => 'content_52ce7c8c629041_01171744',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52ce7c8c629041_01171744')) {function content_52ce7c8c629041_01171744($_smarty_tpl) {?><div class="span12 page-500">
    <?php if ($_smarty_tpl->tpl_vars['code']->value>0) {?>
        <div class="number">
            <?php echo $_smarty_tpl->tpl_vars['code']->value;?>

        </div>
    <?php }?>
    <div class=" details">
        <h3><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</h3>
    </div>
</div><?php }} ?>
