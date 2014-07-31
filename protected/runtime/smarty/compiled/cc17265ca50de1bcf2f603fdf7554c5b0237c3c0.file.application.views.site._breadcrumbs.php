<?php /* Smarty version Smarty-3.1.15, created on 2014-04-04 14:22:02
         compiled from "/var/www/ponzps26/data/www/new.extraload.com.ua/protected/views/site/_breadcrumbs.tpl" */ ?>
<?php /*%%SmartyHeaderCode:24642189533e78e5d39e44-65263079%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cc17265ca50de1bcf2f603fdf7554c5b0237c3c0' => 
    array (
      0 => '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/views/site/_breadcrumbs.tpl',
      1 => 1396610517,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24642189533e78e5d39e44-65263079',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_533e78e5d49775_92084910',
  'variables' => 
  array (
    'this' => 0,
    'breadcrumb' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_533e78e5d49775_92084910')) {function content_533e78e5d49775_92084910($_smarty_tpl) {?><div class="breadcrumbs">
    <?php  $_smarty_tpl->tpl_vars['breadcrumb'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['breadcrumb']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['this']->value->breadcrumbs; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['breadcrumb']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['breadcrumb']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['breadcrumb']->key => $_smarty_tpl->tpl_vars['breadcrumb']->value) {
$_smarty_tpl->tpl_vars['breadcrumb']->_loop = true;
 $_smarty_tpl->tpl_vars['breadcrumb']->iteration++;
 $_smarty_tpl->tpl_vars['breadcrumb']->last = $_smarty_tpl->tpl_vars['breadcrumb']->iteration === $_smarty_tpl->tpl_vars['breadcrumb']->total;
?>
        <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
            <?php if (!$_smarty_tpl->tpl_vars['breadcrumb']->last) {?><a itemprop="url" href="<?php echo $_smarty_tpl->tpl_vars['breadcrumb']->value["url"];?>
"> <span itemprop="title"><?php echo $_smarty_tpl->tpl_vars['breadcrumb']->value["title"];?>
</span></a><?php } else { ?><?php echo $_smarty_tpl->tpl_vars['breadcrumb']->value["title"];?>
<?php }?><?php if (!$_smarty_tpl->tpl_vars['breadcrumb']->last) {?> ><?php }?>
        </div>
    <?php } ?>
</div><?php }} ?>
