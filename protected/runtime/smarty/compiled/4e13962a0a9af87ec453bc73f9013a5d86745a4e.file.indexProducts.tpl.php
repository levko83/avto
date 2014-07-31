<?php /* Smarty version Smarty-3.1.15, created on 2014-03-12 18:47:42
         compiled from "/var/www/ponzps26/data/www/new.extraload.com.ua/protected/modules/admin/views/vendors/indexProducts.tpl" */ ?>
<?php /*%%SmartyHeaderCode:46239318153208faead2047-38421707%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4e13962a0a9af87ec453bc73f9013a5d86745a4e' => 
    array (
      0 => '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/modules/admin/views/vendors/indexProducts.tpl',
      1 => 1394642822,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '46239318153208faead2047-38421707',
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
  'unifunc' => 'content_53208faeb51fa6_59549018',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53208faeb51fa6_59549018')) {function content_53208faeb51fa6_59549018($_smarty_tpl) {?><?php if (!is_callable('smarty_function_widget')) include '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/vendor/Smarty/plugins/function.widget.php';
?><div class="default">
    <?php echo smarty_function_widget(array('name'=>'zii.widgets.grid.CGridView','id'=>"vendorsGrid",'dataProvider'=>$_smarty_tpl->tpl_vars['model']->value->search(),'filter'=>$_smarty_tpl->tpl_vars['model']->value,'ajaxType'=>"POST",'columns'=>array(array('name'=>'id','sortable'=>false,'filter'=>false),array('name'=>'image','type'=>'html','value'=>'!empty($data->image) ? "<img src=\"/images/{$data->type}_vendors/{$data->iconImg}\" alt=\"\">" :"no image"','sortable'=>false,'filter'=>false),array('name'=>'vendor_name','type'=>'raw','value'=>'CHtml::encode($data->vendor_name)'),array('name'=>'description','type'=>'raw','value'=>$_smarty_tpl->tpl_vars['data']->value->description,'sortable'=>false,'filter'=>false),array('name'=>'title','type'=>'raw','value'=>'CHtml::encode($data->title)','sortable'=>false,'filter'=>false),array('name'=>'meta_keywords','type'=>'raw','value'=>'CHtml::encode($data->meta_keywords)','sortable'=>false,'filter'=>false),array('name'=>'meta_description','type'=>'raw','value'=>'CHtml::encode($data->meta_description)','sortable'=>false,'filter'=>false),array('class'=>'CButtonColumn','template'=>'{update}','updateButtonUrl'=>'Yii::app()->createUrl("admin/vendors/productsVendorsEdit", array("product_type" => $data->type == "drives" ? "disks" : "shins", "id" => $data->id))'))),$_smarty_tpl);?>

</div>

<?php }} ?>
