<!--_____________________ Левая колонка _________________________-->
{*{if !BrowserDetector::isMobile()}*}
    <aside id="sidebar-first">
        <div id="filter-tire" class="filter">
            {include file="application.views.drives._blockSearchByDrives"}
        </div>
    </aside>
{*{/if}*}
<!--_________________________________________ Основной контента _________________________________________-->
<section id="center">
    <div id="squeeze">
        {if $this->breadcrumbs}
            {include file="application.views.site._breadcrumbs"}
        {/if}
        <a class="filter-button" href="#filter-tire-780">Фильтр</a>
        <div class="drive-index clearfix">
            <!--________________________________Блок Шапка продукта________________________________-->
            <div class="drive-index-title">
                <h2>{$this->title}</h2>
                <div class="drive-index-body">
                    {$this->text}
                </div>
            </div>
            <!--___________Блок Параметров товара___________-->
            <div class="drive-index-block">
                <div id="tabs">
                    <ul class="tabs_menu">
                        <li class="first"><a>Есть в наличии</a></li>
                        <li class="last"><a>Нет в наличии</a></li>
                    </ul>
                    <div class="tabs_content">
                        <div class="clearfix">
                            <div class="in-stock clearfix">
                                {if count($inStock) > 0}
                                    {foreach from=$inStock item=item}
                                        {*<a href="/drives.html?v12[1]={$item["vendor_id"]}">*}
                                        <a href="{Yii::app()->createUrl("drives/index", ["v12" => [$item["vendor_id"]], "v4" => $disks_type_id, "v13" => 1])}">
                                            <img src="{imageResizer product_type="disks_vendor" imageName=$item["vendor_image"] width=120 height=105}" alt="">
                                            {$item["vendor_name"]}
                                        </a>
                                    {/foreach}
                                {else}
                                    Товары отсутствуют
                                {/if}
                            </div>
                        </div>
                        <div>
                            <div class="not-available">
                                {if count($outStock) > 0}
                                    {foreach from=$outStock item=item1}
                                        {*<a href="/drives.html?v12[1]={$item1["vendor_id"]}">*}
                                        <a href="{Yii::app()->createUrl("drives/index", ["v12" => [$item1["vendor_id"]], "v4" => $disks_type_id])}">
                                            <img src="{imageResizer product_type="disks_vendor" imageName=$item1["vendor_image"] width=100 height=35}" alt="">
                                            {$item1["vendor_name"]}
                                        </a>
                                    {/foreach}
                                {else}
                                    Товары отсутствуют
                                {/if}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- фильтр для планшета и телефона -->
{if BrowserDetector::isMobile()}
    <div id="filter-tire-780" class="filter">
        {include file="application.views.tires._blockSearchByDrivesMobile"}
    </div>
{/if}