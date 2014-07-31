<?php /* Smarty version Smarty-3.1.15, created on 2014-01-09 12:40:30
         compiled from "/var/www/ponzps26/data/www/new.extraload.com.ua/protected/modules/admin/views/users/users.tpl" */ ?>
<?php /*%%SmartyHeaderCode:28715070252ce7c9e132548-14647180%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1343c723febb0f95530ed23adb5263192731c5d0' => 
    array (
      0 => '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/modules/admin/views/users/users.tpl',
      1 => 1389192911,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28715070252ce7c9e132548-14647180',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'model' => 0,
    'rowCssClassExpression' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52ce7c9e1a0a99_67478928',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52ce7c9e1a0a99_67478928')) {function content_52ce7c9e1a0a99_67478928($_smarty_tpl) {?><?php if (!is_callable('smarty_function_widget')) include '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/vendor/Smarty/plugins/function.widget.php';
?><h3 class="block">Пользователи</h3>
<div class="default">
    <?php echo smarty_function_widget(array('name'=>'zii.widgets.grid.CGridView','id'=>"usersGrid",'dataProvider'=>$_smarty_tpl->tpl_vars['model']->value->view(),'rowCssClassExpression'=>$_smarty_tpl->tpl_vars['rowCssClassExpression']->value,'filter'=>$_smarty_tpl->tpl_vars['model']->value,'columns'=>array(array('name'=>'id'),array('name'=>'fio'),array('name'=>'login'),array('name'=>'role_id','value'=>'$data->roles->role_description','filter'=>CHtml::listData(Roles::model()->findAll('id > 1'),'id','role_description')),array('name'=>'post'),array('name'=>'email'),array('name'=>'banned','value'=>'$data->banned == 0 ? "Активен" : "Заблокирован"','filter'=>array(0=>'Активен',1=>'Заблокирован')),array('class'=>'CButtonColumn','template'=>'{update}{delete}','deleteConfirmation'=>'Вы действительно хотите удалить пользователя?','updateButtonUrl'=>'Yii::app()->createUrl("/admin/users/edit", array("id" => $data->id))','deleteButtonUrl'=>'Yii::app()->createUrl("/admin/users/delete", array("id" => $data->id))','afterDelete'=>'function(link,success,data){
                                  if(success){
                                      window.location = "/admin/users";
                                  }
                              }'))),$_smarty_tpl);?>

</div>
<a class="btn blue" href="<?php echo Yii::app()->createUrl('/admin/users/edit');?>
">Новый пользователь</a><?php }} ?>
