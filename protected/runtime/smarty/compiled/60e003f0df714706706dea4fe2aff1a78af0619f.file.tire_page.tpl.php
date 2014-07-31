<?php /* Smarty version Smarty-3.1.15, created on 2014-01-15 17:29:35
         compiled from "/var/www/ponzps26/data/www/new.extraload.com.ua/protected/views/layouts/tire_page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:108656643252d6a95fc1a415-09120592%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '60e003f0df714706706dea4fe2aff1a78af0619f' => 
    array (
      0 => '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/views/layouts/tire_page.tpl',
      1 => 1389798029,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '108656643252d6a95fc1a415-09120592',
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
  'unifunc' => 'content_52d6a95fc28836_67354895',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52d6a95fc28836_67354895')) {function content_52d6a95fc28836_67354895($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['this']->value->beginContent('//layouts/main');?>

    <script type="text/javascript">
        $(document).ready(function(){
            $("body").removeClass().addClass("html not-front drive");
        });
    </script>
    <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

<?php echo $_smarty_tpl->tpl_vars['this']->value->endContent();?>

<?php }} ?>
