<?php /* Smarty version Smarty-3.1.15, created on 2014-04-07 13:16:40
         compiled from "/var/www/ponzps26/data/www/new.extraload.com.ua/protected/modules/admin/views/products/disksUpdate.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5261516165329bbfa164cc9-42885777%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1b70688642bda07ef75926258d2018504bc86f66' => 
    array (
      0 => '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/modules/admin/views/products/disksUpdate.tpl',
      1 => 1395311063,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5261516165329bbfa164cc9-42885777',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5329bbfa2f6047_34724602',
  'variables' => 
  array (
    'id' => 0,
    'model' => 0,
    'Disks' => 0,
    'image' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5329bbfa2f6047_34724602')) {function content_5329bbfa2f6047_34724602($_smarty_tpl) {?><?php if (!is_callable('smarty_block_form')) include '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/vendor/Smarty/plugins/block.form.php';
if (!is_callable('smarty_function_imageResizer')) include '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/vendor/Smarty/plugins/function.imageResizer.php';
if (!is_callable('smarty_function_widget')) include '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/vendor/Smarty/plugins/function.widget.php';
?><?php $_smarty_tpl->smarty->_tag_stack[] = array('form', array('name'=>"Disks",'id'=>'disksEdit','htmlOptions'=>array("class"=>"form-horizontal",'enctype'=>'multipart/form-data'))); $_block_repeat=true; echo smarty_block_form(array('name'=>"Disks",'id'=>'disksEdit','htmlOptions'=>array("class"=>"form-horizontal",'enctype'=>'multipart/form-data')), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

    <?php if (is_null($_smarty_tpl->tpl_vars['id']->value)) {?>
        <h3>Создание нового диска</h3>
    <?php } else { ?>
        <h3>Редактирование диска <?php echo $_smarty_tpl->tpl_vars['model']->value->product_name;?>
</h3>
    <?php }?>
    <div class="row-fluid">
        <div class="span4">
            <div class="control-group">
                <label class="control-label">
                    Название:
                </label>
                <div class="controls">
                    <?php echo $_smarty_tpl->tpl_vars['Disks']->value->textField($_smarty_tpl->tpl_vars['model']->value,'product_name');?>

                    <span for="Disks[product_name]" class="help-inline">
                        <?php echo $_smarty_tpl->tpl_vars['Disks']->value->error($_smarty_tpl->tpl_vars['model']->value,'product_name');?>

                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Производитель:
                </label>
                <div class="controls">
                    <?php echo $_smarty_tpl->tpl_vars['Disks']->value->dropDownList($_smarty_tpl->tpl_vars['model']->value,'vendor_id',CHtml::listData(DisksVendors::model()->findAll(array("order"=>"vendor_name")),"id","vendor_name"),array("empty"=>"--- Выберите значение ---"));?>

                    <span for="Disks[vendor_id]" class="help-inline">
                        <?php echo $_smarty_tpl->tpl_vars['Disks']->value->error($_smarty_tpl->tpl_vars['model']->value,'vendor_id');?>

                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Количество крепежных отверстий:
                </label>
                <div class="controls">
                    <?php echo $_smarty_tpl->tpl_vars['Disks']->value->textField($_smarty_tpl->tpl_vars['model']->value,'disks_fixture_port_count');?>

                    <span for="Disks[disks_fixture_port_count]" class="help-inline">
                        <?php echo $_smarty_tpl->tpl_vars['Disks']->value->error($_smarty_tpl->tpl_vars['model']->value,'disks_fixture_port_count');?>

                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Диаметр центрального отверстия, мм:
                </label>
                <div class="controls">
                    <?php echo $_smarty_tpl->tpl_vars['Disks']->value->textField($_smarty_tpl->tpl_vars['model']->value,'disks_fixture_port_diametr');?>

                    <span for="Disks[disks_fixture_port_diametr]" class="help-inline">
                        <?php echo $_smarty_tpl->tpl_vars['Disks']->value->error($_smarty_tpl->tpl_vars['model']->value,'disks_fixture_port_diametr');?>

                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Вылет (ET),мм:
                </label>
                <div class="controls">
                    <?php echo $_smarty_tpl->tpl_vars['Disks']->value->textField($_smarty_tpl->tpl_vars['model']->value,'disks_boom');?>

                    <span for="Disks[disks_boom]" class="help-inline">
                        <?php echo $_smarty_tpl->tpl_vars['Disks']->value->error($_smarty_tpl->tpl_vars['model']->value,'disks_boom');?>

                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Диаметр расположения отверстий (PCD), мм:
                </label>
                <div class="controls">
                    <?php echo $_smarty_tpl->tpl_vars['Disks']->value->textField($_smarty_tpl->tpl_vars['model']->value,'disks_port_position');?>

                    <span for="Disks[disks_port_position]" class="help-inline">
                        <?php echo $_smarty_tpl->tpl_vars['Disks']->value->error($_smarty_tpl->tpl_vars['model']->value,'disks_port_position');?>

                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Вес, кг:
                </label>
                <div class="controls">
                    <?php echo $_smarty_tpl->tpl_vars['Disks']->value->textField($_smarty_tpl->tpl_vars['model']->value,'disks_weight');?>

                    <span for="Disks[disks_weight]" class="help-inline">
                        <?php echo $_smarty_tpl->tpl_vars['Disks']->value->error($_smarty_tpl->tpl_vars['model']->value,'disks_weight');?>

                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Ширина обода, ":
                </label>
                <div class="controls">
                    <?php echo $_smarty_tpl->tpl_vars['Disks']->value->textField($_smarty_tpl->tpl_vars['model']->value,'disks_rim_width');?>

                    <span for="Disks[disks_rim_width]" class="help-inline">
                        <?php echo $_smarty_tpl->tpl_vars['Disks']->value->error($_smarty_tpl->tpl_vars['model']->value,'disks_rim_width');?>

                    </span>
                </div>
            </div>
        </div>
        <div class="span4">
            <div class="control-group">
                <label class="control-label">
                    Диаметр обода, ":
                </label>
                <div class="controls">
                    <?php echo $_smarty_tpl->tpl_vars['Disks']->value->textField($_smarty_tpl->tpl_vars['model']->value,'disks_rim_diametr');?>

                    <span for="Disks[disks_rim_diametr]" class="help-inline">
                        <?php echo $_smarty_tpl->tpl_vars['Disks']->value->error($_smarty_tpl->tpl_vars['model']->value,'disks_rim_diametr');?>

                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Тип:
                </label>
                <div class="controls">
                    <?php echo $_smarty_tpl->tpl_vars['Disks']->value->dropDownList($_smarty_tpl->tpl_vars['model']->value,'disks_type_id',CHtml::listData(DisksType::model()->findAll(array("order"=>"id")),"id","value"),array("empty"=>"--- Выберите значение ---"));?>

                    <span for="Disks[disks_type_id]" class="help-inline">
                        <?php echo $_smarty_tpl->tpl_vars['Disks']->value->error($_smarty_tpl->tpl_vars['model']->value,'disks_type_id');?>

                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Материал:
                </label>
                <div class="controls">
                    <?php echo $_smarty_tpl->tpl_vars['Disks']->value->dropDownList($_smarty_tpl->tpl_vars['model']->value,'disks_material_id',CHtml::listData(DisksMaterial::model()->findAll(array("order"=>"id")),"id","value"),array("empty"=>"--- Выберите значение ---"));?>

                    <span for="Disks[disks_material_id]" class="help-inline">
                        <?php echo $_smarty_tpl->tpl_vars['Disks']->value->error($_smarty_tpl->tpl_vars['model']->value,'disks_material_id');?>

                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Цвет:
                </label>
                <div class="controls">
                    <?php echo $_smarty_tpl->tpl_vars['Disks']->value->textField($_smarty_tpl->tpl_vars['model']->value,'disks_color');?>

                    <span for="Disks[disks_color]" class="help-inline">
                        <?php echo $_smarty_tpl->tpl_vars['Disks']->value->error($_smarty_tpl->tpl_vars['model']->value,'disks_color');?>

                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Доп. информация:
                </label>
                <div class="controls">
                    <?php echo $_smarty_tpl->tpl_vars['Disks']->value->textArea($_smarty_tpl->tpl_vars['model']->value,'description');?>

                    <span for="Disks[description]" class="help-inline">
                        <?php echo $_smarty_tpl->tpl_vars['Disks']->value->error($_smarty_tpl->tpl_vars['model']->value,'description');?>

                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Цена, грн.:
                </label>
                <div class="controls">
                    <?php echo $_smarty_tpl->tpl_vars['Disks']->value->textField($_smarty_tpl->tpl_vars['model']->value,'price');?>

                    <span for="Disks[price]" class="help-inline">
                        <?php echo $_smarty_tpl->tpl_vars['Disks']->value->error($_smarty_tpl->tpl_vars['model']->value,'price');?>

                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Остаток:
                </label>
                <div class="controls">
                    <?php echo $_smarty_tpl->tpl_vars['Disks']->value->textField($_smarty_tpl->tpl_vars['model']->value,'amount');?>

                    <span for="Disks[amount]" class="help-inline">
                        <?php echo $_smarty_tpl->tpl_vars['Disks']->value->error($_smarty_tpl->tpl_vars['model']->value,'amount');?>

                    </span>
                </div>
            </div>
        </div>
        <div class="span4"></div>
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
" prefix="Disks" style="float: left; border: 1px solid; margin-right: 10px; padding: 5px;">
                                <div class="img_block">
                                    <img src="<?php echo smarty_function_imageResizer(array('product_type'=>"drive",'imageName'=>$_smarty_tpl->tpl_vars['image']->value->imageName,'width'=>100,'height'=>60),$_smarty_tpl);?>
" alt="">
                                    <a href="#">x</a>
                                </div>
                                <?php echo $_smarty_tpl->tpl_vars['image']->value->imageName;?>

                            </div>
                            <input type="hidden" name="Disks[delImage][<?php echo $_smarty_tpl->tpl_vars['image']->value->id;?>
]" id="Disks_delImage_<?php echo $_smarty_tpl->tpl_vars['image']->value->id;?>
" value="0">
                        <?php } ?>
                    </div>
                    <?php echo smarty_function_widget(array('name'=>'CMultiFileUpload','model'=>$_smarty_tpl->tpl_vars['model']->value,'attribute'=>'disksImages','accept'=>'jpeg|jpg|gif|png','max'=>25,'remove'=>'x','duplicate'=>'Данный файл уже существует','denied'=>'Ошибочный формат файла','options'=>array('afterFileAppend'=>'addFile(e, v, m)'),'htmlOptions'=>array('multiple'=>'multiple')),$_smarty_tpl);?>

                    <span for="Disks[disksImages]" class="help-inline">
                        <?php echo $_smarty_tpl->tpl_vars['Disks']->value->error($_smarty_tpl->tpl_vars['model']->value,'disksImages');?>

                    </span>
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
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_form(array('name'=>"Disks",'id'=>'disksEdit','htmlOptions'=>array("class"=>"form-horizontal",'enctype'=>'multipart/form-data')), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php }} ?>
