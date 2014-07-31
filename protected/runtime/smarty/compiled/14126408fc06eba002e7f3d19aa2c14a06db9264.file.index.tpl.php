<?php /* Smarty version Smarty-3.1.15, created on 2014-01-09 12:43:23
         compiled from "/var/www/ponzps26/data/www/new.extraload.com.ua/protected/modules/admin/views/orders/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14550032652ce7d4bc2ab43-02982020%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '14126408fc06eba002e7f3d19aa2c14a06db9264' => 
    array (
      0 => '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/modules/admin/views/orders/index.tpl',
      1 => 1389192911,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14550032652ce7d4bc2ab43-02982020',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'model' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52ce7d4bcdf111_93255854',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52ce7d4bcdf111_93255854')) {function content_52ce7d4bcdf111_93255854($_smarty_tpl) {?><?php if (!is_callable('smarty_function_widget')) include '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/vendor/Smarty/plugins/function.widget.php';
?><div class="row-fluid">
    <div class="span12">
        <?php ob_start();?><?php echo smarty_function_widget(array('name'=>"zii.widgets.jui.CJuiDatePicker",'model'=>$_smarty_tpl->tpl_vars['model']->value,'attribute'=>'addtime','options'=>array('dateFormat'=>'dd/mm/yy'),'language'=>'ru'),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_function_widget(array('name'=>'zii.widgets.grid.CGridView','id'=>"ordersGrid",'dataProvider'=>$_smarty_tpl->tpl_vars['model']->value->search(),'filter'=>$_smarty_tpl->tpl_vars['model']->value,'afterAjaxUpdate'=>'function(){
                               $.datepicker.setDefaults($.datepicker.regional["ru"]);
                               $.datepicker.setDefaults({dateFormat: "dd/mm/yy"});
                               $("#Orders_addtime").datepicker();
                           }','columns'=>array("id",array('name'=>"status_id",'value'=>'OrderStatuses::model()->findByPk($data->status_id)->status','header'=>"Статус",'filter'=>CHtml::listData(OrderStatuses::model()->findAll("id > 1"),'id','status')),array('name'=>"fio",'header'=>"ФИО"),array('name'=>"phone",'header'=>"Телефон"),array('name'=>"region",'header'=>"Область"),array('name'=>"city",'header'=>"Город"),array('name'=>"district",'header'=>"Район"),array('name'=>"street",'header'=>"Улица"),array('name'=>"house_flat",'header'=>"Дом/кв"),array('name'=>"delivary_id",'header'=>"Способ доставки",'value'=>'OrderDeliverys::model()->findByPk($data->delivary_id)->delivery','filter'=>CHtml::listData(OrderDeliverys::model()->findAll(),'id','delivery')),array('name'=>"declaration",'header'=>"Декларация"),array('name'=>"sum",'value'=>'round($data->sum)','header'=>"Сумма, грн"),array('name'=>"amount",'value'=>'$data->amount','header'=>"Кол-во"),array('name'=>"addtime",'value'=>'date("d/m/Y H:i", $data->orderHistorys[0]->addtime)','header'=>"Дата",'filter'=>$_tmp1),array('class'=>'CButtonColumn','template'=>'{update}','updateButtonUrl'=>'Yii::app()->createUrl("/admin/orders/edit", array("id" => $data->id))'))),$_smarty_tpl);?>

    </div>
    <a class="btn blue" href="<?php echo Yii::app()->createUrl('/admin/orders/add');?>
">Добавить заказ</a>
</div><?php }} ?>
