<section id="center">
    <div id="squeeze">
        <article class="node">
            <div class="city-wrapp clearfix">
                <h1 class="title">Шины в {$region_center_name} {$region_name}</h1>
                <div class="city-select-list">
                    <div class="row">
                    <label>Выберите город:</label>
                        <span class="input">
                        <select id="other-cities" name="other_cities" onchange="window.location = jQuery(this).find('option:selected').attr('data-link');">
                            {foreach $select_options as $select_option}
                                {$select_option}
                            {/foreach}
                        </select>
                        </span>
                    </div>
                    <div id="for_benefits" class="text">
                    <div class="selection-city clearfix">
                        <div id="tabs">
                        <ul class="tabs_menu">
                            <li class="first active_tab"><a>Новая почта</a></li>
                            <li class="last"><a>ИнТайм</a></li>
                        </ul>
                        <div class="tabs_content clearfix">
                            <div style="display: block;">
                                <ul id="item0" class="warehouse_list" style="display: block;">
                                    {if $novaWareHouses}
                                        {foreach $novaWareHouses as $novaWareHouse}
                                            <li>
                                                <span>{$novaWareHouse->name}: {$novaWareHouse->address}</span>
                                                <span>{$novaWareHouse->phone}</span>
                                                <span>Пн.-пт: {$novaWareHouse->weekday_work_hours} </span>
                                                {if $novaWareHouse->working_saturday != "-"}
                                                    <span>Суббота: {$novaWareHouse->working_saturday} </span>
                                                {else}
                                                    <span>Суббота: выходной </span>
                                                {/if}
                                                {if $novaWareHouse->working_sunday != "-"}
                                                    <span>Воскресенье: {$novaWareHouse->working_sunday} </span>
                                                {else}
                                                    <span>Воскресенье: выходной </span>
                                                {/if}
                                            </li>
                                        {/foreach}
                                    {else}
                                        В этом городе отделений нет
                                    {/if}
                                </ul>
                            </div>
                            <div style="display: none;">
                                <ul id="item1" class="warehouse_list" style="display: block;">
                                    {if $intimeWareHouses}
                                        {foreach $intimeWareHouses as $intimeWareHouse}
                                            <li>
                                                <span>{$intimeWareHouse->name}: {$intimeWareHouse->adress}</span>
                                                <span>{$intimeWareHouse->phone}</span>
                                            </li>
                                        {/foreach}
                                    {else}
                                        В этом городе отделений нет
                                    {/if}
                                </ul>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                    <div class="text delivery_hide_text">
                    <p>
                        {if trim($this->text == "")}
                            Полный список городов, в которых можете приобрести шины через наш интернет-магазин,
                            находится в разделе "
                            <a href="{Yii::app()->createUrl("site/delivery")}">Оплата и доставка</a>
                            ".
                        {else}
                            {$this->text}
                        {/if}
                    </p>
                    <div class="choice_links">
                        <div class="tire_link">
                            <span class="link_text"><a href="{Yii::app()->createUrl("tires/index")}">Перейти к подбору шин</a>→</span>
                        </div>
                        <div class="rim_link">
                            <span class="link_text"><a href="{Yii::app()->createUrl("drives/index")}">Перейти к подбору дисков</a>→</span>
                        </div>
                    </div>
                </div>
                </div>
                </div>
        </article>
    </div>
</section>