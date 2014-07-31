<?php /* Smarty version Smarty-3.1.15, created on 2014-01-27 16:41:45
         compiled from "/var/www/ponzps26/data/www/new.extraload.com.ua/protected/views/layouts/tires_page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:110379527652cd980145e224-38994774%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '16af892d2bde8edf01c3c91a349ce6bfa5848797' => 
    array (
      0 => '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/views/layouts/tires_page.tpl',
      1 => 1390830884,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '110379527652cd980145e224-38994774',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52cd980146bbc3_20278947',
  'variables' => 
  array (
    'this' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52cd980146bbc3_20278947')) {function content_52cd980146bbc3_20278947($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['this']->value->beginContent('//layouts/main');?>

    <script type="text/javascript">
        $(document).ready(function(){
            $("body").removeClass().addClass("html not-front catalog tires");
        });
    </script>
    <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

<?php echo $_smarty_tpl->tpl_vars['this']->value->endContent();?>

<?php }} ?>
