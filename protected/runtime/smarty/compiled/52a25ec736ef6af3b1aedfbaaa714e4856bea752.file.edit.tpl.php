<?php /* Smarty version Smarty-3.1.15, created on 2014-02-28 12:57:32
         compiled from "/var/www/ponzps26/data/www/new.extraload.com.ua/protected/modules/admin/views/orders/edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:120920998052ce7c97133437-37143821%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '52a25ec736ef6af3b1aedfbaaa714e4856bea752' => 
    array (
      0 => '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/modules/admin/views/orders/edit.tpl',
      1 => 1393584497,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '120920998052ce7c97133437-37143821',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52ce7c974d1671_13585805',
  'variables' => 
  array (
    'order' => 0,
    'Orders' => 0,
    'detailsProvider' => 0,
    'total' => 0,
    'comments' => 0,
    'comment_class' => 0,
    'comment' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52ce7c974d1671_13585805')) {function content_52ce7c974d1671_13585805($_smarty_tpl) {?><?php if (!is_callable('smarty_block_form')) include '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/vendor/Smarty/plugins/block.form.php';
if (!is_callable('smarty_function_widget')) include '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/vendor/Smarty/plugins/function.widget.php';
?><div class="row-fluid">
    <div class="span5">
        <?php echo $_smarty_tpl->getSubTemplate ("application.modules.admin.views.orders._filter", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </div>
    <div class="span7">
        <?php if (!$_smarty_tpl->tpl_vars['order']->value->id) {?>
            <h2>Новый заказ</h2>
            <input type="hidden" id="order_id" value="-1">
        <?php } else { ?>
            <h2>Заказ № <?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
 (<?php echo OrderStatuses::model()->findByPk($_smarty_tpl->tpl_vars['order']->value->currStatus)->status;?>
)</h2>
            <input type="hidden" id="order_id" value="<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
">
        <?php }?>
        <?php $_smarty_tpl->smarty->_tag_stack[] = array('form', array('name'=>"Orders",'id'=>"orderForm",'htmlOptions'=>array("class"=>"form-horizontal"))); $_block_repeat=true; echo smarty_block_form(array('name'=>"Orders",'id'=>"orderForm",'htmlOptions'=>array("class"=>"form-horizontal")), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

        <div class="form-wizard">
            <div class="control-group">
                <label class="control-label">
                    ФИО <span class="required">*</span>
                </label>
                <div class="controls">
                    <?php echo $_smarty_tpl->tpl_vars['Orders']->value->textField($_smarty_tpl->tpl_vars['order']->value,'fio');?>

                    <span for="Orders[fio]" class="help-inline">
                        <?php echo $_smarty_tpl->tpl_vars['Orders']->value->error($_smarty_tpl->tpl_vars['order']->value,'fio');?>

                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Телефон <span class="required">*</span>
                </label>
                <div class="controls">
                    <?php if ($_smarty_tpl->tpl_vars['order']->value->id) {?>
                        <?php echo $_smarty_tpl->tpl_vars['order']->value->phone;?>

                    <?php } else { ?>
                        <?php echo $_smarty_tpl->tpl_vars['Orders']->value->textField($_smarty_tpl->tpl_vars['order']->value,'phone');?>

                        <span for="Orders[phone]" class="help-inline">
                            <?php echo $_smarty_tpl->tpl_vars['Orders']->value->error($_smarty_tpl->tpl_vars['order']->value,'phone');?>

                        </span>
                    <?php }?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Область
                </label>
                <div class="controls">
                    <?php echo $_smarty_tpl->tpl_vars['Orders']->value->textField($_smarty_tpl->tpl_vars['order']->value,'region');?>

                    <span for="Orders[region]" class="help-inline">
                        <?php echo $_smarty_tpl->tpl_vars['Orders']->value->error($_smarty_tpl->tpl_vars['order']->value,'region');?>

                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Город <span class="required">*</span>
                </label>
                <div class="controls">
                    <?php echo $_smarty_tpl->tpl_vars['Orders']->value->textField($_smarty_tpl->tpl_vars['order']->value,'city');?>

                    <span for="Orders[city]" class="help-inline">
                        <?php echo $_smarty_tpl->tpl_vars['Orders']->value->error($_smarty_tpl->tpl_vars['order']->value,'city');?>

                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Район
                </label>
                <div class="controls">
                    <?php echo $_smarty_tpl->tpl_vars['Orders']->value->textField($_smarty_tpl->tpl_vars['order']->value,'district');?>

                    <span for="Orders[district]" class="help-inline">
                        <?php echo $_smarty_tpl->tpl_vars['Orders']->value->error($_smarty_tpl->tpl_vars['order']->value,'district');?>

                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Улица <span class="required">*</span>
                </label>
                <div class="controls">
                    <?php echo $_smarty_tpl->tpl_vars['Orders']->value->textField($_smarty_tpl->tpl_vars['order']->value,'street');?>

                    <span for="Orders[street]" class="help-inline">
                        <?php echo $_smarty_tpl->tpl_vars['Orders']->value->error($_smarty_tpl->tpl_vars['order']->value,'street');?>

                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Дом/кв. <span class="required">*</span>
                </label>
                <div class="controls">
                    <?php echo $_smarty_tpl->tpl_vars['Orders']->value->textField($_smarty_tpl->tpl_vars['order']->value,'house_flat');?>

                    <span for="Orders[house_flat]" class="help-inline">
                        <?php echo $_smarty_tpl->tpl_vars['Orders']->value->error($_smarty_tpl->tpl_vars['order']->value,'house_flat');?>

                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Способ доставки <span class="required">*</span>
                </label>
                <div class="controls">
                    <?php echo $_smarty_tpl->tpl_vars['Orders']->value->dropDownList($_smarty_tpl->tpl_vars['order']->value,"delivary_id",CHtml::listData(OrderDeliverys::model()->findAll(),'id','delivery'),array("empty"=>"Выберите способ доставки"));?>

                    <span for="Orders[delivary_id]" class="help-inline">
                        <?php echo $_smarty_tpl->tpl_vars['Orders']->value->error($_smarty_tpl->tpl_vars['order']->value,'delivary_id');?>

                    </span>
                </div>
            </div>
            <span class="help-inline">
                <?php echo $_smarty_tpl->tpl_vars['Orders']->value->error($_smarty_tpl->tpl_vars['order']->value,'detailsCount');?>

            </span>
            <?php echo smarty_function_widget(array('name'=>'zii.widgets.grid.CGridView','id'=>"orderDetailsGrid",'dataProvider'=>$_smarty_tpl->tpl_vars['detailsProvider']->value,'columns'=>array(array('name'=>'product_type','value'=>'$data["product_type"] == "disk" ? "диск" : "шина"','header'=>'Тип'),array('name'=>'product_id','value'=>'$data["product_type"] == "disk" ? Disks::model()->findByPk($data["product_id"])->product_name : Shins::model()->findByPk($data["product_id"])->product_name','header'=>'Название'),array('name'=>'provider','header'=>'Поставщик'),array('name'=>'storeAmount','header'=>'Склад'),array('name'=>'price','value'=>'round($data["price"])','header'=>'Цена, грн'),array('name'=>'amount','type'=>'raw','value'=>'"<input class=\"changeAmount\" product=\"{$data[\'product_type\']{0}}{$data[\'product_id\']}\" value=\"{$data[\'amount\']}\" />"','header'=>'Кол-во, шт.'),array('class'=>'CButtonColumn','template'=>'{del}','header'=>'Действия','buttons'=>array('del'=>array('label'=>'Удалить из заказа','url'=>'"{$data[\'product_type\']{0}}{$data[\'product_id\']}"','imageUrl'=>'/images/del.png','options'=>array('class'=>'del_from_order'))))),'enableSorting'=>false),$_smarty_tpl);?>

            <div class="row-fluid" style="padding-bottom: 20px;">
                <div class="span6">
                    <a class="btn blue" id="clearProducts" href="#"><i class="icon-repeat"></i> Очистить список товаров</a>
                </div>
                <div class="span6" style="font-size: 1.5em; text-align: right;">
                    Итого: <span id="total"><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</span> грн.
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Статус <span class="required">*</span>
                </label>
                <div class="controls">
                    <?php echo $_smarty_tpl->tpl_vars['Orders']->value->dropDownList($_smarty_tpl->tpl_vars['order']->value,"status_id",OrderStatuses::model()->listData($_smarty_tpl->tpl_vars['order']->value->statusIds),array("empty"=>"Выберите статус заказа"));?>

                    <span for="Orders[status_id]" class="help-inline">
                        <?php echo $_smarty_tpl->tpl_vars['Orders']->value->error($_smarty_tpl->tpl_vars['order']->value,'status_id');?>

                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Номер декларации <span class="required">*</span>
                </label>
                <div class="controls">
                    <?php echo $_smarty_tpl->tpl_vars['Orders']->value->textField($_smarty_tpl->tpl_vars['order']->value,'declaration');?>

                    <span for="Orders[declaration]" class="help-inline">
                        <?php echo $_smarty_tpl->tpl_vars['Orders']->value->error($_smarty_tpl->tpl_vars['order']->value,'declaration');?>

                    </span>
                </div>
            </div>
            <?php if ($_smarty_tpl->tpl_vars['comments']->value) {?>
            <div class="row-fluid">
                <div class="span12">
                    <div style="font-size: 1.3em; padding: 10px;"><i class="icon-comments"></i> Комментарии</div>
                    <ul class="chats">
                        <?php  $_smarty_tpl->tpl_vars['comment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['comment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['comments']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['comments']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['comment']->key => $_smarty_tpl->tpl_vars['comment']->value) {
$_smarty_tpl->tpl_vars['comment']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['comments']['iteration']++;
?>
                            <?php if ((1 & $_smarty_tpl->getVariable('smarty')->value['foreach']['comments']['iteration'])) {?>
                                <?php $_smarty_tpl->tpl_vars["comment_class"] = new Smarty_variable("in", null, 0);?>
                            <?php } else { ?>
                                <?php $_smarty_tpl->tpl_vars["comment_class"] = new Smarty_variable("out", null, 0);?>
                            <?php }?>
                            <li class="<?php echo $_smarty_tpl->tpl_vars['comment_class']->value;?>
">
                                <img class="avatar" src="/bootstrap/img/avatar1_small.jpg" alt="">
                                <div class="message">
                                    <span class="arrow"></span>
                                    <span class="name"><?php echo $_smarty_tpl->tpl_vars['comment']->value->user->fio;?>
 (<?php echo $_smarty_tpl->tpl_vars['comment']->value->user->roles->role_description;?>
)</span>
                                    <span class="datetime"> в <?php echo date("d.m.Y H:i",$_smarty_tpl->tpl_vars['comment']->value->addtime);?>
</span>
                                    <span class="body" style="padding: 10px;"><?php echo $_smarty_tpl->tpl_vars['comment']->value->comment;?>
</span>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                <div>
            </div>
            <?php }?>
            <div class="control-group">
                <label class="control-label">
                    Ваш комментарий к заказу
                </label>
                <div class="controls">
                    <?php echo $_smarty_tpl->tpl_vars['Orders']->value->textArea($_smarty_tpl->tpl_vars['order']->value,'comment');?>

                    <span for="Orders[comment]" class="help-inline">
                        <?php echo $_smarty_tpl->tpl_vars['Orders']->value->error($_smarty_tpl->tpl_vars['order']->value,'comment');?>

                    </span>
                </div>
            </div>
            <div class="form-actions">
                <button class="btn blue" type="submit">Сохранить</button>
            </div>
        </div>
        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_form(array('name'=>"Orders",'id'=>"orderForm",'htmlOptions'=>array("class"=>"form-horizontal")), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

    </div>
</div><?php }} ?>
