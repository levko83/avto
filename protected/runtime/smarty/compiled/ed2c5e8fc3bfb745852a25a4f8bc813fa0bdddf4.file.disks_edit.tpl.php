<?php /* Smarty version Smarty-3.1.15, created on 2014-03-06 18:57:07
         compiled from "/var/www/ponzps26/data/www/new.extraload.com.ua/protected/modules/admin/views/displays/disks_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4272887245301692b54e163-16590248%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ed2c5e8fc3bfb745852a25a4f8bc813fa0bdddf4' => 
    array (
      0 => '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/modules/admin/views/displays/disks_edit.tpl',
      1 => 1392997146,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4272887245301692b54e163-16590248',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5301692b614d52_14739802',
  'variables' => 
  array (
    'model' => 0,
    'images' => 0,
    'image' => 0,
    'labels' => 0,
    'DisksDisplays' => 0,
    'minPrice' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5301692b614d52_14739802')) {function content_5301692b614d52_14739802($_smarty_tpl) {?><?php if (!is_callable('smarty_block_form')) include '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/vendor/Smarty/plugins/block.form.php';
?><h4>Диски <?php echo $_smarty_tpl->tpl_vars['model']->value->display_name;?>
</h4>
<div class="row-fluid">
<div class="span3">
    <?php if (count($_smarty_tpl->tpl_vars['images']->value)>0) {?>
    <div id="myCarousel" class="carousel slide">
        <div class="carousel-inner">
        <?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['image']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['images']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['image']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->_loop = true;
 $_smarty_tpl->tpl_vars['image']->index++;
 $_smarty_tpl->tpl_vars['image']->first = $_smarty_tpl->tpl_vars['image']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['images']['first'] = $_smarty_tpl->tpl_vars['image']->first;
?>
            <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['images']['first']) {?>
            <div class="item active">
            <?php } else { ?>
            <div class="item">
            <?php }?>
                <img alt="" src="<?php echo Yii::app()->baseUrl;?>
/images/products/disks/<?php echo $_smarty_tpl->tpl_vars['image']->value['imageName'];?>
">
            </div>
        <?php } ?>
        </div>
        <?php if (count($_smarty_tpl->tpl_vars['images']->value)>1) {?>
        <a class="carousel-control left" data-slide="prev" href="#myCarousel">
            <i class="m-icon-big-swapleft m-icon-white"></i>
        </a>
        <a class="carousel-control right" data-slide="next" href="#myCarousel">
            <i class="m-icon-big-swapright m-icon-white"></i>
        </a>
        <?php }?>
    </div>
    <?php }?>
</div>
<div class="span9"></div>
</div>
<div class="row-fluid">
<div class="span12">
<?php $_smarty_tpl->smarty->_tag_stack[] = array('form', array('name'=>"DisksDisplays",'id'=>'formDisksDisplays','htmlOptions'=>array("class"=>"form-horizontal"))); $_block_repeat=true; echo smarty_block_form(array('name'=>"DisksDisplays",'id'=>'formDisksDisplays','htmlOptions'=>array("class"=>"form-horizontal")), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

    <div class="form-wizard">
        <div class="control-group">
            <label class="control-label">
                <?php echo $_smarty_tpl->tpl_vars['labels']->value["title"];?>

            </label>
            <div class="controls">
                <?php echo $_smarty_tpl->tpl_vars['DisksDisplays']->value->textField($_smarty_tpl->tpl_vars['model']->value,'title');?>

                <span for="DisksDisplays[title]" class="help-inline">
                    <?php echo $_smarty_tpl->tpl_vars['DisksDisplays']->value->error($_smarty_tpl->tpl_vars['model']->value,'title');?>

                </span>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">
                Минимальная цена, грн
            </label>
            <div class="controls">
                <?php $_smarty_tpl->tpl_vars['minPrice'] = new Smarty_variable(DisksDisplays::model()->returnMinPrice($_smarty_tpl->tpl_vars['model']->value->id), null, 0);?>
                <?php if ($_smarty_tpl->tpl_vars['minPrice']->value>0) {?>
                    <?php echo $_smarty_tpl->tpl_vars['minPrice']->value;?>

                <?php } else { ?>
                    нет в наличии
                <?php }?>
            </div>
        </div>
        <?php if ($_smarty_tpl->tpl_vars['minPrice']->value>0) {?>
        <div class="control-group">
            <label class="control-label">
                <?php echo $_smarty_tpl->tpl_vars['labels']->value["actionPrice"];?>

            </label>
            <div class="controls">
                <?php echo $_smarty_tpl->tpl_vars['DisksDisplays']->value->textField($_smarty_tpl->tpl_vars['model']->value,'actionPrice');?>

                <span for="DisksDisplays[actionPrice]" class="help-inline">
                    <?php echo $_smarty_tpl->tpl_vars['DisksDisplays']->value->error($_smarty_tpl->tpl_vars['model']->value,'actionPrice');?>

                </span>
            </div>
        </div>
        <?php }?>
        <div class="control-group">
            <label class="control-label">
                <?php echo $_smarty_tpl->tpl_vars['labels']->value["display_description"];?>

                <span class="required">*</span>
            </label>
            <div class="controls">
                <?php echo $_smarty_tpl->tpl_vars['DisksDisplays']->value->textArea($_smarty_tpl->tpl_vars['model']->value,'display_description',array("class"=>'tiny'));?>

                <span for="DisksDisplays[display_description]" class="help-inline">
                    <?php echo $_smarty_tpl->tpl_vars['DisksDisplays']->value->error($_smarty_tpl->tpl_vars['model']->value,'display_description');?>

                </span>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">
                <?php echo $_smarty_tpl->tpl_vars['labels']->value["meta_keywords"];?>

                <span class="required">*</span>
            </label>
            <div class="controls">
                <?php echo $_smarty_tpl->tpl_vars['DisksDisplays']->value->textArea($_smarty_tpl->tpl_vars['model']->value,'meta_keywords');?>

                <span for="DisksDisplays[meta_keywords]" class="help-inline">
                    <?php echo $_smarty_tpl->tpl_vars['DisksDisplays']->value->error($_smarty_tpl->tpl_vars['model']->value,'meta_keywords');?>

                </span>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">
                <?php echo $_smarty_tpl->tpl_vars['labels']->value["meta_description"];?>

                <span class="required">*</span>
            </label>
            <div class="controls">
                <?php echo $_smarty_tpl->tpl_vars['DisksDisplays']->value->textArea($_smarty_tpl->tpl_vars['model']->value,'meta_description');?>

                <span for="DisksDisplays[meta_description]" class="help-inline">
                    <?php echo $_smarty_tpl->tpl_vars['DisksDisplays']->value->error($_smarty_tpl->tpl_vars['model']->value,'meta_description');?>

                </span>
            </div>
        </div>
        <div class="form-actions">
            <button class="btn blue" type="submit">Сохранить дисплей</button>
        </div>
    </div>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_form(array('name'=>"DisksDisplays",'id'=>'formDisksDisplays','htmlOptions'=>array("class"=>"form-horizontal")), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

</div>
</div><?php }} ?>
