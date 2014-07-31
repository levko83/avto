<?php /* Smarty version Smarty-3.1.15, created on 2014-02-21 17:39:40
         compiled from "/var/www/ponzps26/data/www/new.extraload.com.ua/protected/views/site/_blockActions.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1612082515307733c94d3d7-04279983%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd8456f6d3d9180f6c827df6883ef98f60d20a9df' => 
    array (
      0 => '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/views/site/_blockActions.tpl',
      1 => 1392997146,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1612082515307733c94d3d7-04279983',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'actions' => 0,
    'action' => 0,
    'prod_type' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5307733c9a9105_14342508',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5307733c9a9105_14342508')) {function content_5307733c9a9105_14342508($_smarty_tpl) {?><?php if (!is_callable('smarty_function_imageResizer')) include '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/vendor/Smarty/plugins/function.imageResizer.php';
?><?php $_smarty_tpl->tpl_vars['actions'] = new Smarty_variable(ActionsHelper::getActions(), null, 0);?>
<?php if (count($_smarty_tpl->tpl_vars['actions']->value)>0) {?>
<div class="discounted-items">
    <h2 class=title>Товары со скидкой</h2>
    <div class="content clearfix">
        <?php  $_smarty_tpl->tpl_vars["action"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["action"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['actions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["action"]->key => $_smarty_tpl->tpl_vars["action"]->value) {
$_smarty_tpl->tpl_vars["action"]->_loop = true;
?>
            <?php if ($_smarty_tpl->tpl_vars['action']->value["type"]=="drive") {?>
                <?php $_smarty_tpl->tpl_vars['prod_type'] = new Smarty_variable("drives", null, 0);?>
            <?php } else { ?>
                <?php $_smarty_tpl->tpl_vars['prod_type'] = new Smarty_variable("tires", null, 0);?>
            <?php }?>
            <div class="view-row first clearfix">
                <div class="image-row">
                    <a href="/<?php echo $_smarty_tpl->tpl_vars['prod_type']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['action']->value["id"];?>
-<?php echo $_smarty_tpl->tpl_vars['action']->value["translit"];?>
.html">
                        <img src="<?php echo smarty_function_imageResizer(array('product_type'=>$_smarty_tpl->tpl_vars['action']->value["type"],'imageName'=>$_smarty_tpl->tpl_vars['action']->value["imageName"],'width'=>90,'height'=>90),$_smarty_tpl);?>
" alt=" " title=" " />
                    </a>
                </div>
                <div class=row-title><a href="/<?php echo $_smarty_tpl->tpl_vars['prod_type']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['action']->value["id"];?>
-<?php echo $_smarty_tpl->tpl_vars['action']->value["translit"];?>
.html"><?php echo $_smarty_tpl->tpl_vars['action']->value["display_name"];?>
</a></div>
                <div class="old-price text-line"><?php echo $_smarty_tpl->tpl_vars['action']->value["oldPrice"];?>
 грн</div>
                <div class="price text-line"><?php echo $_smarty_tpl->tpl_vars['action']->value["newPrice"];?>
 грн</div>
            </div>
        <?php } ?>
    </div>
</div>
<?php }?><?php }} ?>
