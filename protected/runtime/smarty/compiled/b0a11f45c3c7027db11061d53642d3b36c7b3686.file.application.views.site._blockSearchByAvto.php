<?php /* Smarty version Smarty-3.1.15, created on 2014-01-28 12:25:18
         compiled from "/var/www/ponzps26/data/www/new.extraload.com.ua/protected/views/site/_blockSearchByAvto.tpl" */ ?>
<?php /*%%SmartyHeaderCode:83360691952cd92852a5930-78201464%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b0a11f45c3c7027db11061d53642d3b36c7b3686' => 
    array (
      0 => '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/views/site/_blockSearchByAvto.tpl',
      1 => 1390904703,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '83360691952cd92852a5930-78201464',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52cd9285331300_27788751',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52cd9285331300_27788751')) {function content_52cd9285331300_27788751($_smarty_tpl) {?><?php if (!is_callable('smarty_function_CHtml')) include '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/vendor/Smarty/plugins/function.CHtml.php';
?><div id="tabs">
    <h2> Подбор по автомобилю </h2>
    <ul class="tabs_menu">
        <li>Шины</li>
        <li>Диски</li>
    </ul>
    <div class="tabs_content clearfix">
        <div>
            <div class="manufacturer form-select select">
                <h3>Производитель:</h3>
                <?php echo smarty_function_CHtml(array('function'=>"dropDownList",'name'=>"avto_mark",'select'=>'','data'=>CHtml::listData(AvtoMarks::model()->findAll(),'id','value'),'htmlOptions'=>array("empty"=>array(-1=>"-- выберите значение --"),"id"=>"shins_avto_mark","ajax"=>array("type"=>"POST","url"=>Yii::app()->createUrl("avto/changeMark"),"update"=>"#shins_avto_model","dataType"=>"json","data"=>array("avto_mark"=>"js:"."$"."('#shins_avto_mark').val()"),"success"=>"js:function(data)"."{
                                    "."if(data.response == 1)"."{
                                        "."$"."('#shins_avto_model').html(data.text);
                                        "."$"."('#shins_avto_model').removeAttr('disabled');
                                        "."$"."('#shins_avto_modification').html('<option value=\'-1\'>-- выберите значение --</option>');
                                        "."$"."('#shins_avto_modification').attr('disabled', 'disabled');
                                    }else"."{
                                        "."$"."('#shins_avto_model').html('<option value=\'-1\'>-- выберите значение --</option>');
                                        "."$"."('#shins_avto_modification').html('<option value=\'-1\'>-- выберите значение --</option>');
                                        "."$"."('#shins_avto_model').attr('disabled', 'disabled');
                                        "."$"."('#shins_avto_modification').attr('disabled', 'disabled');
                                    }
                                }","error"=>"js:function(XHR, textStatus, errorThrown)"."{
                                    "."$"."('#shins_avto_model').html('<option value=\'-1\'>-- выберите значение --</option>');
                                    "."$"."('#shins_avto_modification').html('<option value=\'-1\'>-- выберите значение --</option>');
                                    "."$"."('#shins_avto_model').attr('disabled', 'disabled');
                                    "."$"."('#shins_avto_modification').attr('disabled', 'disabled');
                                }"))),$_smarty_tpl);?>

            </div>
            <div class="model form-select select">
                <h3>Модель:</h3>
                <?php ob_start();?><?php echo Yii::app()->createUrl("avto/changeModel");?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_function_CHtml(array('function'=>"dropDownList",'name'=>"avto_model",'select'=>'','data'=>array(-1=>"-- выберите значение --"),'htmlOptions'=>array("id"=>"shins_avto_model","disabled"=>"disabled","ajax"=>array("type"=>"POST","url"=>$_tmp1,"update"=>"#shins_avto_modification","data"=>array("avto_model"=>"js:"."$"."('#shins_avto_model').val()"),"dataType"=>"json","success"=>"js:function(data)"."{
                                    "."if(data.response == 1)"."{
                                        "."$"."('#shins_avto_modification').html(data.text);
                                        "."$"."('#shins_avto_modification').removeAttr('disabled');
                                    }else"."{
                                        "."$"."('#shins_avto_modification').html('<option value=\'-1\'>-- выберите значение --</option>');
                                        "."$"."('#shins_avto_modification').attr('disabled', 'disabled');
                                    }
                                }","error"=>"js:function(XHR, textStatus, errorThrown)"."{
                                    "."$"."('#shins_avto_modification').html('<option value=\'-1\'>-- выберите значение --</option>');
                                    "."$"."('#shins_avto_modification').attr('disabled', 'disabled');
                                }"))),$_smarty_tpl);?>

            </div>
            <div class="modification form-select select">
                <h3>Модификация:</h3>
                <?php echo smarty_function_CHtml(array('function'=>"dropDownList",'name'=>"avto_modification",'select'=>'','data'=>array(-1=>"-- выберите значение --"),'htmlOptions'=>array("id"=>"shins_avto_modification","disabled"=>"disabled")),$_smarty_tpl);?>

            </div>
            <div class="form-actions shins_search_by_avto">
                <input class="form-submit" type="submit" value="Подобрать">
            </div>
        </div>
        <div>
            <div class="manufacturer form-select select">
                <h3>Производитель:</h3>
                <?php echo smarty_function_CHtml(array('function'=>"dropDownList",'name'=>"avto_mark",'select'=>'','data'=>CHtml::listData(AvtoMarks::model()->findAll(),'id','value'),'htmlOptions'=>array("empty"=>array(-1=>"-- выберите значение --"),"id"=>"disks_avto_mark","ajax"=>array("type"=>"POST","url"=>Yii::app()->createUrl("avto/changeMark"),"update"=>"#disks_avto_model","dataType"=>"json","data"=>array("avto_mark"=>"js:"."$"."('#disks_avto_mark').val()"),"success"=>"js:function(data)"."{
                                "."if(data.response == 1)"."{
                                    "."$"."('#disks_avto_model').html(data.text);
                                    "."$"."('#disks_avto_model').removeAttr('disabled');
                                    "."$"."('#disks_avto_modification').html('<option value=\'-1\'>-- выберите значение --</option>');
                                    "."$"."('#disks_avto_modification').attr('disabled', 'disabled');
                                }else"."{
                                    "."$"."('#disks_avto_model').html('<option value=\'-1\'>-- выберите значение --</option>');
                                    "."$"."('#disks_avto_modification').html('<option value=\'-1\'>-- выберите значение --</option>');
                                    "."$"."('#disks_avto_model').attr('disabled', 'disabled');
                                    "."$"."('#disks_avto_modification').attr('disabled', 'disabled');
                                }
                            }","error"=>"js:function(XHR, textStatus, errorThrown)"."{
                                "."$"."('#disks_avto_model').html('<option value=\'-1\'>-- выберите значение --</option>');
                                "."$"."('#disks_avto_modification').html('<option value=\'-1\'>-- выберите значение --</option>');
                                "."$"."('#disks_avto_model').attr('disabled', 'disabled');
                                "."$"."('#disks_avto_modification').attr('disabled', 'disabled');
                                }"))),$_smarty_tpl);?>

            </div>
            <div class="model form-select select">
                <h3>Модель:</h3>
                <?php ob_start();?><?php echo Yii::app()->createUrl("avto/changeModel");?>
<?php $_tmp2=ob_get_clean();?><?php echo smarty_function_CHtml(array('function'=>"dropDownList",'name'=>"avto_model",'select'=>'','data'=>array(-1=>"-- выберите значение --"),'htmlOptions'=>array("id"=>"disks_avto_model","disabled"=>"disabled","ajax"=>array("type"=>"POST","url"=>$_tmp2,"update"=>"#disks_avto_modification","data"=>array("avto_model"=>"js:"."$"."('#disks_avto_model').val()"),"dataType"=>"json","success"=>"js:function(data)"."{
                                    "."if(data.response == 1)"."{
                                        "."$"."('#disks_avto_modification').html(data.text);
                                        "."$"."('#disks_avto_modification').removeAttr('disabled');
                                    }else"."{
                                        "."$"."('#disks_avto_modification').html('<option value=\'-1\'>-- выберите значение --</option>');
                                        "."$"."('#disks_avto_modification').attr('disabled', 'disabled');
                                    }
                                }","error"=>"js:function(XHR, textStatus, errorThrown)"."{
                                    "."$"."('#disks_avto_modification').html('<option value=\'-1\'>-- выберите значение --</option>');
                                    "."$"."('#disks_avto_modification').attr('disabled', 'disabled');
                                }"))),$_smarty_tpl);?>

            </div>
            <div class="modification form-select select">
                <h3>Модификация:</h3>
                <?php echo smarty_function_CHtml(array('function'=>"dropDownList",'name'=>"avto_modification",'select'=>'','data'=>array(-1=>"-- выберите значение --"),'htmlOptions'=>array("id"=>"disks_avto_modification","disabled"=>"disabled")),$_smarty_tpl);?>

            </div>
            <div class="form-actions disks_search_by_avto">
                <input class="form-submit" type="submit" value="Подобрать">
            </div>
        </div>
    </div>
</div><?php }} ?>
