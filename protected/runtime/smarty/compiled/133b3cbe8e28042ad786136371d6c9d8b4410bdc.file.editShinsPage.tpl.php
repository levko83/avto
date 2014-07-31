<?php /* Smarty version Smarty-3.1.15, created on 2014-03-05 14:42:07
         compiled from "/var/www/ponzps26/data/www/new.extraload.com.ua/protected/modules/admin/views/pages/editShinsPage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:148768573753171b9fc83ed7-58452341%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '133b3cbe8e28042ad786136371d6c9d8b4410bdc' => 
    array (
      0 => '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/modules/admin/views/pages/editShinsPage.tpl',
      1 => 1392289719,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '148768573753171b9fc83ed7-58452341',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'model' => 0,
    'ShinsSeason' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_53171b9fd4a0a2_65954731',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53171b9fd4a0a2_65954731')) {function content_53171b9fd4a0a2_65954731($_smarty_tpl) {?><?php if (!is_callable('smarty_block_form')) include '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/vendor/Smarty/plugins/block.form.php';
?><div class="row-fluid">
    <div class="span12">
        <?php $_smarty_tpl->smarty->_tag_stack[] = array('form', array('name'=>"ShinsSeason",'id'=>'formPage','htmlOptions'=>array("class"=>"form-horizontal"))); $_block_repeat=true; echo smarty_block_form(array('name'=>"ShinsSeason",'id'=>'formPage','htmlOptions'=>array("class"=>"form-horizontal")), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

        <div class="control-group">
            <label class="control-label">
                Страница:
            </label>
            <div class="controls">
                Шины <?php echo $_smarty_tpl->tpl_vars['model']->value->value;?>

            </div>
        </div>
            <div class="control-group">
                <label class="control-label">
                    Текст страницы:
                </label>
                <div class="controls">
                    <?php echo $_smarty_tpl->tpl_vars['ShinsSeason']->value->textArea($_smarty_tpl->tpl_vars['model']->value,'text',array("class"=>'tiny'));?>

                    <span for="ShinsSeason[text]" class="help-inline">
                        <?php echo $_smarty_tpl->tpl_vars['ShinsSeason']->value->error($_smarty_tpl->tpl_vars['model']->value,'text');?>

                    </span>
                </div>
            </div>        
            <div class="control-group">
                <label class="control-label">
                    Title:
                </label>
                <div class="controls">
                    <?php echo $_smarty_tpl->tpl_vars['ShinsSeason']->value->textField($_smarty_tpl->tpl_vars['model']->value,'title');?>

                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Meta (keywords):
                </label>
                <div class="controls">
                    <?php echo $_smarty_tpl->tpl_vars['ShinsSeason']->value->textArea($_smarty_tpl->tpl_vars['model']->value,'meta_keywords');?>

                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Meta (description):
                </label>
                <div class="controls">
                    <?php echo $_smarty_tpl->tpl_vars['ShinsSeason']->value->textArea($_smarty_tpl->tpl_vars['model']->value,'meta_description');?>

                </div>
            </div>
            <div class="form-actions">
                <button class="btn blue" type="submit">Сохранить</button>
            </div>            
        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_form(array('name'=>"ShinsSeason",'id'=>'formPage','htmlOptions'=>array("class"=>"form-horizontal")), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

    </div>
</div><?php }} ?>
