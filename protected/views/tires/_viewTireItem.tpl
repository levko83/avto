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
    {assign var="shins" value=ShinsDisplays::model()->getShinsByIds($data["ids"])}
    {if $shins}
        <table>
            <tr>
                <th>Типоразмер</th>
                <th>Индекс нагрузки</th>
                <th>Индекс скорости</th>
                <th>Шипы</th>
                <th>Цена</th>
                <th></th>
                <th></th>
            </tr>
            {foreach $shins as $shina}
                {assign var="type_size" value={(double)$shina["shins_profile_width"]}|cat:"/"|cat:{(double)$shina["shins_profile_height"]}|cat:" R"|cat:{(double)$shina["shins_diametr"]}}
                <tr>
                    <td class="element-0">
                        {$type_size}
                    </td>
                    <td>
                        {$shina["shins_load_index"]}
                    </td>
                    <td>
                        {$shina["shins_speed_index"]}
                    </td>
                    <td>
                        {if $shina["shins_spike_id"] == 2}
                            есть
                        {elseif $shina["shins_spike_id"] == 3}
                            нет
                        {else}
                            нет данных
                        {/if}
                    </td>
                    <td class="element-3">
                        {$shina["price"]} грн.
                    </td>
                    <td class="add-tire">
                        <a href="#" tire-id="{$shina["id"]}">Купить</a>
                    </td>
                    <td>
                        <input type="text" class="tires_count" tire-id="{$shina["id"]}" value="4"> шт.
                    </td>
                </tr>
            {/foreach}
        </table>
    {/if}
    {*<div class="read-more"><a href="{$display_url}">Купить</a></div>*}
</div>