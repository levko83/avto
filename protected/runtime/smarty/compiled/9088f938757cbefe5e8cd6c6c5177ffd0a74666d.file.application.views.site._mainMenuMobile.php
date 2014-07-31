<?php /* Smarty version Smarty-3.1.15, created on 2014-02-13 15:49:32
         compiled from "/var/www/ponzps26/data/www/new.extraload.com.ua/protected/views/site/_mainMenuMobile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:114509080752d938cbdc6964-03171698%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9088f938757cbefe5e8cd6c6c5177ffd0a74666d' => 
    array (
      0 => '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/views/site/_mainMenuMobile.tpl',
      1 => 1392299351,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '114509080752d938cbdc6964-03171698',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52d938cbf11f13_60079847',
  'variables' => 
  array (
    'this' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52d938cbf11f13_60079847')) {function content_52d938cbf11f13_60079847($_smarty_tpl) {?><?php if (!is_callable('smarty_function_widget')) include '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/vendor/Smarty/plugins/function.widget.php';
?><?php echo smarty_function_widget(array('name'=>"zii.widgets.CMenu",'encodeLabel'=>false,'activateParents'=>false,'activeCssClass'=>"active",'firstItemCssClass'=>"first",'itemCssClass'=>"leaf",'lastItemCssClass'=>"last",'htmlOptions'=>array("class"=>"menu clearfix"),'items'=>array(array("label"=>"Шины","itemOptions"=>array("class"=>"leaf-0"),"url"=>array("tires/index"),"submenuOptions"=>array("class"=>"sub-menu-0"),"items"=>$_smarty_tpl->tpl_vars['this']->value->shinsSubMenu),array("label"=>"Диски","itemOptions"=>array("class"=>"leaf-1"),"url"=>array("drives/index"),"submenuOptions"=>array("class"=>"sub-menu-0"),"items"=>$_smarty_tpl->tpl_vars['this']->value->disksSubMenu),array("label"=>"Меню","itemOptions"=>array("class"=>"leaf-2"),"url"=>array("drives/index"),"submenuOptions"=>array("class"=>"menu-second clearfix"),"items"=>array(array("label"=>"Главная","url"=>array("site/index")),array("label"=>"О Компании","url"=>array("site/about")),array("label"=>"Контакты","url"=>array("site/contacts")),array("label"=>"Оплата и Доставка","url"=>"#"),array("label"=>"Новости","url"=>"#"))))),$_smarty_tpl);?>

<?php }} ?>
