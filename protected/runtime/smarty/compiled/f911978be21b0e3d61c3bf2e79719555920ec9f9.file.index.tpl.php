<?php /* Smarty version Smarty-3.1.15, created on 2014-04-02 10:11:27
         compiled from "/var/www/ponzps26/data/www/new.extraload.com.ua/protected/modules/admin/views/pages/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:141834875052fca7e88ae538-40183816%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f911978be21b0e3d61c3bf2e79719555920ec9f9' => 
    array (
      0 => '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/modules/admin/views/pages/index.tpl',
      1 => 1396345398,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '141834875052fca7e88ae538-40183816',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52fca7e891eee5_74178715',
  'variables' => 
  array (
    'model' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52fca7e891eee5_74178715')) {function content_52fca7e891eee5_74178715($_smarty_tpl) {?><?php if (!is_callable('smarty_function_widget')) include '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/vendor/Smarty/plugins/function.widget.php';
?><div class="default">
    <?php echo smarty_function_widget(array('name'=>'zii.widgets.grid.CGridView','id'=>"pagesGrid",'dataProvider'=>$_smarty_tpl->tpl_vars['model']->value,'columns'=>array(array('name'=>'label','type'=>'raw','value'=>'$data["printLine"]($data["level"])." <b>".CHtml::encode($data["label"])."</b>"','filter'=>false,'sortable'=>false),array('name'=>'text','type'=>'raw','value'=>'$data["hasText"] == 0 ? "<b style=\"color: red;\">Это статическая страница</b>" : (!empty($data["text"]) ? substr($data["text"], 0, 50)."..." : "")','sortable'=>false,'filter'=>false),array('name'=>'title','type'=>'raw','value'=>'CHtml::encode($data["title"])','sortable'=>false,'filter'=>false),array('name'=>'meta_keywords','type'=>'raw','value'=>'!empty($data["meta_keywords"]) ? substr($data["meta_keywords"], 0, 50)."..." : ""','sortable'=>false,'filter'=>false),array('name'=>'meta_description','type'=>'raw','value'=>'!empty($data["meta_description"]) ? substr($data["meta_description"], 0, 50)."..." : ""','sortable'=>false,'filter'=>false),array('class'=>'CButtonColumn','template'=>'{update}','updateButtonUrl'=>'Yii::app()->createUrl("/admin/pages/edit", array("id" => $data["id"]))'))),$_smarty_tpl);?>

</div>

<?php }} ?>
