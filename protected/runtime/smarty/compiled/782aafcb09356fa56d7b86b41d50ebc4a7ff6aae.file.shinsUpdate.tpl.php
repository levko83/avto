<?php /* Smarty version Smarty-3.1.15, created on 2014-03-20 12:27:11
         compiled from "/var/www/ponzps26/data/www/new.extraload.com.ua/protected/modules/admin/views/products/shinsUpdate.tpl" */ ?>
<?php /*%%SmartyHeaderCode:80266627753288bc71d9782-00024254%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '782aafcb09356fa56d7b86b41d50ebc4a7ff6aae' => 
    array (
      0 => '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/modules/admin/views/products/shinsUpdate.tpl',
      1 => 1395311063,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '80266627753288bc71d9782-00024254',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_53288bc73bdb64_72713004',
  'variables' => 
  array (
    'id' => 0,
    'model' => 0,
    'Shins' => 0,
    'image' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53288bc73bdb64_72713004')) {function content_53288bc73bdb64_72713004($_smarty_tpl) {?><?php if (!is_callable('smarty_block_form')) include '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/vendor/Smarty/plugins/block.form.php';
if (!is_callable('smarty_function_imageResizer')) include '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/vendor/Smarty/plugins/function.imageResizer.php';
if (!is_callable('smarty_function_widget')) include '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/vendor/Smarty/plugins/function.widget.php';
?><?php $_smarty_tpl->smarty->_tag_stack[] = array('form', array('name'=>"Shins",'id'=>'shinsEdit','htmlOptions'=>array("class"=>"form-horizontal",'enctype'=>'multipart/form-data'))); $_block_repeat=true; echo smarty_block_form(array('name'=>"Shins",'id'=>'shinsEdit','htmlOptions'=>array("class"=>"form-horizontal",'enctype'=>'multipart/form-data')), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

    <?php if (is_null($_smarty_tpl->tpl_vars['id']->value)) {?>
        <h3>Создание новой шины</h3>
    <?php } else { ?>
        <h3>Редактирование шины <?php echo $_smarty_tpl->tpl_vars['model']->value->product_name;?>
</h3>
    <?php }?>
    <div class="row-fluid">
        <div class="span4">
            <div class="control-group">
                <label class="control-label">
                    Название:
                </label>
                <div class="controls">
                    <?php echo $_smarty_tpl->tpl_vars['Shins']->value->textField($_smarty_tpl->tpl_vars['model']->value,'product_name');?>

                    <span for="Shins[product_name]" class="help-inline">
                        <?php echo $_smarty_tpl->tpl_vars['Shins']->value->error($_smarty_tpl->tpl_vars['model']->value,'product_name');?>

                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Производитель:
                </label>
                <div class="controls">
                    <?php echo $_smarty_tpl->tpl_vars['Shins']->value->dropDownList($_smarty_tpl->tpl_vars['model']->value,'vendor_id',CHtml::listData(ShinsVendors::model()->findAll(array("order"=>"vendor_name")),"id","vendor_name"),array("empty"=>"--- Выберите значение ---"));?>

                    <span for="Shins[vendor_id]" class="help-inline">
                        <?php echo $_smarty_tpl->tpl_vars['Shins']->value->error($_smarty_tpl->tpl_vars['model']->value,'vendor_id');?>

                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Тип автомобиля:
                </label>
                <div class="controls">
                    <?php echo $_smarty_tpl->tpl_vars['Shins']->value->dropDownList($_smarty_tpl->tpl_vars['model']->value,'shins_type_of_avto_id',CHtml::listData(ShinsTypeOfAvto::model()->findAll(array("order"=>"id")),"id","value"),array("empty"=>"--- Выберите значение ---"));?>

                    <span for="Shins[shins_type_of_avto_id]" class="help-inline">
                        <?php echo $_smarty_tpl->tpl_vars['Shins']->value->error($_smarty_tpl->tpl_vars['model']->value,'shins_type_of_avto_id');?>

                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Сезонность:
                </label>
                <div class="controls">
                    <?php echo $_smarty_tpl->tpl_vars['Shins']->value->dropDownList($_smarty_tpl->tpl_vars['model']->value,'shins_season_id',CHtml::listData(ShinsSeason::model()->findAll(array("order"=>"id")),"id","value"),array("empty"=>"--- Выберите значение ---"));?>

                    <span for="Shins[shins_season_id]" class="help-inline">
                        <?php echo $_smarty_tpl->tpl_vars['Shins']->value->error($_smarty_tpl->tpl_vars['model']->value,'shins_season_id');?>

                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Ширина профиля, мм:
                </label>
                <div class="controls">
                    <?php echo $_smarty_tpl->tpl_vars['Shins']->value->textField($_smarty_tpl->tpl_vars['model']->value,'shins_profile_width');?>

                    <span for="Shins[shins_profile_width]" class="help-inline">
                        <?php echo $_smarty_tpl->tpl_vars['Shins']->value->error($_smarty_tpl->tpl_vars['model']->value,'shins_profile_width');?>

                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Способ герметизации:
                </label>
                <div class="controls">
                    <?php echo $_smarty_tpl->tpl_vars['Shins']->value->dropDownList($_smarty_tpl->tpl_vars['model']->value,'shins_germetic_mode_id',CHtml::listData(ShinsGermeticMode::model()->findAll(array("order"=>"id")),"id","value"),array("empty"=>"--- Выберите значение ---"));?>

                    <span for="Shins[shins_germetic_mode_id]" class="help-inline">
                        <?php echo $_smarty_tpl->tpl_vars['Shins']->value->error($_smarty_tpl->tpl_vars['model']->value,'shins_germetic_mode_id');?>

                    </span>
                </div>
            </div>
        </div>
        <div class="span4">
            <div class="control-group">
                <label class="control-label">
                    Высота профиля, %:
                </label>
                <div class="controls">
                    <?php echo $_smarty_tpl->tpl_vars['Shins']->value->textField($_smarty_tpl->tpl_vars['model']->value,'shins_profile_height');?>

                    <span for="Shins[shins_profile_height]" class="help-inline">
                        <?php echo $_smarty_tpl->tpl_vars['Shins']->value->error($_smarty_tpl->tpl_vars['model']->value,'shins_profile_height');?>

                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Диаметр, ":
                </label>
                <div class="controls">
                    <?php echo $_smarty_tpl->tpl_vars['Shins']->value->textField($_smarty_tpl->tpl_vars['model']->value,'shins_diametr');?>

                    <span for="Shins[shins_diametr]" class="help-inline">
                        <?php echo $_smarty_tpl->tpl_vars['Shins']->value->error($_smarty_tpl->tpl_vars['model']->value,'shins_diametr');?>

                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Индекс скорости:
                </label>
                <div class="controls">
                    <?php echo $_smarty_tpl->tpl_vars['Shins']->value->dropDownList($_smarty_tpl->tpl_vars['model']->value,'shins_speed_index_id',CHtml::listData(ShinsSpeedIndex::model()->findAll(array("order"=>"id")),"id","value"),array("empty"=>"--- Выберите значение ---"));?>

                    <span for="Shins[shins_speed_index_id]" class="help-inline">
                        <?php echo $_smarty_tpl->tpl_vars['Shins']->value->error($_smarty_tpl->tpl_vars['model']->value,'shins_speed_index_id');?>

                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Индекс нагрузки:
                </label>
                <div class="controls">
                    <?php echo $_smarty_tpl->tpl_vars['Shins']->value->textField($_smarty_tpl->tpl_vars['model']->value,'shins_load_index');?>

                    <span for="Shins[shins_load_index]" class="help-inline">
                        <?php echo $_smarty_tpl->tpl_vars['Shins']->value->error($_smarty_tpl->tpl_vars['model']->value,'shins_load_index');?>

                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Технология RunFlat:
                </label>
                <div class="controls">
                    <?php echo $_smarty_tpl->tpl_vars['Shins']->value->dropDownList($_smarty_tpl->tpl_vars['model']->value,'shins_run_flat_technology_id',CHtml::listData(VocabularyAvailability::model()->findAll(array("order"=>"id")),"id","value"),array("empty"=>"--- Выберите значение ---"));?>

                    <span for="Shins[shins_run_flat_technology_id]" class="help-inline">
                        <?php echo $_smarty_tpl->tpl_vars['Shins']->value->error($_smarty_tpl->tpl_vars['model']->value,'shins_run_flat_technology_id');?>

                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Конструкция:
                </label>
                <div class="controls">
                    <?php echo $_smarty_tpl->tpl_vars['Shins']->value->dropDownList($_smarty_tpl->tpl_vars['model']->value,'shins_construction_id',CHtml::listData(ShinsConstruction::model()->findAll(array("order"=>"id")),"id","value"),array("empty"=>"--- Выберите значение ---"));?>

                    <span for="Shins[shins_construction_id]" class="help-inline">
                        <?php echo $_smarty_tpl->tpl_vars['Shins']->value->error($_smarty_tpl->tpl_vars['model']->value,'shins_construction_id');?>

                    </span>
                </div>
            </div>
        </div>
        <div class="span4">
            <div class="control-group">
                <label class="control-label">
                    Шипы:
                </label>
                <div class="controls">
                    <?php echo $_smarty_tpl->tpl_vars['Shins']->value->dropDownList($_smarty_tpl->tpl_vars['model']->value,'shins_spike_id',CHtml::listData(VocabularyAvailability::model()->findAll(array("order"=>"id")),"id","value"),array("empty"=>"--- Выберите значение ---"));?>

                    <span for="Shins[shins_spike_id]" class="help-inline">
                        <?php echo $_smarty_tpl->tpl_vars['Shins']->value->error($_smarty_tpl->tpl_vars['model']->value,'shins_spike_id');?>

                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Доп. информация:
                </label>
                <div class="controls">
                    <?php echo $_smarty_tpl->tpl_vars['Shins']->value->textArea($_smarty_tpl->tpl_vars['model']->value,'description');?>

                    <span for="Shins[description]" class="help-inline">
                        <?php echo $_smarty_tpl->tpl_vars['Shins']->value->error($_smarty_tpl->tpl_vars['model']->value,'description');?>

                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Цена, грн.:
                </label>
                <div class="controls">
                    <?php echo $_smarty_tpl->tpl_vars['Shins']->value->textField($_smarty_tpl->tpl_vars['model']->value,'price');?>

                    <span for="Shins[price]" class="help-inline">
                        <?php echo $_smarty_tpl->tpl_vars['Shins']->value->error($_smarty_tpl->tpl_vars['model']->value,'price');?>

                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Остаток:
                </label>
                <div class="controls">
                    <?php echo $_smarty_tpl->tpl_vars['Shins']->value->textField($_smarty_tpl->tpl_vars['model']->value,'amount');?>

                    <span for="Shins[amount]" class="help-inline">
                        <?php echo $_smarty_tpl->tpl_vars['Shins']->value->error($_smarty_tpl->tpl_vars['model']->value,'amount');?>

                    </span>
                </div>
            </div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <div class="control-group">
                <label class="control-label">
                    Изображения:
                </label>
                <div class="controls">
                    <div style="overflow: hidden; margin-bottom: 10px;">
                        <?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['image']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['model']->value->images; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->_loop = true;
?>
                            <div class="img" img-id="<?php echo $_smarty_tpl->tpl_vars['image']->value->id;?>
" prefix="Shins" style="float: left; border: 1px solid; margin-right: 10px; padding: 5px;">
                                <div class="img_block">
                                    <img src="<?php echo smarty_function_imageResizer(array('product_type'=>"tire",'imageName'=>$_smarty_tpl->tpl_vars['image']->value->imageName,'width'=>100,'height'=>60),$_smarty_tpl);?>
" alt="">
                                    <a href="#">x</a>
                                </div>
                                <?php echo $_smarty_tpl->tpl_vars['image']->value->imageName;?>

                            </div>
                            <input type="hidden" name="Shins[delImage][<?php echo $_smarty_tpl->tpl_vars['image']->value->id;?>
]" id="Shins_delImage_<?php echo $_smarty_tpl->tpl_vars['image']->value->id;?>
" value="0">
                        <?php } ?>
                    </div>
                    <?php echo smarty_function_widget(array('name'=>'CMultiFileUpload','model'=>$_smarty_tpl->tpl_vars['model']->value,'attribute'=>'shinsImages','accept'=>'jpeg|jpg|gif|png','max'=>25,'remove'=>'x','duplicate'=>'Данный файл уже существует','denied'=>'Ошибочный формат файла','options'=>array('afterFileAppend'=>'addFile(e, v, m)'),'htmlOptions'=>array('multiple'=>'multiple')),$_smarty_tpl);?>

                    <span for="Shins[shinsImages]" class="help-inline">
                        <?php echo $_smarty_tpl->tpl_vars['Shins']->value->error($_smarty_tpl->tpl_vars['model']->value,'shinsImages');?>

                    </span>
                </div>
            </div>
        </div>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <div class="form-actions">
                <button class="btn blue" type="submit">Сохранить</button>
            </div>
        </div>
    </div>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_form(array('name'=>"Shins",'id'=>'shinsEdit','htmlOptions'=>array("class"=>"form-horizontal",'enctype'=>'multipart/form-data')), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php }} ?>
