{assign var="display_url" value={Yii::app()->createUrl("tires/tire", ["id" => $data["shins_display_id"], "translit" => $data["shins_display_translit"]])}|cat:{HtmlHelper::getIdsQuery($data["ids"])}}
<div class="views-row clearfix">
    <div class="image-row">
        <a href="{$display_url}" class="show-rewievs"><span>смотреть отзывы</span></a>
        <a href="{$display_url}"><img src="{imageResizer product_type='tire' imageName=$data['image_name'] width=90 height=90}" alt=" " title=" " /></a>
        <div class="watch-reviews"><a href="{$display_url}"></a></div>
        <div class="rating">
            <input type="hidden" name="val" value="{$data["shins_rating"]}"/>
            <input type="hidden" name="vote-id" value="{$data["shins_display_id"]}"/>
        </div>
    </div>
    <div class="row-title"><a href="{$display_url}">{$data["shins_display_name"]}</a></div>
    <div class="seasonality text-line">{$data["shins_season"]}</div>
    <div class="code text-line">код товара: {$data["shins_display_id"]}</div>
    <div class="price text-line"{if ($data["max_amount"] < 4)}style="color: #999;"{/if}">
        {if ($data["max_amount"] < 4)}
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
    <div class="read-more"><a href="{$display_url}">Купить</a></div>
</div>