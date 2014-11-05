<div class="views-row clearfix">
    <div class="image-row">
        <a href="/tires/{$data["shins_display_id"]}-{$data["shins_display_translit"]}.html" class="show-rewievs"><span>смотреть отзывы</span></a>
        <a href="/tires/{$data["shins_display_id"]}-{$data["shins_display_translit"]}.html"><img src="{imageResizer product_type='tire' imageName=$data['image_name'] width=90 height=90}" alt=" " title=" " /></a>
        <div class="watch-reviews"><a href="/tires/{$data["shins_display_id"]}-{$data["shins_display_translit"]}.html"></a></div>
        <div class="rating">
            <input type="hidden" name="val" value="{$data["shins_rating"]}"/>
            <input type="hidden" name="vote-id" value="{$data["shins_display_id"]}"/>
        </div>
    </div>
    <div class="row-title"><a href="/tires/{$data["shins_display_id"]}-{$data["shins_display_translit"]}.html">{$data["shins_display_name"]}</a></div>
    <div class="seasonality text-line">{$data["shins_season"]}</div>
    <div class="code text-line">код товара: {$data["shins_display_id"]}</div>
    <div class="price text-line">
        {if $data["min_price"] == 4294967295}
        Нет в наличии
        {else}
        от <span>{$data["min_price"]}</span> грн
        {/if}
    </div>
    {*<ul style="padding-top: 7px;">*}
    {*{foreach ShinsDisplays::model()->filterByParams($data["shins_display_id"], $filter, $avto_product_arr) as $filterByParamsItem}*}
       {*<li>{$filterByParamsItem}</li>*}
    {*{/foreach}*}
    {*</ul>*}
    <div class="read-more"><a href="/tires/{$data["shins_display_id"]}-{$data["shins_display_translit"]}.html">Купить</a></div>
</div>