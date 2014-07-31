{*{form name="Shins" class="CExtendsActiveForm" id='formSearchTires'}*}
{form name="Shins" id='formSearchTires' action=Yii::app()->createUrl('/tires/index')}
    <div class="selection-car">
        <h3>Подбор по автомобилю</h3>
        {if $avto}
            <span style="position: relative; height: 15px;">
                {$avto}<a href="/tires.html"><img src="/images/close.png" style="position: absolute; right: -20px;"></a>
                {if isset($variants)}
                   {$variants}
                {/if}
            </span>
        {else}
            <div class="content clearfix">
                <div class="first manufacturer form-select select">
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
                <div class="last modification form-select select">
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
    {if isset($vocabs["price"]->min_price) and isset($vocabs["price"]->max_price) and $vocabs["price"]->min_price != $vocabs["price"]->max_price}
    <div class="price-slider-780 price-slider-filter clearfix">
        <h3>Цена:</h3>
        <div id="webform-component-prise-min" class="form-item webform-component webform-container-inline">
            <label for="amoun2">От:</label>
            {$Shins->textField($shins, "priceMin")}
        </div>
        <div id="webform-component-prise-max" class="form-item webform-component webform-container-inline">
            <label for="amount3">До:</label>
            {$Shins->textField($shins, "priceMax")}
        </div>
        <div id="slider-range"></div>
    </div>
    {/if}
    <div class="selects">
        <div class="options">
            <div class="bus-width form-select select">
                <h3>Ширина шины:</h3>
                {$Shins->dropDownList($shins, "shins_profile_width", $vocabs["shins_profile_width"])}
            </div>
            <div class="load-index form-select select">
                <h3>Индекс нагрузки:</h3>
                {$Shins->dropDownList($shins, "shins_load_index", $vocabs["shins_load_index"])}
            </div>
            <div class="profile form-select select">
                <h3>Профиль:</h3>
                {$Shins->dropDownList($shins, "shins_profile_height", $vocabs["shins_profile_height"])}
            </div>
            <div class="diameter form-select select">
                <h3>Диаметр:</h3>
                {$Shins->dropDownList($shins, "shins_diametr", $vocabs["shins_diametr"])}
            </div>
        </div>
        <div class="options">
            <div class="type-car form-select select">
                <h3>Тип авто:</h3>
                {$Shins->dropDownList($shins, "shins_type_of_avto_id", $vocabs["shins_type_of_avto"])}
            </div>
        </div>
    </div>
    <div class="checkboxs clearfix">
        <div class="brand">
            <h3>Бренд:</h3>
            <div class="checkbox-pagination up"></div>
            <div class="checkbox brand" id="brand">
                {$Shins->checkBoxList($shins, "vendor_id", $vocabs["vendor_name"], ['template' => '<label class="" style="position: relative;">{input} {labelTitle}</label>'])}
            </div>
            <div class="checkbox-pagination down"></div>
        </div>
        <div class="seasonality">
            <h3>Сезонность:</h3>
            <div class="checkbox">
                {$Shins->checkBoxList($shins, "shins_season_id", $vocabs["shins_season"], ['template' => '<label class="" style="position: relative;">{input} {labelTitle}</label>'])}
            </div>
            {if isset($vocabs["shins_run_flat_technology_id"][2])}
            <div class="checkbox run-flat">
                <div class="checkbox">
                    <label style="position: relative;">
                        {$Shins->checkBox($shins, "shins_run_flat_technology_id", ['value' => 2, 'uncheckValue' => ""])}
                        RunFlat
                    </label>
                </div>
            </div>
            {/if}
        </div>
        {if isset($vocabs["shins_spike_id"][2])}
        <div class="spike">
            <div class="checkbox">
                <label style="position: relative;">
                    {$Shins->checkBox($shins, "shins_spike_id", ['value' => 2, 'uncheckValue' => ""])}
                    {$attributes["shins_spike_id"]}
                </label>
            </div>
        </div>
        {/if}
    </div>
    <div id="edit-actions" class="form-actions form-wrapper">
        <input id="edit-submit" class="form-submit" type="submit" value="Подобрать">
    </div>
{/form}
