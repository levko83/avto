<?php /* Smarty version Smarty-3.1.15, created on 2014-02-17 13:21:25
         compiled from "/var/www/ponzps26/data/www/new.extraload.com.ua/protected/modules/admin/views/pages/editDisksPage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1933015325301f0b59884d7-25871969%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '126006d7cd71884e852a868e3c44128d5aea6ce0' => 
    array (
      0 => '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/modules/admin/views/pages/editDisksPage.tpl',
      1 => 1392289719,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1933015325301f0b59884d7-25871969',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'model' => 0,
    'DisksType' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5301f0b59fd8f7_73901684',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5301f0b59fd8f7_73901684')) {function content_5301f0b59fd8f7_73901684($_smarty_tpl) {?><?php if (!is_callable('smarty_block_form')) include '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/vendor/Smarty/plugins/block.form.php';
?><div class="row-fluid">
    <div class="span12">
        <?php $_smarty_tpl->smarty->_tag_stack[] = array('form', array('name'=>"DisksType",'id'=>'formPage','htmlOptions'=>array("class"=>"form-horizontal"))); $_block_repeat=true; echo smarty_block_form(array('name'=>"DisksType",'id'=>'formPage','htmlOptions'=>array("class"=>"form-horizontal")), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

        <div class="control-group">
            <label class="control-label">
                Страница:
            </label>
            <div class="controls">
                Диски <?php echo $_smarty_tpl->tpl_vars['model']->value->value;?>

            </div>
        </div>
            <div class="control-group">
                <label class="control-label">
                    Текст страницы:
                </label>
                <div class="controls">
                    <?php echo $_smarty_tpl->tpl_vars['DisksType']->value->textArea($_smarty_tpl->tpl_vars['model']->value,'text',array("class"=>'tiny'));?>

                    <span for="DisksType[text]" class="help-inline">
                        <?php echo $_smarty_tpl->tpl_vars['DisksType']->value->error($_smarty_tpl->tpl_vars['model']->value,'text');?>

                    </span>
                </div>
            </div>        
            <div class="control-group">
                <label class="control-label">
                    Title:
                </label>
                <div class="controls">
                    <?php echo $_smarty_tpl->tpl_vars['DisksType']->value->textField($_smarty_tpl->tpl_vars['model']->value,'title');?>

                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Meta (keywords):
                </label>
                <div class="controls">
                    <?php echo $_smarty_tpl->tpl_vars['DisksType']->value->textArea($_smarty_tpl->tpl_vars['model']->value,'meta_keywords');?>

                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Meta (description):
                </label>
                <div class="controls">
                    <?php echo $_smarty_tpl->tpl_vars['DisksType']->value->textArea($_smarty_tpl->tpl_vars['model']->value,'meta_description');?>

                </div>
            </div>
            <div class="form-actions">
                <button class="btn blue" type="submit">Сохранить</button>
            </div>            
        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_form(array('name'=>"DisksType",'id'=>'formPage','htmlOptions'=>array("class"=>"form-horizontal")), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

    </div>
</div><?php }} ?>
