<?php /* Smarty version Smarty-3.1.15, created on 2014-05-06 12:33:18
         compiled from "/var/www/ponzps26/data/www/new.extraload.com.ua/protected/modules/admin/views/service/showLog.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9191398915368ac5ece1a10-44127955%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9bb46d9826c2b1c0007c197493db61961e111486' => 
    array (
      0 => '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/modules/admin/views/service/showLog.tpl',
      1 => 1399368765,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9191398915368ac5ece1a10-44127955',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'err' => 0,
    'result' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5368ac5ed2d190_01966361',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5368ac5ed2d190_01966361')) {function content_5368ac5ed2d190_01966361($_smarty_tpl) {?><?php if (!is_callable('smarty_function_widget')) include '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/vendor/Smarty/plugins/function.widget.php';
?><h2>Просмотр логов</h2>
<div class="row-fluid">
    <div class="span12">
        <?php if (isset($_smarty_tpl->tpl_vars['err']->value)) {?>
            <div class="alert alert-danger">
                <?php echo $_smarty_tpl->tpl_vars['err']->value;?>

            </div>
        <?php } else { ?>
            <div class="tabbable tabbable-custom">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a data-toggle="tab" href="#tab_1_1">Error <span class="badge"><?php echo $_smarty_tpl->tpl_vars['result']->value["error"]->totalItemCount;?>
</span></a>
                    </li>
                    <li class="">
                        <a data-toggle="tab" href="#tab_1_2">Info <span class="badge"><?php echo $_smarty_tpl->tpl_vars['result']->value["info"]->totalItemCount;?>
</span></a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="tab_1_1" class="tab-pane active">
                        <div class="row-fluid">
                            <div class="span12">
                                <?php echo smarty_function_widget(array('name'=>"zii.widgets.CListView",'dataProvider'=>$_smarty_tpl->tpl_vars['result']->value["error"],'itemView'=>"_logTabItem",'ajaxUpdate'=>false,'summaryText'=>'c <b>{start}</b> по <b>{end}</b> из <b>{count}</b>','template'=>'{summary} {items} {pager}','pager'=>array('class'=>'CLinkPager','header'=>false,'htmlOptions'=>array('class'=>'pager'))),$_smarty_tpl);?>

                            </div>
                        </div>
                    </div>
                    <div id="tab_1_2" class="tab-pane">
                        <div class="row-fluid">
                            <div class="span12">
                                <?php echo smarty_function_widget(array('name'=>"zii.widgets.CListView",'dataProvider'=>$_smarty_tpl->tpl_vars['result']->value["info"],'itemView'=>"_logTabItem",'ajaxUpdate'=>false,'summaryText'=>'c <b>{start}</b> по <b>{end}</b> из <b>{count}</b>','template'=>'{summary} {items} {pager}','pager'=>array('class'=>'CLinkPager','header'=>false,'htmlOptions'=>array('class'=>'pager'))),$_smarty_tpl);?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php }?>
    </div>
</div><?php }} ?>
