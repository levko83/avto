<?php /* Smarty version Smarty-3.1.15, created on 2014-03-19 17:46:54
         compiled from "/var/www/ponzps26/data/www/new.extraload.com.ua/protected/modules/admin/views/products/disks.tpl" */ ?>
<?php /*%%SmartyHeaderCode:159996487452d51681c1d726-47316536%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f9297ae019704639a4bfdad23057e787373e82f1' => 
    array (
      0 => '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/modules/admin/views/products/disks.tpl',
      1 => 1395243529,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '159996487452d51681c1d726-47316536',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52d51681dae9a4_66905079',
  'variables' => 
  array (
    'model' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52d51681dae9a4_66905079')) {function content_52d51681dae9a4_66905079($_smarty_tpl) {?><?php if (!is_callable('smarty_function_widget')) include '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/vendor/Smarty/plugins/function.widget.php';
?><div class="default">
    <?php echo smarty_function_widget(array('name'=>'zii.widgets.grid.CGridView','id'=>"disksGrid",'dataProvider'=>$_smarty_tpl->tpl_vars['model']->value->getTable(),'selectableRows'=>2,'filter'=>$_smarty_tpl->tpl_vars['model']->value,'columns'=>array(array('class'=>'CCheckBoxColumn','value'=>'$data->id','checkBoxHtmlOptions'=>array('name'=>'idList[]')),array('name'=>'id'),array('name'=>'vendor_id','value'=>'$data->vendor->vendor_name','filter'=>CHtml::listData(DisksVendors::model()->findAll(),'id','vendor_name')),array('name'=>'product_name'),array('name'=>'disks_fixture_port_count','value'=>'HtmlHelper::removeZero($data->disks_fixture_port_count)'),array('name'=>'disks_fixture_port_diametr','value'=>'HtmlHelper::removeZero($data->disks_fixture_port_diametr)'),array('name'=>'disks_boom','value'=>'HtmlHelper::removeZero($data->disks_boom)'),array('name'=>'disks_port_position','value'=>'HtmlHelper::removeZero($data->disks_port_position)'),array('name'=>'disks_weight','value'=>'HtmlHelper::removeZero($data->disks_weight)'),array('name'=>'disks_rim_width','value'=>'HtmlHelper::removeZero($data->disks_rim_width)'),array('name'=>'disks_rim_diametr','value'=>'HtmlHelper::removeZero($data->disks_rim_diametr)'),array('name'=>'disks_type_id','value'=>'$data->disksType->value','filter'=>CHtml::listData(DisksType::model()->findAll(),'id','value')),array('name'=>'disks_material_id','value'=>'$data->disksMaterial->value','filter'=>CHtml::listData(DisksMaterial::model()->findAll(),'id','value')),array('name'=>'disks_color'),array('name'=>'description','sortable'=>'false','filter'=>false),array('name'=>'price'),array('name'=>'amount'),array('class'=>'CButtonColumn','template'=>'{update}{delete}','buttons'=>array('update'=>array('url'=>'"/admin/products/disks/edit/".$data->id'),'delete'=>array('url'=>'"/admin/products/disks/delete/".$data->id'))))),$_smarty_tpl);?>

    <div class="form-actions">
        <a class="btn blue" href="/admin/products/disks/edit">Новый диск</a>
    </div>
</div>
<?php }} ?>
