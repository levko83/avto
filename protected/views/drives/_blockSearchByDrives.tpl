{form name="Disks" id='formSearchDrives' action="{$filter_url}"}

<style>
aside#sidebar-first .filter .options span {
display:block;
  display: inline;
  line-height: 20px;
}
aside#sidebar-first .filter .price-slider span {
  font-weight: bold;
  display:block;
}
aside#sidebar-first .filter .selection-car .select span {
display:block;
  font-weight: normal;
  margin-bottom: 10px;
}
aside#sidebar-first .filter .selection-car span {
display:block;
  font-weight: bold;
}
aside#sidebar-first .filter span {
display:block;
  color: #000;
  margin: 8px 0;
  font-size: 14px;
  font-weight: normal;
}
aside#sidebar-first .filter .checkboxs > span {
  font-weight: bold;
  margin-bottom:5px;
  display:block;
}
</style>

<div class="selection-car">
    <span>Подбор по автомобилю</span>
    {if $avto}
    <span style="position: relative; height: 15px;">
        <strong>{$avto}</strong><a href="{Yii::app()->createUrl("drives/index")}"><img src="/images/close.png" style="position: absolute; right: -20px;"></a>
        {if isset($avto_product_arr) and count($avto_product_arr) > 0}
            {assign var="avto_modif" value=reset($avto_product_arr)}

            <div style="padding-top: 10px;">PSD: <b>{$avto_modif[0]["disks_fixture_port_count"]}*{round($avto_modif[0]["disks_port_position"], 1)}</b></div>
            <div style="padding-top: 10px;">HUB: <b>{round($avto_modif[0]["disks_fixture_port_diametr"], 1)} мм.</b></div>

            <ul style="padding-top: 10px;">
            {foreach from=$avto_product_arr key="avto_product_type" item="avto_product_item" name="avto_products"}
                {if $avto_product_type == 1}
                    <li style="padding-top: 10px;">
                    Завод:
                {elseif $avto_product_type == 2}
                    <li style="padding-top: 10px;">
                    Замен:
                {elseif $avto_product_type == 3}
                    <li style="padding-top: 10px;">
                    Тюнинг:
                {else}
                    {continue}
                {/if}
                {foreach from=$avto_product_item item="data"}
                    <a href="{Yii::app()->createUrl("drives/index", ["v" => $filter["v"], "v5" => round($data["disks_rim_width"], 1), "v3" => round($data["disks_rim_diametr"], 1), "v7" => round($data["disks_boom"], 1)])}">
                        {round($data["disks_rim_width"], 1)} x {round($data["disks_rim_diametr"], 1)} ET{round($data["disks_boom"], 1)}
                    </a>&nbsp;
                {/foreach}
                </li>
            {/foreach}
            </ul>
        {else}
            Для данной модификации автомобиля дисков не найдено
        {/if}
        </span>
    {else}
    <div class="content clearfix">
        <div class="manufacturer form-select select">
            <span>Производитель:</span>
            {CHtml function="dropDownList"
                   name="avto_mark"
                   select=""
                   data=CHtml::listData(AvtoMarks::model()->findAll(), 'id', 'value')
                   htmlOptions=[
                        "empty" => [-1 => "-- выберите значение --"],
                        "id" => "avto_mark",
                        "ajax" => [
                            "type" => "POST",
                            "url" => Yii::app()->createUrl("avto/changeMark"),
                            "update" => "#avto_model",
                            "dataType" => "json",
                            "data" => [
                                "avto_mark" => "js:$('#avto_mark').val()"
                            ],
                            "success" => "js:function(data){
                                if(data.response == 1){
                                    $('#avto_model').html(data.text);
                                    $('#avto_model').removeAttr('disabled');
                                    $('#avto_modification').html('');
                                    $('#avto_modification').attr('disabled', 'disabled');
                                }else{
                                    $('#avto_model').html('');
                                    $('#avto_modification').html('');
                                    $('#avto_model').attr('disabled', 'disabled');
                                    $('#avto_modification').attr('disabled', 'disabled');
                                    $('#search').hide();
                                }
                            }",
                            "error" => "js:function(XHR, textStatus, errorThrown){
                                $('#avto_model').html('');
                                $('#avto_modification').html('');
                                $('#avto_model').attr('disabled', 'disabled');
                                $('#avto_modification').attr('disabled', 'disabled');
                                $('#search').hide();
                            }"
                        ]
                  ]
            }
        </div>
        <div class="model form-select select">
            <span>Модель:</span>
            {CHtml function="dropDownList"
                   name="avto_model"
                   select=""
                   data=array()
                   htmlOptions=[
                        "id" => "avto_model",
                        "disabled" => "disabled",
                        "ajax" => [
                            "type" => "POST",
                            "url" => {Yii::app()->createUrl("avto/changeModel")},
                            "update" => "#avto_modification",
                            "data" => [
                                "avto_model" => "js:$('#avto_model').val()"
                            ],
                            "dataType" => "json",
                            "success" => "js:function(data){
                                if(data.response == 1){
                                    $('#avto_modification').html(data.text);
                                    $('#avto_modification').removeAttr('disabled');
                                }else{
                                    $('#avto_modification').html('');
                                    $('#avto_modification').attr('disabled', 'disabled');
                                }
                            }",
                            "error" => "js:function(XHR, textStatus, errorThrown){
                                $('#avto_modification').html('');
                                $('#avto_modification').attr('disabled', 'disabled');
                            }"
                        ]
                   ]
            }
        </div>
        <div class="modification form-select select">
            <span>Модификация:</span>
            {CHtml function="dropDownList"
                   name="avto_modification"
                   select=""
                   data=array()
                   htmlOptions=[
                       "id" => "avto_modification",
                       "disabled" => "disabled"
                   ]
            }
        </div>
    </div>
    {/if}
