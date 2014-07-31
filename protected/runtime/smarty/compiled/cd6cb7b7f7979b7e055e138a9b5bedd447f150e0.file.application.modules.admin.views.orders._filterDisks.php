<?php /* Smarty version Smarty-3.1.15, created on 2014-02-28 12:57:33
         compiled from "/var/www/ponzps26/data/www/new.extraload.com.ua/protected/modules/admin/views/orders/_filterDisks.tpl" */ ?>
<?php /*%%SmartyHeaderCode:38001479753106b9d2f2222-93074283%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cd6cb7b7f7979b7e055e138a9b5bedd447f150e0' => 
    array (
      0 => '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/modules/admin/views/orders/_filterDisks.tpl',
      1 => 1389192911,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '38001479753106b9d2f2222-93074283',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'disks' => 0,
    'Disks' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_53106b9d384b72_45978669',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53106b9d384b72_45978669')) {function content_53106b9d384b72_45978669($_smarty_tpl) {?><?php if (!is_callable('smarty_block_form')) include '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/vendor/Smarty/plugins/block.form.php';
if (!is_callable('smarty_function_CHtml')) include '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/vendor/Smarty/plugins/function.CHtml.php';
?><?php $_smarty_tpl->smarty->_tag_stack[] = array('form', array('name'=>"Disks",'id'=>"disksFormFilter",'htmlOptions'=>array("class"=>"form-horizontal products_filter"))); $_block_repeat=true; echo smarty_block_form(array('name'=>"Disks",'id'=>"disksFormFilter",'htmlOptions'=>array("class"=>"form-horizontal products_filter")), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

    <div class="form-wizard">
        <div class="block_odd">
            <div class="row-fluid b10">
                <div class="span3 filter_label">Диаметр:</div>
                <div class="span9">
                    <?php echo $_smarty_tpl->tpl_vars['Disks']->value->dropDownList($_smarty_tpl->tpl_vars['disks']->value,"disks_rim_diametr",Disks::model()->listFieldNumberValues("disks_rim_diametr",true));?>

                </div>
            </div>
            <div class="row-fluid b10">
                <div class="span3 filter_label">Тип:</div>
                <div class="span9">
                    <?php echo $_smarty_tpl->tpl_vars['Disks']->value->dropDownList($_smarty_tpl->tpl_vars['disks']->value,"disks_type_id",Disks::model()->listVocabValues("disks_type_id",true));?>

                </div>
            </div>
            <div class="row-fluid b10">
                <div class="span3 filter_label">Ширина диска:</div>
                <div class="span9">
                    <?php echo $_smarty_tpl->tpl_vars['Disks']->value->dropDownList($_smarty_tpl->tpl_vars['disks']->value,"disks_rim_width",Disks::model()->listFieldNumberValues("disks_rim_width",true));?>

                </div>
            </div>
            <div class="row-fluid b10">
                <div class="span3 filter_label">PCD:</div>
                <div class="span9">
                    <?php echo $_smarty_tpl->tpl_vars['Disks']->value->dropDownList($_smarty_tpl->tpl_vars['disks']->value,"disks_port_position",Disks::model()->listFieldNumberValues("disks_port_position",true));?>

                </div>
            </div>
            <div class="row-fluid b10">
                <div class="span3 filter_label">ET:</div>
                <div class="span9">
                    <?php echo $_smarty_tpl->tpl_vars['Disks']->value->dropDownList($_smarty_tpl->tpl_vars['disks']->value,"disks_boom",Disks::model()->listFieldNumberValues("disks_boom",true));?>

                </div>
            </div>
            <div class="row-fluid b10">
                <div class="span3 filter_label">HUB:</div>
                <div class="span9">
                    <?php echo $_smarty_tpl->tpl_vars['Disks']->value->dropDownList($_smarty_tpl->tpl_vars['disks']->value,"disks_fixture_port_diametr",Disks::model()->listFieldNumberValues("disks_fixture_port_diametr",true));?>

                </div>
            </div>
        </div>
        <div class="block_even">
            <div class="row-fluid">
                <div class="span12 filter_label">Цвет:</div>
            </div>
            <div class="row-fluid b10 divScroll">
                <div class="span12">
                    <?php echo $_smarty_tpl->tpl_vars['Disks']->value->checkBoxList($_smarty_tpl->tpl_vars['disks']->value,"disks_color",Disks::model()->listFieldStringValues("disks_color"));?>

                </div>
            </div>
        </div>
        <div class="block_odd">
            <div class="row-fluid">
                <div class="span12 filter_label">Бренд:</div>
            </div>
            <div class="row-fluid b10 divScroll">
                <div class="span12">
                    <?php echo $_smarty_tpl->tpl_vars['Disks']->value->checkBoxList($_smarty_tpl->tpl_vars['disks']->value,"vendor_id",Disks::model()->listVocabValues("vendor_id"));?>

                </div>
            </div>
        </div>
        <div class="block_even">
            <div class="row-fluid">
                <div class="span6">
                    <?php echo smarty_function_CHtml(array('function'=>"link",'text'=>"<i class='icon-repeat'></i> Очистить",'url'=>"#",'htmlOptions'=>array("class"=>"btn blue","id"=>"searchDisksClear")),$_smarty_tpl);?>

                </div>
                <div class="span6">
                    <?php echo smarty_function_CHtml(array('function'=>"link",'text'=>"<i class='icon-search'></i> Поиск",'url'=>"#",'htmlOptions'=>array("class"=>"btn blue","id"=>"searchDisks")),$_smarty_tpl);?>

                </div>
            </div>
        </div>
    </div>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_form(array('name'=>"Disks",'id'=>"disksFormFilter",'htmlOptions'=>array("class"=>"form-horizontal products_filter")), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php }} ?>
