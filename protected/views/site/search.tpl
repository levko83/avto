{if $type == 'showForm'}
    {include file="application.views.site._searchForm"}
{else}
   {if $data->fullAvtoName}
        <h2>Тип автомобиля: <span style="color: darkolivegreen;"><a href="{Yii::app()->createUrl("site/search")}">{$data->fullAvtoName}</a></span>:</h2>
   {/if}
   <h2>Шины:</h2>
   {if ($data->shins_zavod->count + $data->shins_zamen->count + $data->shins_tuning->count) == 0}
       По Вашему запросу ничего не найдено
   {else}
       {if $data->shins_zavod->count > 0}
            <h3>Заводские шины ({$data->shins_zavod->count}):</h3>
            <ul style="margin-top: 10px; margin-left: 10px; list-style: none;">
                {foreach from=$data->shins_zavod->dataProvider->data item=shina}
                    <li>
                        <div class="product_images" style="float: left; width: 160px;">
                            {if count($shina->images) > 0}
                                <img class="tovar_img" src="{Yii::app()->params["imagePath"]}/{$shina->images[0]}_thm.jpg"/>
                            {else}
                                <img src="{Yii::app()->request->baseUrl}/images/no_photo.jpg"/>
                            {/if}
                        </div>
                        <h2 style="float: left;"><a href="{$shina->url}">{$shina->product_name}</a></h2>
                        <div style="clear: both;"></div>
                        <hr/>
                    </li>
                {/foreach}
                {CHtml function="link" text="Смотреть все" url="#" htmlOptions=["class" => "detailResult"]}
            </ul>
       {/if}
       {if $data->shins_zamen->count > 0}
            <h3>Шины для замена: ({$data->shins_zamen->count}):</h3>
            <ul style="margin-top: 10px; margin-left: 10px; list-style: none;">
                {foreach from=$data->shins_zamen->dataProvider->data item=shina}
                    <li>
                        <div class="product_images" style="float: left; width: 160px;">
                            {if count($shina->images) > 0}
                                <img class="tovar_img" src="{Yii::app()->params["imagePath"]}/{$shina->images[0]}_thm.jpg"/>
                            {else}
                                <img src="{Yii::app()->request->baseUrl}/images/no_photo.jpg"/>
                            {/if}
                         </div>
                        <h2 style="float: left;"><a href="{$shina->url}">{$shina->product_name}</a></h2>
                        <div style="clear: both;"></div>
                        <hr/>
                    </li>
                 {/foreach}
                 {CHtml function="link" text="Смотреть все" url="#" htmlOptions=["class" => "detailResult"]}
            </ul>
       {/if}
       {if $data->shins_tuning->count > 0}
            <h3>Шины для тюнинга: ({$data->shins_tuning->count}):</h3>
            <ul style="margin-top: 10px; margin-left: 10px; list-style: none;">
                {foreach from=$data->shins_tuning->dataProvider->data item=shina}
                    <li>
                        <div class="product_images" style="float: left; width: 160px;">
                            {if count($shina->images) > 0}
                                <img class="tovar_img" src="{Yii::app()->params["imagePath"]}/{$shina->images[0]}_thm.jpg"/>
                            {else}
                                <img src="{Yii::app()->request->baseUrl}/images/no_photo.jpg"/>
                            {/if}
                        </div>
                        <h2 style="float: left;"><a href="{$shina->url}">{$shina->product_name}</a></h2>
                        <div style="clear: both;"></div>
                        <hr/>
                    </li>
                {/foreach}
                {CHtml function="link" text="Смотреть все" url="#" htmlOptions=["class" => "detailResult"]}
            </ul>
       {/if}
   {/if}
{/if}
