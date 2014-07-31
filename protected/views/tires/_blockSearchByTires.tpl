{*{form name="Shins" class="CExtendsActiveForm" id='formSearchTires'}*}
{form name="Shins" id='formSearchTires' action="{$filter_url}"}
    <div class="selection-car">
        <h3>Подбор по автомобилю</h3>
        {if $avto}
            <span style="position: relative; height: 15px;">
                {$avto}<a href="{Yii::app()->createUrl("tires/index")}"><img src="/images/close.png" style="position: absolute; right: -20px;"></a>
                {if isset($variants)}
                   {$variants}
                {/if}
            </span>
        {else}
            <div class="content clearfix">
                <div class="manufacturer form-select select">
                    <h3>Производитель:</h3>
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
                    <h3>Модель:</h3>
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
                    <h3>Модификация:</h3>
                    {CHtml function="dropDownList"
                           name="avto_modification"
                           select=""
                           data=array()
                           htmlOptions=[
                               "id" => "avto_modification",
                               "disabled" => "disabled"
                           ]}
                </div>
            </div>
        {/if}
    </div>
    {if $vocabs->price}
    <div class="price-slider price-slider-filter clearfix">
        <h3>Цена <strong>от <span item="price_min">{$vocabs->price["min_price"]}</span> грн. до <span item="price_max">{$vocabs->price["max_price"]}</span> грн.</strong>:</h3>
        <div id="webform-component-prise-min" class="form-item webform-component webform-container-inline">
            <label for="amount">От:</label>
            {$Shins->textField($shins, "priceMin")}
        </div>
        <div id="webform-component-prise-max" class="form-item webform-component webform-container-inline">
            <label for="amount1">До:</label>
            {$Shins->textField($shins, "priceMax")}
        </div>
        <div id="slider-range"></div>
        <div style="margin-top: 5px; text-align: center;">
            <input class="form-submit" type="submit" value="Очистить" name="clear" style="width: 45%;">
            <input class="form-submit" type="submit" value="Фильтр" name="ok" style="width: 45%;">
        </div>
    </div>
    {/if}
    <div class="filter-page clearfix">
        <div class="options">
            {if $vocabs->shins_profile_width}
            <div class="bus-width form-select select">
                <h3>Ширина шины:</h3>
                {$Shins->dropDownList($shins, "shins_profile_width", $vocabs->shins_profile_width, ['empty' => '-все-'])}
            </div>
            {/if}
            {if $vocabs->shins_load_index_translit}
            <div class="load-index form-select select">
                <h3>Индекс нагрузки:</h3>
                {$Shins->dropDownList($shins, "shins_load_index", $vocabs->shins_load_index_translit, ['empty' => '-все-'])}
            </div>
            {/if}
            {if $vocabs->shins_profile_height}
            <div class="profile form-select select">
                <h3>Профиль:</h3>
                {$Shins->dropDownList($shins, "shins_profile_height", $vocabs->shins_profile_height, ['empty' => '-все-'])}
            </div>
            {/if}
            {if $vocabs->shins_diametr}
            <div class="diametr checkboxs">
                <h3>Диаметр:</h3>
                <div class="checkbox">
                    {$Shins->checkBoxList($shins, "shins_diametr", $vocabs->shins_diametr_as_url, ['template' => '<label class="" style="position: relative;">{input} {labelTitle}</label>'])}
                </div>
            </div>
            {/if}
        </div>
        {if $vocabs->shins_season_id}
        <div class="seasonality checkboxs">
            <h3>Сезонность:</h3>
            <div class="checkbox">
                {$Shins->checkBoxList($shins, "shins_season_id", $vocabs->shins_season_id_as_url, ['template' => '<label class="" style="position: relative;">{input} {labelTitle}</label>'])}
            </div>
        </div>
        {/if}
        {if $vocabs->shins_type_of_avto_id}
        <div class="options">
            <div class="type-car form-select select">
                <h3>Тип авто:</h3>
                {$Shins->dropDownList($shins, "shins_type_of_avto_id", $vocabs->shins_type_of_avto_id, ['empty' => '-все-'])}
            </div>
        </div>
        {/if}
        {if $vocabs->shins_run_flat_technology_id}
        <div class="run-flat checkboxs">
            <h3>Run Flat:</h3>
            <div class="checkbox">
                {$Shins->checkBoxList($shins, "shins_run_flat_technology_id", $vocabs->shins_run_flat_technology_id_as_url, ['template' => '<label class="" style="position: relative;">{input} {labelTitle}</label>'])}
            </div>
        </div>
        {/if}
        {if $vocabs->shins_spike_id}
        <div class="spike checkboxs">
            <h3>Шипы:</h3>
            <div class="checkbox">
                {$Shins->checkBoxList($shins, "shins_spike_id", $vocabs->shins_spike_id_as_url, ['template' => '<label class="" style="position: relative;">{input} {labelTitle}</label>'])}
            </div>
        </div>
        {/if}
        {if $vocabs->vendor_id > 0}
        <div class="brand checkboxs">
            <h3>Бренд:</h3>
            <div class="checkbox">
                {$Shins->checkBoxList($shins, "vendor_id", $vocabs->vendor_id_as_url, ['template' => '<label class="" style="position: relative;">{input} {labelTitle}</label>'])}
            </div>
        </div>
        {/if}
        <div id="edit-actions" class="form-actions form-wrapper">
            <input id="edit-submit" class="form-submit" type="submit" value="Подобрать">
        </div>
    </div>
{/form}
