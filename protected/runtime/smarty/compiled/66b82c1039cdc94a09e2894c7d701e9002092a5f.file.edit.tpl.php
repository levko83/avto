<?php /* Smarty version Smarty-3.1.15, created on 2014-07-01 11:52:27
         compiled from "/var/www/ponzps26/data/www/new.extraload.com.ua/protected/modules/admin/views/users/edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:109403804253b276cb66d7e7-28298742%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '66b82c1039cdc94a09e2894c7d701e9002092a5f' => 
    array (
      0 => '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/modules/admin/views/users/edit.tpl',
      1 => 1389192911,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '109403804253b276cb66d7e7-28298742',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'model' => 0,
    'labels' => 0,
    'Users' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_53b276cb7d5e68_80285604',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53b276cb7d5e68_80285604')) {function content_53b276cb7d5e68_80285604($_smarty_tpl) {?><?php if (!is_callable('smarty_block_form')) include '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/vendor/Smarty/plugins/block.form.php';
?><h4>Редактирование пользователя <?php echo $_smarty_tpl->tpl_vars['model']->value->fio;?>
</h4>
<div class="row-fluid">
    <div class="span12">
        <?php $_smarty_tpl->smarty->_tag_stack[] = array('form', array('name'=>"Users",'id'=>'formUsers','htmlOptions'=>array("class"=>"form-horizontal"))); $_block_repeat=true; echo smarty_block_form(array('name'=>"Users",'id'=>'formUsers','htmlOptions'=>array("class"=>"form-horizontal")), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

            <div class="form-wizard">
                <div class="control-group">
                    <label class="control-label">
                        <?php echo $_smarty_tpl->tpl_vars['labels']->value["fio"];?>

                        <span class="required">*</span>
                    </label>
                    <div class="controls">
                        <?php echo $_smarty_tpl->tpl_vars['Users']->value->textField($_smarty_tpl->tpl_vars['model']->value,'fio');?>

                        <span for="Users[fio]" class="help-inline">
                            <?php echo $_smarty_tpl->tpl_vars['Users']->value->error($_smarty_tpl->tpl_vars['model']->value,'fio');?>

                        </span>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">
                        <?php echo $_smarty_tpl->tpl_vars['labels']->value["role_id"];?>

                        <span class="required">*</span>
                    </label>
                    <div class="controls">
                        <?php echo $_smarty_tpl->tpl_vars['Users']->value->dropDownList($_smarty_tpl->tpl_vars['model']->value,'role_id',Roles::model()->listData());?>

                        <span for="Users[role_id]" class="help-inline">
                            <?php echo $_smarty_tpl->tpl_vars['Users']->value->error($_smarty_tpl->tpl_vars['model']->value,'role_id');?>

                        </span>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">
                        <?php echo $_smarty_tpl->tpl_vars['labels']->value["post"];?>

                    </label>
                    <div class="controls">
                        <?php echo $_smarty_tpl->tpl_vars['Users']->value->textField($_smarty_tpl->tpl_vars['model']->value,'post');?>

                        <span for="Users[post]" class="help-inline">
                            <?php echo $_smarty_tpl->tpl_vars['Users']->value->error($_smarty_tpl->tpl_vars['model']->value,'post');?>

                        </span>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">
                        <?php echo $_smarty_tpl->tpl_vars['labels']->value["email"];?>

                    </label>
                    <div class="controls">
                        <?php echo $_smarty_tpl->tpl_vars['Users']->value->textField($_smarty_tpl->tpl_vars['model']->value,'email');?>

                        <span for="Users[email]" class="help-inline">
                            <?php echo $_smarty_tpl->tpl_vars['Users']->value->error($_smarty_tpl->tpl_vars['model']->value,'email');?>

                        </span>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">
                        Забанить
                    </label>
                    <div class="controls">
                        <?php echo $_smarty_tpl->tpl_vars['Users']->value->checkBox($_smarty_tpl->tpl_vars['model']->value,'banned',array('value'=>1,'uncheckValue'=>0));?>

                        <span for="Users[banned]" class="help-inline">
                            <?php echo $_smarty_tpl->tpl_vars['Users']->value->error($_smarty_tpl->tpl_vars['model']->value,'banned');?>

                        </span>
                    </div>
                </div>
                <div class="form-actions">
                    <button class="btn blue" type="submit">Сохранить</button>
                </div>
            </div>
        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_form(array('name'=>"Users",'id'=>'formUsers','htmlOptions'=>array("class"=>"form-horizontal")), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

    </div>
</div><?php }} ?>
