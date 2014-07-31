<?php /* Smarty version Smarty-3.1.15, created on 2014-03-12 18:51:07
         compiled from "/var/www/ponzps26/data/www/new.extraload.com.ua/protected/modules/admin/views/vendors/editDisksVendor.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11969956415320907b916cd3-30916574%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd52432022e7a005036893fd544647433eaaef252' => 
    array (
      0 => '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/modules/admin/views/vendors/editDisksVendor.tpl',
      1 => 1394642822,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11969956415320907b916cd3-30916574',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'model' => 0,
    'DisksVendors' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5320907b9d2058_66327521',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5320907b9d2058_66327521')) {function content_5320907b9d2058_66327521($_smarty_tpl) {?><?php if (!is_callable('smarty_block_form')) include '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/vendor/Smarty/plugins/block.form.php';
if (!is_callable('smarty_function_imageResizer')) include '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/vendor/Smarty/plugins/function.imageResizer.php';
?><div class="row-fluid">
    <div class="span12">
        <?php $_smarty_tpl->smarty->_tag_stack[] = array('form', array('name'=>"DisksVendors",'id'=>'formVendorEdit','htmlOptions'=>array("class"=>"form-horizontal",'enctype'=>'multipart/form-data'))); $_block_repeat=true; echo smarty_block_form(array('name'=>"DisksVendors",'id'=>'formVendorEdit','htmlOptions'=>array("class"=>"form-horizontal",'enctype'=>'multipart/form-data')), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

            <div class="tabbable tabbable-custom">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a data-toggle="tab" href="#tab_1">Основное</a>
                    </li>
                    <li class="">
                        <a data-toggle="tab" href="#tab_2">SEO</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="tab_1" class="tab-pane active">
                        <div class="control-group">
                            <label class="control-label">
                                Производитель:
                            </label>
                            <div class="controls">
                                <?php echo $_smarty_tpl->tpl_vars['model']->value->vendor_name;?>

                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">
                                Логотип:
                            </label>
                            <div class="controls">
                                <?php echo $_smarty_tpl->tpl_vars['DisksVendors']->value->hiddenField($_smarty_tpl->tpl_vars['model']->value,'delImg');?>

                                <div id="imgView" class="<?php if (empty($_smarty_tpl->tpl_vars['model']->value->image)) {?>hide<?php }?>">
                                    <img class="source-image" src="<?php echo smarty_function_imageResizer(array('product_type'=>"disks_vendor",'imageName'=>$_smarty_tpl->tpl_vars['model']->value->image,'width'=>75,'height'=>75),$_smarty_tpl);?>
" alt="">
                                    <a id="delImg" href="#">Удалить</a>
                                </div>
                                <div id="imgInput" class="<?php if (!empty($_smarty_tpl->tpl_vars['model']->value->image)) {?>hide<?php }?>">
                                    <?php echo $_smarty_tpl->tpl_vars['DisksVendors']->value->fileField($_smarty_tpl->tpl_vars['model']->value,'image');?>

                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">
                                Описание:
                            </label>
                            <div class="controls">
                                <?php echo $_smarty_tpl->tpl_vars['DisksVendors']->value->textArea($_smarty_tpl->tpl_vars['model']->value,'description',array("class"=>'tiny'));?>

                            </div>
                        </div>
                    </div>
                    <div id="tab_2" class="tab-pane">
                        <div class="control-group">
                            <label class="control-label">
                                Title:
                            </label>
                            <div class="controls">
                                <?php echo $_smarty_tpl->tpl_vars['DisksVendors']->value->textField($_smarty_tpl->tpl_vars['model']->value,'title');?>

                                <span for="DisksVendors[title]" class="help-inline">
                                    <?php echo $_smarty_tpl->tpl_vars['DisksVendors']->value->error($_smarty_tpl->tpl_vars['model']->value,'title');?>

                                </span>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">
                                Meta (keywords):
                            </label>
                            <div class="controls">
                                <?php echo $_smarty_tpl->tpl_vars['DisksVendors']->value->textArea($_smarty_tpl->tpl_vars['model']->value,'meta_keywords');?>

                                <span for="DisksVendors[meta_keywords]" class="help-inline">
                                    <?php echo $_smarty_tpl->tpl_vars['DisksVendors']->value->error($_smarty_tpl->tpl_vars['model']->value,'meta_keywords');?>

                                </span>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">
                                Meta (description):
                            </label>
                            <div class="controls">
                                <?php echo $_smarty_tpl->tpl_vars['DisksVendors']->value->textArea($_smarty_tpl->tpl_vars['model']->value,'meta_description');?>

                                <span for="DisksVendors[meta_keywords]" class="help-inline">
                                    <?php echo $_smarty_tpl->tpl_vars['DisksVendors']->value->error($_smarty_tpl->tpl_vars['model']->value,'meta_description');?>

                                </span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="form-actions">
                <button class="btn blue" type="submit">Сохранить</button>
            </div>
        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_form(array('name'=>"DisksVendors",'id'=>'formVendorEdit','htmlOptions'=>array("class"=>"form-horizontal",'enctype'=>'multipart/form-data')), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

    </div>
</div><?php }} ?>
