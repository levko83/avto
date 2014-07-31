<?php /* Smarty version Smarty-3.1.15, created on 2014-03-20 10:10:28
         compiled from "/var/www/ponzps26/data/www/new.extraload.com.ua/protected/modules/admin/views/displays/shins.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19675248152eb9ac1be0591-37799215%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8827df0f9f4699fc7aaf56ba6f6ad6d45c23b2a4' => 
    array (
      0 => '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/modules/admin/views/displays/shins.tpl',
      1 => 1392997146,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19675248152eb9ac1be0591-37799215',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52eb9ac1c3b823_01202010',
  'variables' => 
  array (
    'model' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52eb9ac1c3b823_01202010')) {function content_52eb9ac1c3b823_01202010($_smarty_tpl) {?><?php if (!is_callable('smarty_function_widget')) include '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/vendor/Smarty/plugins/function.widget.php';
?><div class="default">
    <?php echo smarty_function_widget(array('name'=>'zii.widgets.grid.CGridView','id'=>"disksGrid",'dataProvider'=>$_smarty_tpl->tpl_vars['model']->value->search(),'filter'=>$_smarty_tpl->tpl_vars['model']->value,'columns'=>array(array('name'=>'id'),array('name'=>'display_name','type'=>'raw','value'=>'CHtml::encode($data->display_name)'),array('name'=>'minPrice','type'=>'raw','value'=>'($v = ShinsDisplays::model()->returnMinPrice($data->id)) > 0 ? $v : ""'),array('name'=>'actionPrice'),array('name'=>'title','type'=>'raw','value'=>'CHtml::encode($data->title)'),array('name'=>'display_description','type'=>'raw','value'=>'$data->display_description'),array('name'=>'meta_keywords','type'=>'raw','value'=>'CHtml::encode($data->meta_keywords)'),array('name'=>'meta_description','type'=>'raw','value'=>'CHtml::encode($data->meta_description)'),array('class'=>'CButtonColumn','template'=>'{update}','updateButtonUrl'=>'Yii::app()->createUrl("/admin/displays/shins", array("id" => $data->id))'))),$_smarty_tpl);?>

</div>

<?php }} ?>
