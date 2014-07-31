<?php /* Smarty version Smarty-3.1.15, created on 2014-05-06 12:33:18
         compiled from "/var/www/ponzps26/data/www/new.extraload.com.ua/protected/modules/admin/views/service/_logTabItem.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11907051895368ac5ee6b194-82093896%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c0e5e218c33adfc3010bb7ceb8c808a5d83ae31d' => 
    array (
      0 => '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/modules/admin/views/service/_logTabItem.tpl',
      1 => 1399368765,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11907051895368ac5ee6b194-82093896',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5368ac5ee754b8_78085145',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5368ac5ee754b8_78085145')) {function content_5368ac5ee754b8_78085145($_smarty_tpl) {?><div class="row-fluid">
    <div class="span2">
        <?php echo $_smarty_tpl->tpl_vars['data']->value["dateTime"];?>

    </div>
    <div class="span10">
        <?php echo trim($_smarty_tpl->tpl_vars['data']->value["message"]);?>

    </div>
    <hr/>
</div>
<div class="row-fluid">
    <div class="span12">
        <hr/>
    </div>
</div><?php }} ?>
