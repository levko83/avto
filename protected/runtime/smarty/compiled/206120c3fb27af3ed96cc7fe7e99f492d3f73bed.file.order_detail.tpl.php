<?php /* Smarty version Smarty-3.1.15, created on 2014-02-28 12:48:45
         compiled from "/var/www/ponzps26/data/www/new.extraload.com.ua/protected/views/layouts/order_detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2358872155310698d22f507-98931126%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '206120c3fb27af3ed96cc7fe7e99f492d3f73bed' => 
    array (
      0 => '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/views/layouts/order_detail.tpl',
      1 => 1393584497,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2358872155310698d22f507-98931126',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'this' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5310698d23da75_66525030',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5310698d23da75_66525030')) {function content_5310698d23da75_66525030($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['this']->value->beginContent('//layouts/main');?>

<script type="text/javascript">
    $(document).ready(function(){
        $("body").removeClass().addClass("html not-front detailed-ordering-page");
    });
</script>
<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

<?php echo $_smarty_tpl->tpl_vars['this']->value->endContent();?>
<?php }} ?>
