<?php /* Smarty version Smarty-3.1.15, created on 2014-01-09 12:40:36
         compiled from "/var/www/ponzps26/data/www/new.extraload.com.ua/protected/modules/admin/views/news/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:182753380452ce7ca41c4835-77709351%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '988ae7b12b6c76d0ce50d9eba17bf6e88e95df81' => 
    array (
      0 => '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/modules/admin/views/news/index.tpl',
      1 => 1389192911,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '182753380452ce7ca41c4835-77709351',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'model' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52ce7ca4253d68_48665979',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52ce7ca4253d68_48665979')) {function content_52ce7ca4253d68_48665979($_smarty_tpl) {?><?php if (!is_callable('smarty_function_widget')) include '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/vendor/Smarty/plugins/function.widget.php';
?><h3 class="block">Новости</h3>
<div class="default">
    <?php ob_start();?><?php echo smarty_function_widget(array('name'=>"zii.widgets.jui.CJuiDatePicker",'model'=>$_smarty_tpl->tpl_vars['model']->value,'attribute'=>'created','options'=>array('dateFormat'=>'dd/mm/yy'),'language'=>'ru'),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_widget(array('name'=>"zii.widgets.jui.CJuiDatePicker",'model'=>$_smarty_tpl->tpl_vars['model']->value,'attribute'=>'edited','options'=>array('dateFormat'=>'dd/mm/yy'),'language'=>'ru'),$_smarty_tpl);?>
<?php $_tmp2=ob_get_clean();?><?php echo smarty_function_widget(array('name'=>'zii.widgets.grid.CGridView','id'=>"newsGrid",'dataProvider'=>$_smarty_tpl->tpl_vars['model']->value->search(),'selectableRows'=>2,'filter'=>$_smarty_tpl->tpl_vars['model']->value,'afterAjaxUpdate'=>'function(){
                              $.datepicker.setDefaults($.datepicker.regional["ru"]);
                              $.datepicker.setDefaults({dateFormat: "dd/mm/yy"});
                              $("#News_created").datepicker();
                              $("#News_edited").datepicker();
                           }','columns'=>array(array('class'=>'CCheckBoxColumn','value'=>'$data->id','checkBoxHtmlOptions'=>array('name'=>'idList[]')),array('name'=>'id'),array('name'=>'title'),array('name'=>'short','type'=>'raw','sortable'=>'false'),array('name'=>'body','type'=>'raw','sortable'=>'false'),array('name'=>'search_keywords','sortable'=>'false'),array('name'=>'search_description','sortable'=>'false'),array('name'=>'created','value'=>'date("d/m/Y H:i", $data->created)','filter'=>$_tmp1),array('name'=>'edited','value'=>'date("d/m/Y H:i", $data->edited)','filter'=>$_tmp2),array('name'=>'published','value'=>'$data->published == 1 ? "Да" : "Нет"','filter'=>array(1=>'Да',0=>'Нет')),array('class'=>'CButtonColumn','template'=>'{update}{delete}','deleteConfirmation'=>'Вы действительно хотите удалить новость?','updateButtonUrl'=>'Yii::app()->createUrl("/admin/news/edit", array("id" => $data->id))','deleteButtonUrl'=>'Yii::app()->createUrl("/admin/news/delete", array("id" => $data->id))','afterDelete'=>'function(link,success,data){
                                  if(success){
                                      window.location = "/admin/news";
                                  }
                              }'))),$_smarty_tpl);?>

</div>
<a class="btn blue" href="<?php echo Yii::app()->createUrl('/admin/news/add');?>
">Добавить новость</a>
<?php }} ?>
