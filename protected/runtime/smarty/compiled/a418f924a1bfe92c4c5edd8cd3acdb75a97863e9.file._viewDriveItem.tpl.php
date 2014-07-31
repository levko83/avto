<?php /* Smarty version Smarty-3.1.15, created on 2014-02-24 16:17:26
         compiled from "/var/www/ponzps26/data/www/new.extraload.com.ua/protected/views/drives/_viewDriveItem.tpl" */ ?>
<?php /*%%SmartyHeaderCode:44922953452e665b25e0d55-52503405%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a418f924a1bfe92c4c5edd8cd3acdb75a97863e9' => 
    array (
      0 => '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/views/drives/_viewDriveItem.tpl',
      1 => 1392997146,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '44922953452e665b25e0d55-52503405',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52e665b274eeb8_26069711',
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52e665b274eeb8_26069711')) {function content_52e665b274eeb8_26069711($_smarty_tpl) {?><?php if (!is_callable('smarty_function_imageResizer')) include '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/vendor/Smarty/plugins/function.imageResizer.php';
?><div class="views-row clearfix">
    <div class="image-row">
        <a href="/drives/<?php echo $_smarty_tpl->tpl_vars['data']->value["disks_display_id"];?>
-<?php echo $_smarty_tpl->tpl_vars['data']->value["disks_display_translit"];?>
.html" class="show-rewievs"><span>смотреть отзывы</span></a>
        <a href="/drives/<?php echo $_smarty_tpl->tpl_vars['data']->value["disks_display_id"];?>
-<?php echo $_smarty_tpl->tpl_vars['data']->value["disks_display_translit"];?>
.html"><img src="<?php echo smarty_function_imageResizer(array('product_type'=>'drive','imageName'=>$_smarty_tpl->tpl_vars['data']->value['image_name'],'width'=>90,'height'=>90),$_smarty_tpl);?>
" alt=" " title=" " /></a>
        <div class="watch-reviews"><a href="/drives/<?php echo $_smarty_tpl->tpl_vars['data']->value["disks_display_id"];?>
-<?php echo $_smarty_tpl->tpl_vars['data']->value["disks_display_translit"];?>
.html"></a></div>
        <div class="rating">
            <input type="hidden" name="val" value="<?php echo $_smarty_tpl->tpl_vars['data']->value["disks_rating"];?>
"/>
            <input type="hidden" name="vote-id" value="<?php echo $_smarty_tpl->tpl_vars['data']->value["disks_display_id"];?>
"/>
        </div>
    </div>
    <div class="row-title"><a href="/drives/<?php echo $_smarty_tpl->tpl_vars['data']->value["disks_display_id"];?>
-<?php echo $_smarty_tpl->tpl_vars['data']->value["disks_display_translit"];?>
.html"><?php echo $_smarty_tpl->tpl_vars['data']->value["disks_display_name"];?>
</a></div>
    <div class="alloy text-line"><?php echo $_smarty_tpl->tpl_vars['data']->value["disks_type"];?>
</div>
    <div class="code text-line">код товара: <?php echo $_smarty_tpl->tpl_vars['data']->value["disks_display_id"];?>
</div>
    <div class="price text-line">
        <?php if ($_smarty_tpl->tpl_vars['data']->value["min_price"]==4294967295) {?>
        Нет в наличии
        <?php } else { ?>
        от <span><?php echo $_smarty_tpl->tpl_vars['data']->value["min_price"];?>
</span> грн
        <?php }?>
    </div>
    
    
       
    
    
    <div class="read-more"><a href="/drives/<?php echo $_smarty_tpl->tpl_vars['data']->value["disks_display_id"];?>
-<?php echo $_smarty_tpl->tpl_vars['data']->value["disks_display_translit"];?>
.html">Подробнее</a></div>
</div><?php }} ?>
