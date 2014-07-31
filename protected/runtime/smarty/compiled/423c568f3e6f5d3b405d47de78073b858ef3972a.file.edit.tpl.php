<?php /* Smarty version Smarty-3.1.15, created on 2014-02-17 03:41:48
         compiled from "/var/www/ponzps26/data/www/new.extraload.com.ua/protected/modules/admin/views/pages/edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:357120987530168dca98f79-77785153%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '423c568f3e6f5d3b405d47de78073b858ef3972a' => 
    array (
      0 => '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/modules/admin/views/pages/edit.tpl',
      1 => 1392289719,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '357120987530168dca98f79-77785153',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'model' => 0,
    'Pages' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_530168dcb75118_03259424',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_530168dcb75118_03259424')) {function content_530168dcb75118_03259424($_smarty_tpl) {?><?php if (!is_callable('smarty_block_form')) include '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/vendor/Smarty/plugins/block.form.php';
?><div class="row-fluid">
    <div class="span12">
        <?php $_smarty_tpl->smarty->_tag_stack[] = array('form', array('name'=>"Pages",'id'=>'formPage','htmlOptions'=>array("class"=>"form-horizontal"))); $_block_repeat=true; echo smarty_block_form(array('name'=>"Pages",'id'=>'formPage','htmlOptions'=>array("class"=>"form-horizontal")), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

            <div class="control-group">
                <label class="control-label">
                    Страница:
                </label>
                <div class="controls">
                    <?php echo $_smarty_tpl->tpl_vars['model']->value->label;?>

                </div>
            </div>
            <?php if ($_smarty_tpl->tpl_vars['model']->value->hasText==1) {?>
            <div class="control-group">
                <label class="control-label">
                    Текст страницы: <span class="required">*</span>
                </label>
                <div class="controls">
                    <?php echo $_smarty_tpl->tpl_vars['Pages']->value->textArea($_smarty_tpl->tpl_vars['model']->value,'text',array("class"=>'tiny'));?>

                    <span for="Pages[text]" class="help-inline">
                        <?php echo $_smarty_tpl->tpl_vars['Pages']->value->error($_smarty_tpl->tpl_vars['model']->value,'text');?>

                    </span>
                </div>
            </div>
            <?php }?>
            <div class="control-group">
                <label class="control-label">
                    Title:
                </label>
                <div class="controls">
                    <?php echo $_smarty_tpl->tpl_vars['Pages']->value->textField($_smarty_tpl->tpl_vars['model']->value,'title');?>

                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Meta (keywords):
                </label>
                <div class="controls">
                    <?php echo $_smarty_tpl->tpl_vars['Pages']->value->textArea($_smarty_tpl->tpl_vars['model']->value,'meta_keywords');?>

                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Meta (description):
                </label>
                <div class="controls">
                    <?php echo $_smarty_tpl->tpl_vars['Pages']->value->textArea($_smarty_tpl->tpl_vars['model']->value,'meta_description');?>

                </div>
            </div>
            <div class="form-actions">
                <button class="btn blue" type="submit">Сохранить</button>
            </div>
        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_form(array('name'=>"Pages",'id'=>'formPage','htmlOptions'=>array("class"=>"form-horizontal")), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

    </div>
</div>
<?php }} ?>
