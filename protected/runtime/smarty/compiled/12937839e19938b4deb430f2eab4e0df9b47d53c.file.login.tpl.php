<?php /* Smarty version Smarty-3.1.15, created on 2014-01-09 12:40:10
         compiled from "/var/www/ponzps26/data/www/new.extraload.com.ua/protected/modules/admin/views/login/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:116574841752ce7c8aa7b023-39549085%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '12937839e19938b4deb430f2eab4e0df9b47d53c' => 
    array (
      0 => '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/modules/admin/views/login/login.tpl',
      1 => 1389192911,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '116574841752ce7c8aa7b023-39549085',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'model' => 0,
    'LoginForm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52ce7c8ab05b36_87551172',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52ce7c8ab05b36_87551172')) {function content_52ce7c8ab05b36_87551172($_smarty_tpl) {?><?php if (!is_callable('smarty_block_form')) include '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/vendor/Smarty/plugins/block.form.php';
?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('form', array('name'=>"LoginForm",'htmlOptions'=>array("class"=>"form-vertical login-form","novalidate"=>"novalidate"),'action'=>Yii::app()->createUrl("admin/login/login"),'method'=>"post")); $_block_repeat=true; echo smarty_block_form(array('name'=>"LoginForm",'htmlOptions'=>array("class"=>"form-vertical login-form","novalidate"=>"novalidate"),'action'=>Yii::app()->createUrl("admin/login/login"),'method'=>"post"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

    <h3 class="form-title">Вход в систему</h3>
    <?php if (count($_smarty_tpl->tpl_vars['model']->value->errors)>0) {?>
        <div class="alert alert-error">
            <button class="close" data-dismiss="alert"></button>
            <span><?php echo $_smarty_tpl->tpl_vars['model']->value->errors["password"][0];?>
</span>
        </div>
    <?php }?>
    <div class="control-group">
        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
        <label class="control-label visible-ie8 visible-ie9">Логин</label>
        <div class="controls">
            <div class="input-icon left">
                <i class="icon-user"></i>
                
                <?php echo $_smarty_tpl->tpl_vars['LoginForm']->value->textField($_smarty_tpl->tpl_vars['model']->value,"login",array("class"=>"m-wrap placeholder-no-fix","autocomplete"=>"off","placeholder"=>"Логин"));?>

            </div>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label visible-ie8 visible-ie9">Пароль</label>
        <div class="controls">
            <div class="input-icon left">
                <i class="icon-lock"></i>
                
                <?php echo $_smarty_tpl->tpl_vars['LoginForm']->value->passwordField($_smarty_tpl->tpl_vars['model']->value,"password",array("class"=>"m-wrap placeholder-no-fix","autocomplete"=>"off","placeholder"=>"Пароль"));?>

            </div>
        </div>
    </div>
    <div class="form-actions">
        <label class="checkbox">
            
            <?php echo $_smarty_tpl->tpl_vars['LoginForm']->value->checkBox($_smarty_tpl->tpl_vars['model']->value,"remember",array("value"=>1));?>
 Запомнить меня
        </label>
        <button type="submit" class="btn green pull-right">
            Войти <i class="m-icon-swapright m-icon-white"></i>
        </button>
        
               
               
                    
                    
               
        
    </div>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_form(array('name'=>"LoginForm",'htmlOptions'=>array("class"=>"form-vertical login-form","novalidate"=>"novalidate"),'action'=>Yii::app()->createUrl("admin/login/login"),'method'=>"post"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<!--    <div class="forget-password">-->
<!--        <h4>Forgot your password ?</h4>-->
<!--        <p>-->
<!--            no worries, click <a href="javascript:;" id="forget-password">here</a>-->
<!--            to reset your password.-->
<!--        </p>-->
<!--    </div>    -->
<?php }} ?>
