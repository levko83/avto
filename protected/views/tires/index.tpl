<!--_____________________ Левая колонка _________________________-->
{*{if !BrowserDetector::isMobile()}*}
    <aside id="sidebar-first">
        <div id="filter-tire" class="filter">
            {include file="application.views.tires._blockSearchByTires"}
        </div>
    </aside>
{*{/if}*}
<!--_________________________________________ Основной контента _________________________________________-->
<section id="center">
    <div id="squeeze">
        {if $this->breadcrumbs}
            {include file="application.views.site._breadcrumbs"}
        {/if}
        <div class="title">
            <h1>{$header}</h1>
        </div>
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
                {widget name = "zii.widgets.CListView"
                        dataProvider = $dataProvider
                        ajaxUpdate = false
                        template = '<div class="catalog-management">
                                      {pager}
                                    </div>
                                    {items}
                                    <div class="catalog-management">
                                      {pager}
                                    </div>'
                        itemView = '_viewTireItem'
                        viewData = [
                            "filter" => $filter,
                            "avto_product_arr" => $avto_product_arr
                        ]
                        cssFile = false
                        sortableAttributes = ['title', 'price']
                        pager = [
                            "class" => 'CLinkPager',
                            "header" => false,
                            "internalPageCssClass" => false,
                            "selectedPageCssClass" => 'active',
                            "firstPageLabel" => '<<',
                            "prevPageLabel" => '<',
                            "nextPageLabel" => '>',
                            "lastPageLabel"=> '>>',
                            "htmlOptions" => ['class'=>'catalog-paginator clearfix']
                        ]
                        htmlOptions=["class" => "catalog-list format clearfix", "id" => 'list1']
                }
                {widget name = "zii.widgets.CListView"
                        dataProvider = $dataProvider
                        ajaxUpdate = false
                        template = '<div class="catalog-management">
                                      {pager}
                                    </div>
                                    {items}'
                        itemView = '_viewTireItem'
                        cssFile = false
                        sortableAttributes = ['title', 'price']
                        pager = [
                            "class" => 'CLinkPager',
                            "maxButtonCount" => 2,
                            "header" => false,
                            "internalPageCssClass" => false,
                            "selectedPageCssClass" => 'active',
                            "firstPageLabel" => '<<',
                            "prevPageLabel" => '<',
                            "nextPageLabel" => '>',
                            "lastPageLabel"=> '>>',
                            "htmlOptions" => ['class'=>'catalog-paginator clearfix']
                        ]
                        htmlOptions=["class" => "catalog-table format clearfix", "id" => 'list2']
                }
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
    {include file="application.views.site._blockActions"}
</aside>
<!-- фильтр для планшета и телефона -->
{*{if BrowserDetector::isMobile()}*}
    <div id="filter-tire-780" class="filter">
        {*{include file="application.views.tires._blockSearchByTiresMobile"}*}
    </div>
{*{/if}*}
