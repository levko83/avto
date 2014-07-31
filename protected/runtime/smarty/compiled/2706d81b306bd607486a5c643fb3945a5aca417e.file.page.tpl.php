<?php /* Smarty version Smarty-3.1.15, created on 2014-02-13 14:46:14
         compiled from "/var/www/ponzps26/data/www/new.extraload.com.ua/protected/views/layouts/page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:80633904852fcbe96cfbde5-50203144%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2706d81b306bd607486a5c643fb3945a5aca417e' => 
    array (
      0 => '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/views/layouts/page.tpl',
      1 => 1392289719,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '80633904852fcbe96cfbde5-50203144',
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
  'unifunc' => 'content_52fcbe96d0cc55_53053212',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52fcbe96d0cc55_53053212')) {function content_52fcbe96d0cc55_53053212($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['this']->value->beginContent('//layouts/main');?>

    <script type="text/javascript">
        $(document).ready(function(){
            $("body").removeClass().addClass("html not-front <?php echo $_smarty_tpl->tpl_vars['this']->value->page_type;?>
");
        });
    </script>
    <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

<?php echo $_smarty_tpl->tpl_vars['this']->value->endContent();?>

<?php }} ?>
