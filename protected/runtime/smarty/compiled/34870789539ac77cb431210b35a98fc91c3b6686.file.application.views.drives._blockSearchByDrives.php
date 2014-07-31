<?php /* Smarty version Smarty-3.1.15, created on 2014-05-07 09:20:50
         compiled from "/var/www/ponzps26/data/www/new.extraload.com.ua/protected/views/drives/_blockSearchByDrives.tpl" */ ?>
<?php /*%%SmartyHeaderCode:83538059352e665b200d791-79730505%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '34870789539ac77cb431210b35a98fc91c3b6686' => 
    array (
      0 => '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/views/drives/_blockSearchByDrives.tpl',
      1 => 1399368765,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '83538059352e665b200d791-79730505',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52e665b2496be9_21380588',
  'variables' => 
  array (
    'filter_url' => 0,
    'avto' => 0,
    'avto_product_arr' => 0,
    'avto_modif' => 0,
    'avto_product_type' => 0,
    'avto_product_item' => 0,
    'filter' => 0,
    'data' => 0,
    'vocabs' => 0,
    'disks' => 0,
    'Disks' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52e665b2496be9_21380588')) {function content_52e665b2496be9_21380588($_smarty_tpl) {?><?php if (!is_callable('smarty_block_form')) include '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/vendor/Smarty/plugins/block.form.php';
if (!is_callable('smarty_function_CHtml')) include '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/vendor/Smarty/plugins/function.CHtml.php';
?><?php $_smarty_tpl->smarty->_tag_stack[] = array('form', array('name'=>"Disks",'id'=>'formSearchDrives','action'=>((string)$_smarty_tpl->tpl_vars['filter_url']->value))); $_block_repeat=true; echo smarty_block_form(array('name'=>"Disks",'id'=>'formSearchDrives','action'=>((string)$_smarty_tpl->tpl_vars['filter_url']->value)), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

<div class="selection-car">
    <h3>Подбор по автомобилю</h3>
    <?php if ($_smarty_tpl->tpl_vars['avto']->value) {?>
    <span style="position: relative; height: 15px;">
        <strong><?php echo $_smarty_tpl->tpl_vars['avto']->value;?>
</strong><a href="<?php echo Yii::app()->createUrl("drives/index");?>
"><img src="/images/close.png" style="position: absolute; right: -20px;"></a>
        <?php if (isset($_smarty_tpl->tpl_vars['avto_product_arr']->value)&&count($_smarty_tpl->tpl_vars['avto_product_arr']->value)>0) {?>
            <?php $_smarty_tpl->tpl_vars["avto_modif"] = new Smarty_variable(reset($_smarty_tpl->tpl_vars['avto_product_arr']->value), null, 0);?>

            <div style="padding-top: 10px;">PSD: <b><?php echo $_smarty_tpl->tpl_vars['avto_modif']->value[0]["disks_fixture_port_count"];?>
*<?php echo round($_smarty_tpl->tpl_vars['avto_modif']->value[0]["disks_port_position"],1);?>
</b></div>
            <div style="padding-top: 10px;">HUB: <b><?php echo round($_smarty_tpl->tpl_vars['avto_modif']->value[0]["disks_fixture_port_diametr"],1);?>
 мм.</b></div>

            <ul style="padding-top: 10px;">
            <?php  $_smarty_tpl->tpl_vars["avto_product_item"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["avto_product_item"]->_loop = false;
 $_smarty_tpl->tpl_vars["avto_product_type"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['avto_product_arr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["avto_product_item"]->key => $_smarty_tpl->tpl_vars["avto_product_item"]->value) {
$_smarty_tpl->tpl_vars["avto_product_item"]->_loop = true;
 $_smarty_tpl->tpl_vars["avto_product_type"]->value = $_smarty_tpl->tpl_vars["avto_product_item"]->key;
?>
                <?php if ($_smarty_tpl->tpl_vars['avto_product_type']->value==1) {?>
                    <li style="padding-top: 10px;">
                    Завод:
                <?php } elseif ($_smarty_tpl->tpl_vars['avto_product_type']->value==2) {?>
                    <li style="padding-top: 10px;">
                    Замен:
                <?php } elseif ($_smarty_tpl->tpl_vars['avto_product_type']->value==3) {?>
                    <li style="padding-top: 10px;">
                    Тюнинг:
                <?php } else { ?>
                    <?php continue 1?>
                <?php }?>
                <?php  $_smarty_tpl->tpl_vars["data"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["data"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['avto_product_item']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["data"]->key => $_smarty_tpl->tpl_vars["data"]->value) {
$_smarty_tpl->tpl_vars["data"]->_loop = true;
?>
                    <a href="<?php echo Yii::app()->createUrl("drives/index",array("v"=>$_smarty_tpl->tpl_vars['filter']->value["avto_modification"],"v5"=>round($_smarty_tpl->tpl_vars['data']->value["disks_rim_width"],1),"v3"=>round($_smarty_tpl->tpl_vars['data']->value["disks_rim_diametr"],1),"v7"=>round($_smarty_tpl->tpl_vars['data']->value["disks_boom"],1)));?>
">
                        <?php echo round($_smarty_tpl->tpl_vars['data']->value["disks_rim_width"],1);?>
 x <?php echo round($_smarty_tpl->tpl_vars['data']->value["disks_rim_diametr"],1);?>
 ET<?php echo round($_smarty_tpl->tpl_vars['data']->value["disks_boom"],1);?>

                    </a>&nbsp;
                <?php } ?>
                </li>
            <?php } ?>
            </ul>
        <?php } else { ?>
            Для данной модификации автомобиля дисков не найдено
        <?php }?>
        </span>
    <?php } else { ?>
    <div class="content clearfix">
        <div class="manufacturer form-select select">
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
        <div class="modification form-select select">
            <h3>Модификация:</h3>
            <?php echo smarty_function_CHtml(array('function'=>"dropDownList",'name'=>"avto_modification",'select'=>'','data'=>array(),'htmlOptions'=>array("id"=>"avto_modification","disabled"=>"disabled")),$_smarty_tpl);?>

        </div>
    </div>
    <?php }?>
</div>
    
        
            
            
                
                
            
            
            
                
            
            
            
                
            
        
    
    <div class="filter-page clearfix filter-options">
        <div class="options">
            <?php if ($_smarty_tpl->tpl_vars['vocabs']->value->disks_rim_diametr) {?>
                <div class="diametr checkboxs">
                    <h3>Диаметр:</h3>
                    <div class="checkbox">
                        <?php echo $_smarty_tpl->tpl_vars['Disks']->value->checkBoxList($_smarty_tpl->tpl_vars['disks']->value,"disks_rim_diametr",$_smarty_tpl->tpl_vars['vocabs']->value->disks_rim_diametr_as_url,array('template'=>'<label class="" style="position: relative;">{input} {labelTitle}</label>'));?>

                    </div>
                </div>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['vocabs']->value->disks_type_id) {?>
                <div class="rim-type form-select select">
                    <h3>Тип:</h3>
                    <?php echo $_smarty_tpl->tpl_vars['Disks']->value->dropDownList($_smarty_tpl->tpl_vars['disks']->value,"disks_type_id",$_smarty_tpl->tpl_vars['vocabs']->value->disks_type_id,array('empty'=>'-все-'));?>

                </div>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['vocabs']->value->disks_rim_width) {?>
                <div class="rim-width form-select select">
                    <h3>Ширина диска:</h3>
                    <?php echo $_smarty_tpl->tpl_vars['Disks']->value->dropDownList($_smarty_tpl->tpl_vars['disks']->value,"disks_rim_width",$_smarty_tpl->tpl_vars['vocabs']->value->disks_rim_width,array('empty'=>'-все-'));?>

                </div>
            <?php }?>
            <?php if (!$_smarty_tpl->tpl_vars['avto_product_arr']->value) {?>
            <?php if ($_smarty_tpl->tpl_vars['vocabs']->value->disks_port_position) {?>
                <div class="psd form-select select">
                    <h3>PSD:</h3>
                    <?php echo $_smarty_tpl->tpl_vars['Disks']->value->dropDownList($_smarty_tpl->tpl_vars['disks']->value,"disks_port_position",$_smarty_tpl->tpl_vars['vocabs']->value->disks_port_position,array('empty'=>'-все-'));?>

                </div>
            <?php }?>
            <?php }?>
            <?php if (!$_smarty_tpl->tpl_vars['avto_product_arr']->value) {?>
            <?php if ($_smarty_tpl->tpl_vars['vocabs']->value->disks_fixture_port_count) {?>
                <div class="kpo form-select select">
                    <h3>КПО:</h3>
                    <?php echo $_smarty_tpl->tpl_vars['Disks']->value->dropDownList($_smarty_tpl->tpl_vars['disks']->value,"disks_fixture_port_count",$_smarty_tpl->tpl_vars['vocabs']->value->disks_fixture_port_count,array('empty'=>'-все-'));?>

                </div>
            <?php }?>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['vocabs']->value->disks_boom) {?>
                <div class="et form-select select">
                    <h3>ET:</h3>
                    <?php echo $_smarty_tpl->tpl_vars['Disks']->value->dropDownList($_smarty_tpl->tpl_vars['disks']->value,"disks_boom",$_smarty_tpl->tpl_vars['vocabs']->value->disks_boom,array('empty'=>'-все-'));?>

                </div>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['vocabs']->value->disks_fixture_port_diametr) {?>
                <div class="hub form-select select">
                    <h3>HUB:</h3>
                    <?php echo $_smarty_tpl->tpl_vars['Disks']->value->dropDownList($_smarty_tpl->tpl_vars['disks']->value,"disks_fixture_port_diametr",$_smarty_tpl->tpl_vars['vocabs']->value->disks_fixture_port_diametr,array('empty'=>'-все-'));?>

                </div>
            <?php }?>
        </div>
        <?php if ($_smarty_tpl->tpl_vars['vocabs']->value->disks_color_translit) {?>
            <div class="rim-color checkboxs">
                <h3>Цвет:</h3>
                <div class="checkbox">
                    <?php echo $_smarty_tpl->tpl_vars['Disks']->value->checkBoxList($_smarty_tpl->tpl_vars['disks']->value,"disks_color",$_smarty_tpl->tpl_vars['vocabs']->value->disks_color_translit_as_url,array('template'=>'<label class="" style="position: relative;">{input} {labelTitle}</label>'));?>

                </div>
            </div>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['vocabs']->value->vendor_id) {?>
            <div class="brand checkboxs">
                <h3>Бренд:</h3>
                <div class="checkbox">
                    <?php echo $_smarty_tpl->tpl_vars['Disks']->value->checkBoxList($_smarty_tpl->tpl_vars['disks']->value,"vendor_id",$_smarty_tpl->tpl_vars['vocabs']->value->vendor_id_as_url,array('template'=>'<label class="" style="position: relative;">{input} {labelTitle}</label>'));?>

                </div>
            </div>
        <?php }?>
        <div id="edit-actions" class="form-actions form-wrapper">
            <input id="edit-submit" class="form-submit" type="submit" value="Подобрать" name="ok">
        </div>
    </div>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_form(array('name'=>"Disks",'id'=>'formSearchDrives','action'=>((string)$_smarty_tpl->tpl_vars['filter_url']->value)), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php }} ?>
