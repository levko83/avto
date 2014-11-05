<div class="views-row clearfix">
    <div class="image-row">
        <a href="/drives/{$data["disks_display_id"]}-{$data["disks_display_translit"]}.html" class="show-rewievs"><span>смотреть отзывы</span></a>
        <a href="/drives/{$data["disks_display_id"]}-{$data["disks_display_translit"]}.html"><img src="{imageResizer product_type='drive' imageName=$data['image_name'] width=90 height=90}" alt=" " title=" " /></a>
        <div class="watch-reviews"><a href="/drives/{$data["disks_display_id"]}-{$data["disks_display_translit"]}.html"></a></div>
        <div class="rating">
            <input type="hidden" name="val" value="{$data["disks_rating"]}"/>
            <input type="hidden" name="vote-id" value="{$data["disks_display_id"]}"/>
        </div>
    </div>
    <div class="row-title"><a href="/drives/{$data["disks_display_id"]}-{$data["disks_display_translit"]}.html">{$data["disks_display_name"]}</a></div>
    <div class="alloy text-line">{$data["disks_type"]}</div>
    <div class="code text-line">код товара: {$data["disks_display_id"]}</div>
    <div class="price text-line">
        {if $data["min_price"] == 4294967295}
        Нет в наличии
        {else}
        от <span>{$data["min_price"]}</span> грн
        {/if}
    </div>
    {*<ul style="padding-top: 7px;">*}
    {*{foreach DisksDisplays::model()->filterByParams($data["disks_display_id"], $filter, $avto_product_arr) as $filterByParamsItem}*}
       {*<li>{round($filterByParamsItem["disks_rim_width"], 1)} x {round($filterByParamsItem["disks_rim_diametr"], 1)} ET{round($filterByParamsItem["disks_boom"], 1)}</li>*}
    {*{/foreach}*}
    {*</ul>*}
    <div class="read-more"><a href="/drives/{$data["disks_display_id"]}-{$data["disks_display_translit"]}.html">Купить</a></div>
</div>