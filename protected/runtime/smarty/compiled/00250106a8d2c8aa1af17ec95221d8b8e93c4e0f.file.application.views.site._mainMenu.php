<?php /* Smarty version Smarty-3.1.15, created on 2014-05-23 22:59:36
         compiled from "/var/www/ponzps26/data/www/new.extraload.com.ua/protected/views/site/_mainMenu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:205248250852d938a0a70053-71911927%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '00250106a8d2c8aa1af17ec95221d8b8e93c4e0f' => 
    array (
      0 => '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/views/site/_mainMenu.tpl',
      1 => 1400875122,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '205248250852d938a0a70053-71911927',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52d938a0ab2e06_08856544',
  'variables' => 
  array (
    'this' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52d938a0ab2e06_08856544')) {function content_52d938a0ab2e06_08856544($_smarty_tpl) {?><?php if (!is_callable('smarty_function_widget')) include '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/vendor/Smarty/plugins/function.widget.php';
?><?php echo smarty_function_widget(array('name'=>"zii.widgets.CMenu",'encodeLabel'=>false,'activateParents'=>false,'activeCssClass'=>"active",'firstItemCssClass'=>"first",'itemCssClass'=>"leaf",'lastItemCssClass'=>"last",'htmlOptions'=>array("class"=>"menu clearfix"),'items'=>array(array("label"=>"Главная","itemOptions"=>array("class"=>"leaf-0"),"url"=>array("site/index")),array("label"=>"Диски","itemOptions"=>array("class"=>"leaf-1"),"url"=>array("drives/index"),"submenuOptions"=>array("class"=>"sub-menu-0"),"items"=>$_smarty_tpl->tpl_vars['this']->value->disksSubMenu),array("label"=>"Шины","itemOptions"=>array("class"=>"leaf-2"),"url"=>array("tires/index"),"submenuOptions"=>array("class"=>"sub-menu-0"),"items"=>$_smarty_tpl->tpl_vars['this']->value->shinsSubMenu),array("label"=>"О Компании","itemOptions"=>array("class"=>"leaf-3"),"url"=>array("site/about")),array("label"=>"Контакты","itemOptions"=>array("class"=>"leaf-4"),"url"=>array("site/contacts")),array("label"=>"Оплата и Доставка","itemOptions"=>array("class"=>"leaf-5"),"url"=>array("site/delivery")),array("label"=>"Новости","itemOptions"=>array("class"=>"leaf-6"),"url"=>"#"))),$_smarty_tpl);?>

<?php }} ?>
