<?php /* Smarty version Smarty-3.1.15, created on 2014-05-21 17:10:45
         compiled from "/var/www/ponzps26/data/www/new.extraload.com.ua/protected/views/site/_blockSearchDisks.tpl" */ ?>
<?php /*%%SmartyHeaderCode:160335290052e7858f2e3630-94289448%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ebe9a296dc8942e15c5c95d23839ea0f6fbfe12c' => 
    array (
      0 => '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/views/site/_blockSearchDisks.tpl',
      1 => 1400681435,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '160335290052e7858f2e3630-94289448',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52e7858f30f6c6_67098847',
  'variables' => 
  array (
    'drivesVocabs' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52e7858f30f6c6_67098847')) {function content_52e7858f30f6c6_67098847($_smarty_tpl) {?><form action="<?php echo Yii::app()->createUrl("drives/index");?>
" method="post">
    <div class="drive-diametr form-select select">
        <h3>Диаметр:</h3>
        <?php echo CHtml::dropDownList('Disks[disks_rim_diametr]','',$_smarty_tpl->tpl_vars['drivesVocabs']->value->disks_rim_diametr,array('empty'=>'-все-'));?>

    </div>
    <div class="drive-type form-select select">
        <h3>Тип:</h3>
        <?php echo CHtml::dropDownList('Disks[disks_type_id]','',$_smarty_tpl->tpl_vars['drivesVocabs']->value->disks_type,array('empty'=>'-все-'));?>

    </div>
    <div class="drive-width form-select select">
        <h3>Ширина диска:</h3>
        <?php echo CHtml::dropDownList('Disks[disks_rim_width]','',$_smarty_tpl->tpl_vars['drivesVocabs']->value->disks_rim_width,array('empty'=>'-все-'));?>

    </div>
    <div class="drive-psd form-select select">
        <h3>PSD:</h3>
        <?php echo CHtml::dropDownList('Disks[disks_port_position]','',$_smarty_tpl->tpl_vars['drivesVocabs']->value->disks_port_position,array('empty'=>'-все-'));?>

    </div>
    <div class="drive-kpo form-select select">
        <h3>КПО:</h3>
        <?php echo CHtml::dropDownList('Disks[disks_fixture_port_count]','',$_smarty_tpl->tpl_vars['drivesVocabs']->value->disks_fixture_port_count,array('empty'=>'-все-'));?>

    </div>
    <div class="drive-et form-select select">
        <h3>ET:</h3>
        <?php echo CHtml::dropDownList('Disks[disks_boom]','',$_smarty_tpl->tpl_vars['drivesVocabs']->value->disks_boom,array('empty'=>'-все-'));?>

    </div>
    <div class="form-actions">
        <input class="form-submit" type="submit" value="Подобрать диски" name="op">
    </div>
</form><?php }} ?>
