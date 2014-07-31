<?php /* Smarty version Smarty-3.1.15, created on 2014-01-27 15:57:06
         compiled from "/var/www/ponzps26/data/www/new.extraload.com.ua/protected/views/layouts/drives_page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:83531417752e665b2906271-15471735%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '08bf2650617edfdc620fa622c8d28f89bfb22c12' => 
    array (
      0 => '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/views/layouts/drives_page.tpl',
      1 => 1390830884,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '83531417752e665b2906271-15471735',
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
  'unifunc' => 'content_52e665b2913e80_20773006',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52e665b2913e80_20773006')) {function content_52e665b2913e80_20773006($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['this']->value->beginContent('//layouts/main');?>

    <script type="text/javascript">
        $(document).ready(function(){
            $("body").removeClass().addClass("html not-front catalog drive");
        });
    </script>
    <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

<?php echo $_smarty_tpl->tpl_vars['this']->value->endContent();?>

<?php }} ?>
