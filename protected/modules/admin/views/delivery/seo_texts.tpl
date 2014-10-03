<h3 class="block">Доставка. Уникальные тексты</h3>
<div class="default">
    <div class="row-fluid">
        <ul>
            {foreach $data as $region}
                <li>
                    <div class="region" region="{$region["region_translit"]}">
                        {$region["region_name"]}
                        {if $region["is_new"] == 1}
                            <img src="/css/images/new.png" alt=""/>
                        {/if}
                    </div>
                    <ul class="citys" region="{$region["region_translit"]}">
                        {foreach $region["citys"] as $city}
                            <li>
                                <a href="{Yii::app()->createUrl("admin/delivery/seo_texts_edit", ["region" => $region["region_translit"], "city" => $city["city_translit"]])}">
                                    {$city["city"]}
                                    {if $city["is_new"] == 0}
                                        <img src="/css/images/new.png" alt=""/>
                                    {/if}
                                </a>
                            </li>
                        {/foreach}
                    </ul>
                </li>
            {/foreach}
        </ul>
    </div>
</div>
