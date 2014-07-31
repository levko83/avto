<?php /* Smarty version Smarty-3.1.15, created on 2014-02-13 13:09:32
         compiled from "/var/www/ponzps26/data/www/new.extraload.com.ua/protected/modules/admin/views/vendors/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21281864652fca7ec892216-52966907%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'adb7a3b7ca83c56aa5a769b8d8d23141e44d9967' => 
    array (
      0 => '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/modules/admin/views/vendors/index.tpl',
      1 => 1392289719,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21281864652fca7ec892216-52966907',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'model' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52fca7ec9a96b9_77110064',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52fca7ec9a96b9_77110064')) {function content_52fca7ec9a96b9_77110064($_smarty_tpl) {?><?php if (!is_callable('smarty_function_widget')) include '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/vendor/Smarty/plugins/function.widget.php';
?><div class="default">
    <?php echo smarty_function_widget(array('name'=>'zii.widgets.grid.CGridView','id'=>"vendorsGrid",'dataProvider'=>$_smarty_tpl->tpl_vars['model']->value->search(),'filter'=>$_smarty_tpl->tpl_vars['model']->value,'columns'=>array(array('name'=>'id','sortable'=>false,'filter'=>false),array('name'=>'image','type'=>'html','value'=>'!empty($data->image) ? "<img src=\"/images/vendors/{$data->iconImg}\" alt=\"\">" :"no image"','sortable'=>false,'filter'=>false),array('name'=>'value','type'=>'raw','value'=>'CHtml::encode($data->value)'),array('name'=>'description','type'=>'raw','value'=>$_smarty_tpl->tpl_vars['data']->value->description,'sortable'=>false,'filter'=>false),array('name'=>'title','type'=>'raw','value'=>'CHtml::encode($data->title)','sortable'=>false,'filter'=>false),array('name'=>'meta_keywords','type'=>'raw','value'=>'CHtml::encode($data->meta_keywords)','sortable'=>false,'filter'=>false),array('name'=>'meta_description','type'=>'raw','value'=>'CHtml::encode($data->meta_description)','sortable'=>false,'filter'=>false),array('class'=>'CButtonColumn','template'=>'{update}','updateButtonUrl'=>'Yii::app()->createUrl("/admin/vendors/edit", array("id" => $data->id))'))),$_smarty_tpl);?>

</div>

<?php }} ?>
