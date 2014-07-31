<?php /* Smarty version Smarty-3.1.15, created on 2014-07-29 14:50:11
         compiled from "/var/www/ponzps26/data/www/new.extraload.com.ua/protected/modules/admin/views/users/changePass.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17567456053d78a738f00d0-65499685%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e102c7d91edeae271a685a825568439464b22c59' => 
    array (
      0 => '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/modules/admin/views/users/changePass.tpl',
      1 => 1389192911,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17567456053d78a738f00d0-65499685',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'model' => 0,
    'Users' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_53d78a73aac8c6_64023017',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53d78a73aac8c6_64023017')) {function content_53d78a73aac8c6_64023017($_smarty_tpl) {?><?php if (!is_callable('smarty_block_form')) include '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/vendor/Smarty/plugins/block.form.php';
?><h4>Изменение пароля</h4>
<div class="row-fluid">
    <div class="span12">
        <?php $_smarty_tpl->smarty->_tag_stack[] = array('form', array('name'=>"Users",'id'=>'formChangePass','htmlOptions'=>array("class"=>"form-horizontal"))); $_block_repeat=true; echo smarty_block_form(array('name'=>"Users",'id'=>'formChangePass','htmlOptions'=>array("class"=>"form-horizontal")), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

            <div class="form-wizard">
                <div class="control-group">
                    <label class="control-label">
                        Существующий пароль
                        <span class="required">*</span>
                    </label>
                    <div class="controls">
                        <?php echo $_smarty_tpl->tpl_vars['Users']->value->passwordField($_smarty_tpl->tpl_vars['model']->value,'old_password');?>

                        <span for="Users[old_password]" class="help-inline">
                            <?php echo $_smarty_tpl->tpl_vars['Users']->value->error($_smarty_tpl->tpl_vars['model']->value,'old_password');?>

                        </span>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">
                        Новый пароль
                        <span class="required">*</span>
                    </label>
                    <div class="controls">
                        <?php echo $_smarty_tpl->tpl_vars['Users']->value->passwordField($_smarty_tpl->tpl_vars['model']->value,'password');?>

                        <span for="Users[password]" class="help-inline">
                            <?php echo $_smarty_tpl->tpl_vars['Users']->value->error($_smarty_tpl->tpl_vars['model']->value,'password');?>

                        </span>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">
                        Подтверждение пароля
                        <span class="required">*</span>
                    </label>
                    <div class="controls">
                        <?php echo $_smarty_tpl->tpl_vars['Users']->value->passwordField($_smarty_tpl->tpl_vars['model']->value,'password_confirm');?>

                        <span for="Users[password_confirm]" class="help-inline">
                            <?php echo $_smarty_tpl->tpl_vars['Users']->value->error($_smarty_tpl->tpl_vars['model']->value,'password_confirm');?>

                        </span>
                    </div>
                </div>
                <div class="form-actions">
                    <button class="btn blue" type="submit">Изменить пароль</button>
                </div>
            </div>
        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_form(array('name'=>"Users",'id'=>'formChangePass','htmlOptions'=>array("class"=>"form-horizontal")), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

    </div>
</div><?php }} ?>
