<?php /* Smarty version Smarty-3.1.15, created on 2014-01-09 12:40:23
         compiled from "/var/www/ponzps26/data/www/new.extraload.com.ua/protected/modules/admin/views/orders/_filterShins.tpl" */ ?>
<?php /*%%SmartyHeaderCode:65652415052ce7c97580326-38017323%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6c8e681917a7145cf3cd902657040593fd644425' => 
    array (
      0 => '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/modules/admin/views/orders/_filterShins.tpl',
      1 => 1389192911,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '65652415052ce7c97580326-38017323',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'shins' => 0,
    'Shins' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52ce7c976e15e7_79668231',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52ce7c976e15e7_79668231')) {function content_52ce7c976e15e7_79668231($_smarty_tpl) {?><?php if (!is_callable('smarty_block_form')) include '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/vendor/Smarty/plugins/block.form.php';
if (!is_callable('smarty_function_CHtml')) include '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/vendor/Smarty/plugins/function.CHtml.php';
?><?php $_smarty_tpl->smarty->_tag_stack[] = array('form', array('name'=>"Shins",'id'=>"shinsFormFilter",'htmlOptions'=>array("class"=>"form-horizontal products_filter"))); $_block_repeat=true; echo smarty_block_form(array('name'=>"Shins",'id'=>"shinsFormFilter",'htmlOptions'=>array("class"=>"form-horizontal products_filter")), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

    <div class="form-wizard">
        <div class="block_odd">
            <div class="row-fluid">
                <div class="span12 filter_label">Цена:</div>
            </div>
            <div class="row-fluid">
                <div class="span6">от:</div>
                <div class="span6">до:</div>
            </div>
            <div class="row-fluid b10">
                <div class="span6"><?php echo $_smarty_tpl->tpl_vars['Shins']->value->textField($_smarty_tpl->tpl_vars['shins']->value,"priceMin",array("size"=>7));?>
</div>
                <div class="span6"><?php echo $_smarty_tpl->tpl_vars['Shins']->value->textField($_smarty_tpl->tpl_vars['shins']->value,"priceMax",array("size"=>7));?>
</div>
            </div>
            <div class="row-fluid b10">
                <div class="span12">
                    <div id="shinsSlider"></div>
                    <script type="text/javascript">
                        nmsp = {};
                        nmsp.shins_min_price = <?php echo $_smarty_tpl->tpl_vars['shins']->value->rangePrice->min;?>
;
                        nmsp.shins_max_price = <?php echo $_smarty_tpl->tpl_vars['shins']->value->rangePrice->max;?>
;
                    </script>
                </div>
            </div>
            <div class="row-fluid b10">
                <div class="span3 filter_label">Ширина шины:</div>
                <div class="span9">
                    <?php echo $_smarty_tpl->tpl_vars['Shins']->value->dropDownList($_smarty_tpl->tpl_vars['shins']->value,"shins_profile_width",Shins::model()->listFieldNumberValues("shins_profile_width",true));?>

                </div>
            </div>
            <div class="row-fluid b10">
                <div class="span3 filter_label">Профиль:</div>
                <div class="span9">
                    <?php echo $_smarty_tpl->tpl_vars['Shins']->value->dropDownList($_smarty_tpl->tpl_vars['shins']->value,"shins_profile_height",Shins::model()->listFieldNumberValues("shins_profile_height",true));?>

                </div>
            </div>
            <div class="row-fluid b10">
                <div class="span3 filter_label">Диаметр:</div>
                <div class="span9">
                    <?php echo $_smarty_tpl->tpl_vars['Shins']->value->dropDownList($_smarty_tpl->tpl_vars['shins']->value,"shins_diametr",Shins::model()->listFieldNumberValues("shins_diametr",true));?>

                </div>
            </div>
            <div class="row-fluid b10">
                <div class="span3 filter_label">Индекс нагрузки:</div>
                <div class="span9">
                    <?php echo $_smarty_tpl->tpl_vars['Shins']->value->dropDownList($_smarty_tpl->tpl_vars['shins']->value,"shins_load_index",Shins::model()->listFieldStringValues("shins_load_index",true));?>

                </div>
            </div>
        </div>
        <div class="block_even">
            <div class="row-fluid">
                <div class="span12 filter_label">Сезонность:</div>
            </div>
            <div class="row-fluid b10">
                <div class="span12">
                    <?php echo $_smarty_tpl->tpl_vars['Shins']->value->checkBoxList($_smarty_tpl->tpl_vars['shins']->value,"shins_season_id",Shins::model()->listVocabValues("shins_season_id"));?>

                </div>
            </div>
        </div>
        <div class="block_odd">
            <div class="row-fluid">
                <div class="span3 filter_label">Тип авто:</div>
                <div class="span9">
                    <?php echo $_smarty_tpl->tpl_vars['Shins']->value->dropDownList($_smarty_tpl->tpl_vars['shins']->value,"shins_type_of_avto_id",Shins::model()->listVocabValues("shins_type_of_avto_id",true));?>

                </div>
            </div>
        </div>
        <div class="block_even">
            <div class="row-fluid">
                <div class="span12 filter_label ch">
                    <?php echo $_smarty_tpl->tpl_vars['Shins']->value->checkBox($_smarty_tpl->tpl_vars['shins']->value,"shins_run_flat_technology_id",array('value'=>2,'uncheckValue'=>''));?>
 Run Flat
                </div>
            </div>
        </div>
        <div class="block_odd">
            <div class="row-fluid">
                <div class="span12 filter_label ch">
                    <?php echo $_smarty_tpl->tpl_vars['Shins']->value->checkBox($_smarty_tpl->tpl_vars['shins']->value,"shins_spike_id",array('value'=>2,'uncheckValue'=>''));?>
 Шипы
                </div>
            </div>
        </div>
        <div class="block_even">
            <div class="row-fluid">
                <div class="span12 filter_label">Бренд:</div>
            </div>
            <div class="row-fluid b10 divScroll">
                <div class="span12">
                    <?php echo $_smarty_tpl->tpl_vars['Shins']->value->checkBoxList($_smarty_tpl->tpl_vars['shins']->value,"vendor_id",Shins::model()->listVocabValues("vendor_id"));?>

                </div>
            </div>
        </div>
        <div class="block_odd">
            <div class="row-fluid">
                <div class="span6">
                    <?php echo smarty_function_CHtml(array('function'=>"link",'text'=>"<i class='icon-repeat'></i> Очистить",'url'=>"#",'htmlOptions'=>array("class"=>"btn blue","id"=>"searchShinsClear")),$_smarty_tpl);?>

                </div>
                <div class="span6">
                    <?php echo smarty_function_CHtml(array('function'=>"link",'text'=>"<i class='icon-search'></i> Поиск",'url'=>"#",'htmlOptions'=>array("class"=>"btn blue","id"=>"searchShins")),$_smarty_tpl);?>

                </div>
            </div>
        </div>
    </div>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_form(array('name'=>"Shins",'id'=>"shinsFormFilter",'htmlOptions'=>array("class"=>"form-horizontal products_filter")), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php }} ?>
