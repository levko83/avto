<?php /* Smarty version Smarty-3.1.15, created on 2014-04-04 12:18:37
         compiled from "/var/www/ponzps26/data/www/new.extraload.com.ua/protected/views/drives/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:208724953752e665b1dba2c0-27543753%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c751ad972ec05d34e28b0f8b924deccce24de16a' => 
    array (
      0 => '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/views/drives/index.tpl',
      1 => 1396603092,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '208724953752e665b1dba2c0-27543753',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52e665b2009062_30005373',
  'variables' => 
  array (
    'this' => 0,
    'dataProvider' => 0,
    'filter' => 0,
    'avto_product_arr' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52e665b2009062_30005373')) {function content_52e665b2009062_30005373($_smarty_tpl) {?><?php if (!is_callable('smarty_function_widget')) include '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/vendor/Smarty/plugins/function.widget.php';
?><!--_____________________ Левая колонка _________________________-->

<aside id="sidebar-first">
    <div id="filter-tire" class="filter">
        <?php echo $_smarty_tpl->getSubTemplate ("application.views.drives._blockSearchByDrives", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </div>
</aside>

<!--_________________________________________ Основной контента _________________________________________-->
<section id="center">
    <div id="squeeze">
        <?php if ($_smarty_tpl->tpl_vars['this']->value->breadcrumbs) {?>
            <?php echo $_smarty_tpl->getSubTemplate ("application.views.site._breadcrumbs", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <?php }?>
        <a class="filter-button" href="#filter-tire-780">Фильтр</a>
        <div class="catalog-product">
            <div class="catalog-management">
                <div class="sorting clearfix">
                    <div class="catalog-regularize">
                        Упорядочить по:
                        <select id="selSort">
                            <option selected="selected" value="rating">популярности</option>
                            <option value="price">цене</option>
                            <option value="title">названию</option>
                        </select>
                    </div>
                    <div class="catalog-show">
                        Показать:
                        <input type="button" id="btn-4" value="таблицей">
                        <input type="button" id="btn-5" value="списком">
                    </div>
                </div>
            </div>
            <div class="catalog-content">
                <?php echo smarty_function_widget(array('name'=>"zii.widgets.CListView",'dataProvider'=>$_smarty_tpl->tpl_vars['dataProvider']->value,'ajaxUpdate'=>false,'template'=>'<div class="catalog-management">
                                       {pager}
                                    </div>
                                    <div>
                                        {items}
                                    </div>
                                    <div class="catalog-management">
                                       {pager}
                                    </div>','itemView'=>'_viewDriveItem','viewData'=>array("filter"=>$_smarty_tpl->tpl_vars['filter']->value,"avto_product_arr"=>$_smarty_tpl->tpl_vars['avto_product_arr']->value),'cssFile'=>false,'sortableAttributes'=>array('title','price'),'pager'=>array("class"=>'CLinkPager',"header"=>false,"internalPageCssClass"=>false,"selectedPageCssClass"=>'active',"firstPageLabel"=>'<<',"prevPageLabel"=>'<',"nextPageLabel"=>'>',"lastPageLabel"=>'>>',"htmlOptions"=>array('class'=>'catalog-paginator clearfix')),'htmlOptions'=>array("class"=>"catalog-list format clearfix","id"=>'list1')),$_smarty_tpl);?>

                <?php echo smarty_function_widget(array('name'=>"zii.widgets.CListView",'dataProvider'=>$_smarty_tpl->tpl_vars['dataProvider']->value,'ajaxUpdate'=>false,'template'=>'<div class="catalog-management">
                                       {pager}
                                    </div>
                                    {items}','itemView'=>'_viewDriveItem','viewData'=>array("filter"=>$_smarty_tpl->tpl_vars['filter']->value,"avto_product_arr"=>$_smarty_tpl->tpl_vars['avto_product_arr']->value),'cssFile'=>false,'sortableAttributes'=>array('title','price'),'pager'=>array("class"=>'CLinkPager',"maxButtonCount"=>2,"header"=>false,"internalPageCssClass"=>false,"selectedPageCssClass"=>'active',"firstPageLabel"=>'<<',"prevPageLabel"=>'<',"nextPageLabel"=>'>',"lastPageLabel"=>'>>',"htmlOptions"=>array('class'=>'catalog-paginator clearfix')),'htmlOptions'=>array("class"=>"catalog-table format clearfix","id"=>'list2')),$_smarty_tpl);?>

            </div>
        </div>
    </div>
</section>
<!--________________________________ Правая Колонка ________________________________-->
<aside id="sidebar-second">
    <!--___________Блок Оплата и Доставка___________-->
    <div class="payment-delivery clearfix">
        <h2> Оплата и доставка </h2>
        <ul>
            <li class="element-0">Бесплатная доставка по всей Украине!</li>
            <li class="element-1">Без предоплаты и комиссии!</li>
            <li class="element-2">100% гарантия возврата!</li>
            <li class="element-3">Работаем 7 дней в неделю!<span>ПН-CБ: с 9:00 до 21:00<br>ВС: с 10:00 до 18:00</span></li>
        </ul>
    </div>
    <?php echo $_smarty_tpl->getSubTemplate ("application.views.site._blockActions", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</aside>
<!-- Дубль фильтра для планшета -->
<div id="filter-tire-780" class="filter">

</div><?php }} ?>
