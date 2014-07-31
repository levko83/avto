<?php /* Smarty version Smarty-3.1.15, created on 2014-03-06 18:57:03
         compiled from "/var/www/ponzps26/data/www/new.extraload.com.ua/protected/modules/admin/views/displays/disks.tpl" */ ?>
<?php /*%%SmartyHeaderCode:201906628052df7ab5d9da74-63170464%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0599b9816a86334db3c315811de08ccb5874625c' => 
    array (
      0 => '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/modules/admin/views/displays/disks.tpl',
      1 => 1392997146,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '201906628052df7ab5d9da74-63170464',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52df7ab5eee6b5_26209282',
  'variables' => 
  array (
    'model' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52df7ab5eee6b5_26209282')) {function content_52df7ab5eee6b5_26209282($_smarty_tpl) {?><?php if (!is_callable('smarty_function_widget')) include '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/vendor/Smarty/plugins/function.widget.php';
?><div class="default">
    <?php echo smarty_function_widget(array('name'=>'zii.widgets.grid.CGridView','id'=>"disksGrid",'dataProvider'=>$_smarty_tpl->tpl_vars['model']->value->search(),'filter'=>$_smarty_tpl->tpl_vars['model']->value,'columns'=>array(array('name'=>'id'),array('name'=>'display_name','type'=>'raw','value'=>'CHtml::encode($data->display_name)'),array('name'=>'minPrice','type'=>'raw','value'=>'($v = DisksDisplays::model()->returnMinPrice($data->id)) > 0 ? $v : ""'),array('name'=>'title','type'=>'raw','value'=>'CHtml::encode($data->title)'),array('name'=>'display_description','type'=>'raw','value'=>'$data->display_description'),array('name'=>'meta_keywords','type'=>'raw','value'=>'CHtml::encode($data->meta_keywords)'),array('name'=>'meta_description','type'=>'raw','value'=>'CHtml::encode($data->meta_description)'),array('class'=>'CButtonColumn','template'=>'{update}','updateButtonUrl'=>'Yii::app()->createUrl("/admin/displays/disks", array("id" => $data->id))'))),$_smarty_tpl);?>

</div>

<?php }} ?>
