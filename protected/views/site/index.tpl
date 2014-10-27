    <section class="sections-car clearfix">        
        <!--___________Блок Подбор по автомобилю___________-->
        <div class="selection-car clearfix">
            {include file="application.views.site._blockSearchByAvto"}
        </div>
        <!--___________Блок Оплата и доставка___________-->
        <div class="payment-delivery clearfix">
            <h2> Оплата и доставка </h2>
            <ul>
                <li class="element-0">Бесплатная доставка по всей Украине!</li>
                <li class="element-1">Без предоплаты и комиссии!</li>
                <li class="element-2">100% гарантия возврата!</li>
                <li class="element-3">Работаем 7 дней в неделю!<span>ПН-CБ: с 9:00 до 21:00<br>ВС: с 10:00 до 18:00</span></li>
            </ul>
        </div>
    </section>
    <section class="sections-tire tire-drive clearfix">
        <h2> Шины </h2>
        <!--__________________Блок Шины_________________-->
        <div class="tire clearfix">
            <div id="tire-form" class="tire-drive-form">
                {include file="application.views.site._blockSearchShins"}
            </div>
            <div id="block-tire" class="slider-tire-drive">
                <div class="content clearfix">
                    <div class="slider-filter">
                        <div class="search-form clearfix">
                            <div class="pagination">
                                Листать
                            </div>
                        </div>
                    </div>
                    <div class="jcarousel-clip">
                        <ul class="jcarousel-list">
                            {foreach from=$shinsDisplays item=shinsDisplay}
                            <li class=ad>
                                <div class=img>
                                    <a href="/tires/{$shinsDisplay["shins_display_id"]}-{$shinsDisplay["shins_display_translit"]}.html">
                                        <img src="{imageResizer product_type="tire" imageName=$shinsDisplay['image_name'] width=125 height=125}" alt=" " title=" " />
                                    </a>
                                </div>
                                <div class=title>
                                    <a href="/tires/{$shinsDisplay["shins_display_id"]}-{$shinsDisplay["shins_display_translit"]}.html">
                                        {$shinsDisplay['shins_display_name']}
                                    </a>
                                </div>
                            </li>
                            {/foreach}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="sections-drive tire-drive clearfix">
        <h2> Диски </h2>
        <!--__________________Блок Диски_________________-->
        <div class="drive clearfix">
            <div id="tire-form" class="tire-drive-form">
                {include file="application.views.site._blockSearchDisks"}
            </div>
            <div id="block-drive" class="slider-tire-drive">
                <div class="content clearfix">
                    <div class="slider-filter">
                        <div class="search-form clearfix">
                            <div class="pagination">
                                Листать
                            </div>
                        </div>
                    </div>
                    <div class="jcarousel-clip">
                        <ul class="jcarousel-list">
                            {foreach from=$disksDisplays item=diskDisplay}
                            <li class=ad>
                                <div class=img>
                                    <a href="/drives/{$diskDisplay["disks_display_id"]}-{$diskDisplay["disks_display_translit"]}.html">
                                        <img src="{imageResizer product_type="drive" imageName=$diskDisplay['image_name'] width=125 height=125}" alt=" " title=" " />
                                    </a>
                                </div>
                                <div class=title>
                                    <a href="/drives/{$diskDisplay["disks_display_id"]}-{$diskDisplay["disks_display_translit"]}.html">
                                        {$diskDisplay['disks_display_name']}
                                    </a>
                                </div>
                            </li>
                            {/foreach}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {if 1 == 0}
    <section>
        <div class="selection-brands">
            <h2>Подбор по марке авто</h2>
            <ul class="clearfix">
                {foreach from=AvtoMarks::model()->getData() item=avtoMark}
                <li>
                    <a href="#">{$avtoMark->value}</a>
                </li>
                {/foreach}
            </ul>
        </div>
    </section>
    {/if}