<?php /* Smarty version Smarty-3.1.15, created on 2014-01-17 16:06:03
         compiled from "/var/www/ponzps26/data/www/new.extraload.com.ua/protected/views/tires/_blockSearchByTiresMobile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:204606194452d53d846066b4-35681964%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1affbeaed3b67048a4e02637792115f8b031b387' => 
    array (
      0 => '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/views/tires/_blockSearchByTiresMobile.tpl',
      1 => 1389967510,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '204606194452d53d846066b4-35681964',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52d53d84a44a78_82596243',
  'variables' => 
  array (
    'avto' => 0,
    'variants' => 0,
    'vocabs' => 0,
    'shins' => 0,
    'Shins' => 0,
    'attributes' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52d53d84a44a78_82596243')) {function content_52d53d84a44a78_82596243($_smarty_tpl) {?><?php if (!is_callable('smarty_block_form')) include '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/vendor/Smarty/plugins/block.form.php';
if (!is_callable('smarty_function_CHtml')) include '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/vendor/Smarty/plugins/function.CHtml.php';
?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('form', array('name'=>"Shins",'id'=>'formSearchTires','action'=>Yii::app()->createUrl('/tires/index'))); $_block_repeat=true; echo smarty_block_form(array('name'=>"Shins",'id'=>'formSearchTires','action'=>Yii::app()->createUrl('/tires/index')), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

    <div class="selection-car">
        <h3>Подбор по автомобилю</h3>
        <?php if ($_smarty_tpl->tpl_vars['avto']->value) {?>
            <span style="position: relative; height: 15px;">
                <?php echo $_smarty_tpl->tpl_vars['avto']->value;?>
<a href="/tires.html"><img src="/images/close.png" style="position: absolute; right: -20px;"></a>
                <?php if (isset($_smarty_tpl->tpl_vars['variants']->value)) {?>
                   <?php echo $_smarty_tpl->tpl_vars['variants']->value;?>

                <?php }?>
            </span>
        <?php } else { ?>
            <div class="content clearfix">
                <div class="first manufacturer form-select select">
                    <h3>Производитель:</h3>
                    <?php echo smarty_function_CHtml(array('function'=>"dropDownList",'name'=>"avto_mark",'select'=>'','data'=>CHtml::listData(AvtoMarks::model()->findAll(),'id','value'),'htmlOptions'=>array("empty"=>array(-1=>"-- выберите значение --"),"id"=>"avto_mark","ajax"=>array("type"=>"POST","url"=>Yii::app()->createUrl("avto/changeMark"),"update"=>"#avto_model","dataType"=>"json","data"=>array("avto_mark"=>"js:"."$"."('#avto_mark').val()"),"success"=>"js:function(data)"."{
                                                    "."if(data.response == 1)"."{
                                                        "."$"."('#avto_model').html(data.text);
                                                        "."$"."('#avto_model').removeAttr('disabled');
                                                        "."$"."('#avto_modification').html('');
                                                        "."$"."('#avto_modification').attr('disabled', 'disabled');
                                                    }else"."{
                                                        "."$"."('#avto_model').html('');
                                                        "."$"."('#avto_modification').html('');
                                                        "."$"."('#avto_model').attr('disabled', 'disabled');
                                                        "."$"."('#avto_modification').attr('disabled', 'disabled');
                                                        "."$"."('#search').hide();
                                                    }
                                                }","error"=>"js:function(XHR, textStatus, errorThrown)"."{
                                                    "."$"."('#avto_model').html('');
                                                    "."$"."('#avto_modification').html('');
                                                    "."$"."('#avto_model').attr('disabled', 'disabled');
                                                    "."$"."('#avto_modification').attr('disabled', 'disabled');
                                                    "."$"."('#search').hide();
                                               }"))),$_smarty_tpl);?>

                </div>
                <div class="model form-select select">
                    <h3>Модель:</h3>
                    <?php ob_start();?><?php echo Yii::app()->createUrl("avto/changeModel");?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_function_CHtml(array('function'=>"dropDownList",'name'=>"avto_model",'select'=>'','data'=>array(),'htmlOptions'=>array("id"=>"avto_model","disabled"=>"disabled","ajax"=>array("type"=>"POST","url"=>$_tmp1,"update"=>"#avto_modification","data"=>array("avto_model"=>"js:"."$"."('#avto_model').val()"),"dataType"=>"json","success"=>"js:function(data)"."{
                                                    "."if(data.response == 1)"."{
                                                        "."$"."('#avto_modification').html(data.text);
                                                        "."$"."('#avto_modification').removeAttr('disabled');
                                                    }else"."{
                                                        "."$"."('#avto_modification').html('');
                                                        "."$"."('#avto_modification').attr('disabled', 'disabled');
                                                    }
                                                }","error"=>"js:function(XHR, textStatus, errorThrown)"."{
                                                    "."$"."('#avto_modification').html('');
                                                    "."$"."('#avto_modification').attr('disabled', 'disabled');
                                               }"))),$_smarty_tpl);?>

                </div>
                <div class="last modification form-select select">
                    <h3>Модификация:</h3>
                    <?php echo smarty_function_CHtml(array('function'=>"dropDownList",'name'=>"avto_modification",'select'=>'','data'=>array(),'htmlOptions'=>array("id"=>"avto_modification","disabled"=>"disabled")),$_smarty_tpl);?>

                </div>
            </div>
        <?php }?>
    </div>
    <?php if (isset($_smarty_tpl->tpl_vars['vocabs']->value["price"]->min_price)&&isset($_smarty_tpl->tpl_vars['vocabs']->value["price"]->max_price)&&$_smarty_tpl->tpl_vars['vocabs']->value["price"]->min_price!=$_smarty_tpl->tpl_vars['vocabs']->value["price"]->max_price) {?>
    <div class="price-slider-780 price-slider-filter clearfix">
        <h3>Цена:</h3>
        <div id="webform-component-prise-min" class="form-item webform-component webform-container-inline">
            <label for="amoun2">От:</label>
            <?php echo $_smarty_tpl->tpl_vars['Shins']->value->textField($_smarty_tpl->tpl_vars['shins']->value,"priceMin");?>

        </div>
        <div id="webform-component-prise-max" class="form-item webform-component webform-container-inline">
            <label for="amount3">До:</label>
            <?php echo $_smarty_tpl->tpl_vars['Shins']->value->textField($_smarty_tpl->tpl_vars['shins']->value,"priceMax");?>

        </div>
        <div id="slider-range"></div>
    </div>
    <?php }?>
    <div class="selects">
        <div class="options">
            <div class="bus-width form-select select">
                <h3>Ширина шины:</h3>
                <?php echo $_smarty_tpl->tpl_vars['Shins']->value->dropDownList($_smarty_tpl->tpl_vars['shins']->value,"shins_profile_width",$_smarty_tpl->tpl_vars['vocabs']->value["shins_profile_width"]);?>

            </div>
            <div class="load-index form-select select">
                <h3>Индекс нагрузки:</h3>
                <?php echo $_smarty_tpl->tpl_vars['Shins']->value->dropDownList($_smarty_tpl->tpl_vars['shins']->value,"shins_load_index",$_smarty_tpl->tpl_vars['vocabs']->value["shins_load_index"]);?>

            </div>
            <div class="profile form-select select">
                <h3>Профиль:</h3>
                <?php echo $_smarty_tpl->tpl_vars['Shins']->value->dropDownList($_smarty_tpl->tpl_vars['shins']->value,"shins_profile_height",$_smarty_tpl->tpl_vars['vocabs']->value["shins_profile_height"]);?>

            </div>
            <div class="diameter form-select select">
                <h3>Диаметр:</h3>
                <?php echo $_smarty_tpl->tpl_vars['Shins']->value->dropDownList($_smarty_tpl->tpl_vars['shins']->value,"shins_diametr",$_smarty_tpl->tpl_vars['vocabs']->value["shins_diametr"]);?>

            </div>
        </div>
        <div class="options">
            <div class="type-car form-select select">
                <h3>Тип авто:</h3>
                <?php echo $_smarty_tpl->tpl_vars['Shins']->value->dropDownList($_smarty_tpl->tpl_vars['shins']->value,"shins_type_of_avto_id",$_smarty_tpl->tpl_vars['vocabs']->value["shins_type_of_avto"]);?>

            </div>
        </div>
    </div>
    <div class="checkboxs clearfix">
        <div class="brand">
            <h3>Бренд:</h3>
            <div class="checkbox-pagination up"></div>
            <div class="checkbox brand" id="brand">
                <?php echo $_smarty_tpl->tpl_vars['Shins']->value->checkBoxList($_smarty_tpl->tpl_vars['shins']->value,"vendor_id",$_smarty_tpl->tpl_vars['vocabs']->value["vendor_name"],array('template'=>'<label class="" style="position: relative;">{input} {labelTitle}</label>'));?>

            </div>
            <div class="checkbox-pagination down"></div>
        </div>
        <div class="seasonality">
            <h3>Сезонность:</h3>
            <div class="checkbox">
                <?php echo $_smarty_tpl->tpl_vars['Shins']->value->checkBoxList($_smarty_tpl->tpl_vars['shins']->value,"shins_season_id",$_smarty_tpl->tpl_vars['vocabs']->value["shins_season"],array('template'=>'<label class="" style="position: relative;">{input} {labelTitle}</label>'));?>

            </div>
            <?php if (isset($_smarty_tpl->tpl_vars['vocabs']->value["shins_run_flat_technology_id"][2])) {?>
            <div class="checkbox run-flat">
                <div class="checkbox">
                    <label style="position: relative;">
                        <?php echo $_smarty_tpl->tpl_vars['Shins']->value->checkBox($_smarty_tpl->tpl_vars['shins']->value,"shins_run_flat_technology_id",array('value'=>2,'uncheckValue'=>''));?>

                        RunFlat
                    </label>
                </div>
            </div>
            <?php }?>
        </div>
        <?php if (isset($_smarty_tpl->tpl_vars['vocabs']->value["shins_spike_id"][2])) {?>
        <div class="spike">
            <div class="checkbox">
                <label style="position: relative;">
                    <?php echo $_smarty_tpl->tpl_vars['Shins']->value->checkBox($_smarty_tpl->tpl_vars['shins']->value,"shins_spike_id",array('value'=>2,'uncheckValue'=>''));?>

                    <?php echo $_smarty_tpl->tpl_vars['attributes']->value["shins_spike_id"];?>

                </label>
            </div>
        </div>
        <?php }?>
    </div>
    <div id="edit-actions" class="form-actions form-wrapper">
        <input id="edit-submit" class="form-submit" type="submit" value="Подобрать">
    </div>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_form(array('name'=>"Shins",'id'=>'formSearchTires','action'=>Yii::app()->createUrl('/tires/index')), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php }} ?>
