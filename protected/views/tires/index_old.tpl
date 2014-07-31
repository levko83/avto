<!--_____________________ Левая колонка _________________________-->
<aside id="sidebar-first">
    <div id="filter-tire" class="filter">
        {include file="application.views.tires._blockSearchByTires"}
    </div>
</aside>
<!--_________________________________________ Основной контента _________________________________________-->
<section id="center">
    <div id="squeeze">
        <a class="filter-button" href="#filter-tire-780">Фильтр</a>
        <div class="catalog-product">
            <div class="catalog-management">
                {widget name = 'CLinkPager'
                        pages = $pages
                        internalPageCssClass = false
                        selectedPageCssClass = 'active'
                        header = false
                        firstPageLabel = '<<'
                        prevPageLabel = '<'
                        nextPageLabel = '>'
                        lastPageLabel = '>>'
                        htmlOptions=["class" => "catalog-paginator clearfix"]
                }
                <div class="sorting clearfix">
                    <div class="catalog-regularize">
                        Упорядочить по:
                        <select id="sortType">
                           <option selected="selected" value="0">популярности</option>
                           <option value="1">цене</option>
                           <option value="2">названию</option>
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
                        template = '<div class="test"></div>{items}'
                        itemsCssClass = 'testClass'
                        itemView = '_viewTireItem'
                        cssFile = false
                        enablePagination = false
                        htmlOptions=["class" => "catalog-list format clearfix"]
                }
                {widget name = "zii.widgets.CListView"
                        dataProvider = $dataProvider
                        ajaxUpdate = false
                        template = '{items}'
                        itemView = '_viewTireItem'
                        cssFile = false
                        enablePagination = false
                        htmlOptions=["class" => "catalog-table format clearfix"]
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
    <div class="discounted-items">
        <h2 class=title>Товары со скидкой</h2>
        <div class="content clearfix">
            <div class="view-row first clearfix">
                <div class="image-row"><a href="/tires.html"><img src="img/prim3.jpg" alt=" " title=" " /></a></div>
                <div class=row-title><a href="/tires.html">NOKIAN Hakkapeliitta R</a></div>
                <div class="diametr text-line">195/55R15 89R</div>
                <div class="old-price text-line">1 032 грн</div>
                <div class="price text-line">1 002 грн</div>
            </div>
            <div class="view-row clearfix">
                <div class="image-row"><a href="/drive.html"><img src="img/prim4.jpg" alt=" " title=" " /></a></div>
                <div class=row-title><a href="/drive.html">ZW D221 W</a></div>
                <div class="diametr text-line">195/55R15 89R</div>
                <div class="old-price text-line">1 032 грн</div>
                <div class="price text-line">1 002 грн</div>
            </div>
            <div class="view-row first clearfix">
                <div class="image-row"><a href="/tires.html"><img src="img/prim3.jpg" alt=" " title=" " /></a></div>
                <div class=row-title><a href="/tires.html">NOKIAN Hakkapeliitta R</a></div>
                <div class="diametr text-line">195/55R15 89R</div>
                <div class="old-price text-line">1 032 грн</div>
                <div class="price text-line">1 002 грн</div>
            </div>
            <div class="view-row clearfix">
                <div class="image-row"><a href="/drive.html"><img src="img/prim4.jpg" alt=" " title=" " /></a></div>
                <div class=row-title><a href="/drive.html">ZW D221 W</a></div>
                <div class="diametr text-line">195/55R15 89R</div>
                <div class="old-price text-line">1 032 грн</div>
                <div class="price text-line">1 002 грн</div>
            </div>
            <div class="view-row first clearfix">
                <div class="image-row"><a href="/tires.html"><img src="img/prim3.jpg" alt=" " title=" " /></a></div>
                <div class=row-title><a href="/tires.html">NOKIAN Hakkapeliitta R</a></div>
                <div class="diametr text-line">195/55R15 89R</div>
                <div class="old-price text-line">1 032 грн</div>
                <div class="price text-line">1 002 грн</div>
            </div>
            <div class="view-row clearfix">
                <div class="image-row"><a href="/drive.html"><img src="img/prim4.jpg" alt=" " title=" " /></a></div>
                <div class=row-title><a href="/drive.html">ZW D221 W</a></div>
                <div class="diametr text-line">195/55R15 89R</div>
                <div class="old-price text-line">1 032 грн</div>
                <div class="price text-line">1 002 грн</div>
            </div>
            <div class="view-row first clearfix">
                <div class="image-row"><a href="/tires.html"><img src="img/prim3.jpg" alt=" " title=" " /></a></div>
                <div class=row-title><a href="/tires.html">NOKIAN Hakkapeliitta R</a></div>
                <div class="diametr text-line">195/55R15 89R</div>
                <div class="old-price text-line">1 032 грн</div>
                <div class="price text-line">1 002 грн</div>
            </div>
            <div class="view-row clearfix">
                <div class="image-row"><a href="/drive.html"><img src="img/prim4.jpg" alt=" " title=" " /></a></div>
                <div class=row-title><a href="/drive.html">ZW D221 W</a></div>
                <div class="diametr text-line">195/55R15 89R</div>
                <div class="old-price text-line">1 032 грн</div>
                <div class="price text-line">1 002 грн</div>
            </div>
        </div>
    </div>
</aside>
<!-- Дубль фильтра для планшета и телефона -->
<div id="filter-tire-780" class="filter">
    {include file="application.views.tires._blockSearchByTires"}
</div>
