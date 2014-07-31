<?php /* Smarty version Smarty-3.1.15, created on 2014-05-23 22:59:39
         compiled from "/var/www/ponzps26/data/www/new.extraload.com.ua/protected/views/layouts/delivery_page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1454826012537fa8ab767562-02830573%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '00c389b7cdf7b0a03c62d6066215dd3ba9084c54' => 
    array (
      0 => '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/views/layouts/delivery_page.tpl',
      1 => 1400875122,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1454826012537fa8ab767562-02830573',
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
  'unifunc' => 'content_537fa8ab76f5a3_34463329',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_537fa8ab76f5a3_34463329')) {function content_537fa8ab76f5a3_34463329($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['this']->value->beginContent('//layouts/main');?>

<script type="text/javascript">
    $(document).ready(function(){
        $("body").removeClass().addClass("html not-front payment-delivery-page");
    });
</script>
<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

<?php echo $_smarty_tpl->tpl_vars['this']->value->endContent();?>
<?php }} ?>
