<?php /* Smarty version Smarty-3.1.15, created on 2014-01-09 12:40:23
         compiled from "/var/www/ponzps26/data/www/new.extraload.com.ua/protected/modules/admin/views/orders/_filter.tpl" */ ?>
<?php /*%%SmartyHeaderCode:25859354452ce7c974d77b9-86426518%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '63321fc00bcb19b48aca6be4d7602f9a5c13fe82' => 
    array (
      0 => '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/modules/admin/views/orders/_filter.tpl',
      1 => 1389192911,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25859354452ce7c974d77b9-86426518',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'shins' => 0,
    'disks' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52ce7c9757d545_80773191',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52ce7c9757d545_80773191')) {function content_52ce7c9757d545_80773191($_smarty_tpl) {?><?php if (!is_callable('smarty_function_widget')) include '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/vendor/Smarty/plugins/function.widget.php';
?><div class="portlet box blue tabbable">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-reorder"></i>
            <span class="hidden-480">Товары</span>
        </div>
    </div>
    <div class="portlet-body">
        <div class="tabbable portlet-tabs">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a data-toggle="tab" href="#portlet_shins">Шины</a>
                </li>
                <li>
                    <a data-toggle="tab" href="#portlet_disks">Диски</a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="portlet_shins" class="tab-pane active">
                    <div class="portlet box green">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-filter"></i>
                                Фильтр
                            </div>
                            <div class="tools">
                                <a class="collapse" href="javascript:;"></a>
                            </div>
                        </div>
                        <div class="portlet-body" style="padding: 10px;">
                            <?php echo $_smarty_tpl->getSubTemplate ("application.modules.admin.views.orders._filterShins", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span12" style="padding: 5px;">
                            <?php echo smarty_function_widget(array('name'=>'zii.widgets.grid.CGridView','id'=>"shinsFilterGrid",'dataProvider'=>$_smarty_tpl->tpl_vars['shins']->value->filter(),'beforeAjaxUpdate'=>'function(id, options){
                                                                           options.type = "POST";
                                                                           options.data = $("#shinsFormFilter").serialize();
                                                                        }','columns'=>array(array('name'=>'id','sortable'=>'false'),array('name'=>'product_name','sortable'=>'false'),array('name'=>'provider','header'=>'Поставщик','sortable'=>'false'),array('name'=>'price','value'=>'round($data->price)','sortable'=>'false'),array('name'=>'amount','sortable'=>'false'),array('class'=>'CButtonColumn','template'=>'{add}','header'=>'Действия','buttons'=>array('add'=>array('label'=>'Добавить в заказ','url'=>'\'s\'.$data->id','imageUrl'=>'/images/add.png','options'=>array('class'=>'add_to_order')))))),$_smarty_tpl);?>

                        </div>
                    </div>
                </div>
                <div id="portlet_disks" class="tab-pane">
                    <div class="portlet box green">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-filter"></i>
                                Фильтр
                            </div>
                            <div class="tools">
                                <a class="collapse" href="javascript:;"></a>
                            </div>
                        </div>
                        <div class="portlet-body" style="padding: 10px;">
                            <?php echo $_smarty_tpl->getSubTemplate ("application.modules.admin.views.orders._filterDisks", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span12" style="padding: 5px;">
                            <?php echo smarty_function_widget(array('name'=>'zii.widgets.grid.CGridView','id'=>"disksFilterGrid",'dataProvider'=>$_smarty_tpl->tpl_vars['disks']->value->filter(),'beforeAjaxUpdate'=>'function(id, options){
                                                           options.type = "POST";
                                                           options.data = $("#disksFormFilter").serialize();
                                                        }','columns'=>array(array('name'=>'id','sortable'=>'false'),array('name'=>'product_name','sortable'=>'false'),array('name'=>'price','value'=>'round($data->price)','sortable'=>'false'),array('name'=>'amount','sortable'=>'false'))),$_smarty_tpl);?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php }} ?>
