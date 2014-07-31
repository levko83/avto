<?php /* Smarty version Smarty-3.1.15, created on 2014-03-19 13:23:17
         compiled from "/var/www/ponzps26/data/www/new.extraload.com.ua/protected/modules/admin/views/products/shins.tpl" */ ?>
<?php /*%%SmartyHeaderCode:27174235252ce7ca9ebed38-34181935%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0521669610a965e4d75bfe73e9f3facead1fc6d5' => 
    array (
      0 => '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/modules/admin/views/products/shins.tpl',
      1 => 1395228175,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27174235252ce7ca9ebed38-34181935',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52ce7caa03a0f3_36796398',
  'variables' => 
  array (
    'model' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52ce7caa03a0f3_36796398')) {function content_52ce7caa03a0f3_36796398($_smarty_tpl) {?><?php if (!is_callable('smarty_function_widget')) include '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/vendor/Smarty/plugins/function.widget.php';
?><div class="default">
    <?php echo smarty_function_widget(array('name'=>'zii.widgets.grid.CGridView','id'=>"shinsGrid",'dataProvider'=>$_smarty_tpl->tpl_vars['model']->value->getTable(),'selectableRows'=>2,'filter'=>$_smarty_tpl->tpl_vars['model']->value,'columns'=>array(array('class'=>'CCheckBoxColumn','value'=>'$data->id','checkBoxHtmlOptions'=>array('name'=>'idList[]')),array('name'=>'id'),array('name'=>'product_name'),array('name'=>'vendor_id','value'=>'$data->vendor->vendor_name','filter'=>CHtml::listData(ShinsVendors::model()->findAll(),'id','vendor_name')),array('name'=>'shins_type_of_avto_id','value'=>'$data->shinsTypeOfAvto->value','filter'=>CHtml::listData(ShinsTypeOfAvto::model()->findAll("id > 1"),'id','value')),array('name'=>'shins_season_id','value'=>'$data->shinsSeason->value','filter'=>CHtml::listData(ShinsSeason::model()->findAll("id > 1"),'id','value')),array('name'=>'shins_profile_width','value'=>'HtmlHelper::removeZero($data->shins_profile_width)'),array('name'=>'shins_profile_height','value'=>'HtmlHelper::removeZero($data->shins_profile_height)'),array('name'=>'shins_diametr','value'=>'HtmlHelper::removeZero($data->shins_diametr)'),array('name'=>'shins_speed_index_id','value'=>'$data->shinsSpeedIndex->value','filter'=>CHtml::listData(ShinsSpeedIndex::model()->findAll("id > 1"),'id','value')),array('name'=>'shins_load_index'),array('name'=>'shins_run_flat_technology_id','value'=>'$data->shinsRunFlatTechnology->value','filter'=>CHtml::listData(VocabularyAvailability::model()->findAll("id > 1"),'id','value')),array('name'=>'shins_spike_id','value'=>'$data->shinsSpike->value','filter'=>CHtml::listData(VocabularyAvailability::model()->findAll("id > 1"),'id','value')),array('name'=>'description','sortable'=>'false','filter'=>false),array('name'=>'price','value'=>'$data->price ? round($data->price) : ""'),array('name'=>'amount'),array('class'=>'CButtonColumn','template'=>'{update}{delete}','buttons'=>array('update'=>array('url'=>'"/admin/products/shins/edit/".$data->id'),'delete'=>array('url'=>'"/admin/products/shins/delete/".$data->id'))))),$_smarty_tpl);?>

    <div class="form-actions">
        <a class="btn blue" href="/admin/products/shins/edit">Новая шина</a>
    </div>
</div>
<?php }} ?>