</div>
    {*{if isset($vocabs["price"]->min_price) and isset($vocabs["price"]->max_price) and $vocabs["price"]->min_price != $vocabs["price"]->max_price}*}
        {*<div class="price-slider price-slider-filter clearfix">*}
            {*<span>Цена:</span>*}
            {*<div id="webform-component-prise-min" class="form-item webform-component webform-container-inline">*}
                {*<label for="amount">От:</label>*}
                {*{$Disks->textField($disks, "priceMin")}*}
            {*</div>*}
            {*<div id="webform-component-prise-max" class="form-item webform-component webform-container-inline">*}
            {*<label for="amount1">До:</label>*}
                {*{$Disks->textField($disks, "priceMax")}*}
            {*</div>*}
            {*<div id="slider-range"></div>*}
            {*<div style="margin-top: 5px;">*}
                {*<input class="form-submit" type="submit" value="OK" name="ok" style="width: 100%;">*}
            {*</div>*}
        {*</div>*}
    {*{/if}*}
    <div class="filter-page clearfix filter-options">
        <div class="options">
            {if $vocabs->disks_rim_diametr}
                <div class="diametr checkboxs">
                    <span>Диаметр:</span>
                    <div class="checkbox">
                        {$Disks->checkBoxList($disks, "disks_rim_diametr", $vocabs->disks_rim_diametr_as_url, ['template' => '<label class="" style="position: relative;">{input} {labelTitle}</label>'])}
                    </div>
                </div>
            {/if}
            {if $vocabs->disks_type_id}
                <div class="rim-type form-select select">
                    <span>Тип:</span>
                    {$Disks->dropDownList($disks, "disks_type_id", $vocabs->disks_type_id, ['empty' => '-все-'])}
                </div>
            {/if}
            {if $vocabs->disks_rim_width}
                <div class="rim-width form-select select">
                    <span>Ширина диска:</span>
                    {$Disks->dropDownList($disks, "disks_rim_width", $vocabs->disks_rim_width, ['empty' => '-все-'])}
                </div>
            {/if}
            {if !$avto_product_arr}
            {if $vocabs->disks_port_position}
                <div class="psd form-select select">
                    <span>PSD:</span>
                    {$Disks->dropDownList($disks, "disks_port_position", $vocabs->disks_port_position, ['empty' => '-все-'])}
                </div>
            {/if}
            {/if}
            {if !$avto_product_arr}
            {if $vocabs->disks_fixture_port_count}
                <div class="kpo form-select select">
                    <span>КПО:</span>
                    {$Disks->dropDownList($disks, "disks_fixture_port_count", $vocabs->disks_fixture_port_count, ['empty' => '-все-'])}
                </div>
            {/if}
            {/if}
            {if $vocabs->disks_boom}
                <div class="et form-select select">
                    <span>ET:</span>
                    {$Disks->dropDownList($disks, "disks_boom", $vocabs->disks_boom, ['empty' => '-все-'])}
                </div>
            {/if}
            {if $vocabs->disks_fixture_port_diametr}
                <div class="hub form-select select">
                    <span>HUB:</span>
                    {$Disks->dropDownList($disks, "disks_fixture_port_diametr", $vocabs->disks_fixture_port_diametr, ['empty' => '-все-'])}
                </div>
            {/if}
        </div>
        {if $vocabs->disks_color_translit}
            <div class="rim-color checkboxs">
                <span>Цвет:</span>
                <div class="checkbox">
                    {$Disks->checkBoxList($disks, "disks_color", $vocabs->disks_color_translit_as_url, ['template' => '<label class="" style="position: relative;">{input} {labelTitle}</label>'])}
                </div>
            </div>
        {/if}
        {if $vocabs->vendor_id}
            <div class="brand checkboxs">
                <span>Бренд:</span>
                <div class="checkbox">
                    {$Disks->checkBoxList($disks, "vendor_id", $vocabs->vendor_id_as_url, ['template' => '<label class="" style="position: relative;">{input} {labelTitle}</label>'])}
                </div>
            </div>
        {/if}
        <div id="edit-actions" class="form-actions form-wrapper">
            <input id="edit-submit" class="form-submit" type="submit" value="Подобрать" name="ok">
        </div>
    </div>
{/form}