<?php /* Smarty version Smarty-3.1.15, created on 2014-05-21 17:10:45
         compiled from "/var/www/ponzps26/data/www/new.extraload.com.ua/protected/views/site/_blockSearchShins.tpl" */ ?>
<?php /*%%SmartyHeaderCode:203598086852cd96ef913059-74804930%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4fe3dbce34c56f9a28aeb378351877d357046608' => 
    array (
      0 => '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/views/site/_blockSearchShins.tpl',
      1 => 1400681435,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '203598086852cd96ef913059-74804930',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52cd96ef96dfd3_92457582',
  'variables' => 
  array (
    'tiresVocabs' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52cd96ef96dfd3_92457582')) {function content_52cd96ef96dfd3_92457582($_smarty_tpl) {?><form action="<?php echo Yii::app()->createUrl("tires/index");?>
" method="post">
    <div class="tire-width form-select select">
        <h3>Ширина шины:</h3>
        <?php echo CHtml::dropDownList('Shins[shins_profile_width]','',$_smarty_tpl->tpl_vars['tiresVocabs']->value->shins_profile_width,array('empty'=>'-все-'));?>

    </div>
    <div class="tire-profil form-select select">
        <h3>Профиль:</h3>
        <?php echo CHtml::dropDownList('Shins[shins_profile_height]','',$_smarty_tpl->tpl_vars['tiresVocabs']->value->shins_profile_height,array('empty'=>'-все-'));?>

    </div>
    <div class="tire-diameter form-select select">
        <h3>Диаметр:</h3>
        <?php echo CHtml::dropDownList('Shins[shins_diametr]','',$_smarty_tpl->tpl_vars['tiresVocabs']->value->shins_diametr,array('empty'=>'-все-'));?>

    </div>
    <div class="tire-season form-select select">
        <h3>Сезонность:</h3>
        <?php echo CHtml::dropDownList('Shins[shins_season_id]','',$_smarty_tpl->tpl_vars['tiresVocabs']->value->shins_season_id,array('empty'=>'-все-'));?>

    </div>
    <div class="form-actions">
        <input class="form-submit" type="submit" value="Подобрать шины">
    </div>
</form><?php }} ?>
