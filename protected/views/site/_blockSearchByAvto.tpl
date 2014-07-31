<div id="tabs">
    <h2> Подбор по автомобилю </h2>
    <ul class="tabs_menu">
        <li>Шины</li>
        <li>Диски</li>
    </ul>
    <div class="tabs_content clearfix">
        <div>
            <div class="manufacturer form-select select">
                <h3>Производитель:</h3>
                {CHtml function="dropDownList"
                        name="avto_mark"
                        select=""
                        data=CHtml::listData(AvtoMarks::model()->findAll(), 'id', 'value')
                        htmlOptions=[
                            "empty" => [-1 => "-- выберите значение --"],
                            "id" => "shins_avto_mark",
                            "ajax" => [
                                "type" => "POST",
                                "url" => Yii::app()->createUrl("avto/changeMark"),
                                "update" => "#shins_avto_model",
                                "dataType" => "json",
                                "data" => [
                                    "avto_mark" => "js:$('#shins_avto_mark').val()"
                                ],
                                "success" => "js:function(data){
                                    if(data.response == 1){
                                        $('#shins_avto_model').html(data.text);
                                        $('#shins_avto_model').removeAttr('disabled');
                                        $('#shins_avto_modification').html('<option value=\'-1\'>-- выберите значение --</option>');
                                        $('#shins_avto_modification').attr('disabled', 'disabled');
                                    }else{
                                        $('#shins_avto_model').html('<option value=\'-1\'>-- выберите значение --</option>');
                                        $('#shins_avto_modification').html('<option value=\'-1\'>-- выберите значение --</option>');
                                        $('#shins_avto_model').attr('disabled', 'disabled');
                                        $('#shins_avto_modification').attr('disabled', 'disabled');
                                    }
                                }",
                                "error" => "js:function(XHR, textStatus, errorThrown){
                                    $('#shins_avto_model').html('<option value=\'-1\'>-- выберите значение --</option>');
                                    $('#shins_avto_modification').html('<option value=\'-1\'>-- выберите значение --</option>');
                                    $('#shins_avto_model').attr('disabled', 'disabled');
                                    $('#shins_avto_modification').attr('disabled', 'disabled');
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
                       data=[-1 => "-- выберите значение --"]
                       htmlOptions=[
                            "id" => "shins_avto_model",
                            "disabled" => "disabled",
                            "ajax" => [
                                "type" => "POST",
                                "url" => {Yii::app()->createUrl("avto/changeModel")},
                                "update" => "#shins_avto_modification",
                                "data" => [
                                    "avto_model" => "js:$('#shins_avto_model').val()"
                                ],
                                "dataType" => "json",
                                "success" => "js:function(data){
                                    if(data.response == 1){
                                        $('#shins_avto_modification').html(data.text);
                                        $('#shins_avto_modification').removeAttr('disabled');
                                    }else{
                                        $('#shins_avto_modification').html('<option value=\'-1\'>-- выберите значение --</option>');
                                        $('#shins_avto_modification').attr('disabled', 'disabled');
                                    }
                                }",
                                "error" => "js:function(XHR, textStatus, errorThrown){
                                    $('#shins_avto_modification').html('<option value=\'-1\'>-- выберите значение --</option>');
                                    $('#shins_avto_modification').attr('disabled', 'disabled');
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
                       data=[-1 => "-- выберите значение --"]
                       htmlOptions=[
                          "id" => "shins_avto_modification",
                          "disabled" => "disabled"
                       ]
                }
            </div>
            <div class="form-actions shins_search_by_avto">
                <input class="form-submit" type="submit" value="Подобрать">
            </div>
        </div>
        <div>
            <div class="manufacturer form-select select">
                <h3>Производитель:</h3>
                {CHtml function="dropDownList"
                        name="avto_mark"
                        select=""
                        data=CHtml::listData(AvtoMarks::model()->findAll(), 'id', 'value')
                        htmlOptions=[
                            "empty" => [-1 => "-- выберите значение --"],
                            "id" => "disks_avto_mark",
                            "ajax" => [
                            "type" => "POST",
                            "url" => Yii::app()->createUrl("avto/changeMark"),
                            "update" => "#disks_avto_model",
                            "dataType" => "json",
                            "data" => [
                                "avto_mark" => "js:$('#disks_avto_mark').val()"
                            ],
                            "success" => "js:function(data){
                                if(data.response == 1){
                                    $('#disks_avto_model').html(data.text);
                                    $('#disks_avto_model').removeAttr('disabled');
                                    $('#disks_avto_modification').html('<option value=\'-1\'>-- выберите значение --</option>');
                                    $('#disks_avto_modification').attr('disabled', 'disabled');
                                }else{
                                    $('#disks_avto_model').html('<option value=\'-1\'>-- выберите значение --</option>');
                                    $('#disks_avto_modification').html('<option value=\'-1\'>-- выберите значение --</option>');
                                    $('#disks_avto_model').attr('disabled', 'disabled');
                                    $('#disks_avto_modification').attr('disabled', 'disabled');
                                }
                            }",
                            "error" => "js:function(XHR, textStatus, errorThrown){
                                $('#disks_avto_model').html('<option value=\'-1\'>-- выберите значение --</option>');
                                $('#disks_avto_modification').html('<option value=\'-1\'>-- выберите значение --</option>');
                                $('#disks_avto_model').attr('disabled', 'disabled');
                                $('#disks_avto_modification').attr('disabled', 'disabled');
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
                        data=[-1 => "-- выберите значение --"]
                        htmlOptions=[
                            "id" => "disks_avto_model",
                            "disabled" => "disabled",
                            "ajax" => [
                                "type" => "POST",
                                "url" => {Yii::app()->createUrl("avto/changeModel")},
                                "update" => "#disks_avto_modification",
                                "data" => [
                                    "avto_model" => "js:$('#disks_avto_model').val()"
                                ],
                                "dataType" => "json",
                                "success" => "js:function(data){
                                    if(data.response == 1){
                                        $('#disks_avto_modification').html(data.text);
                                        $('#disks_avto_modification').removeAttr('disabled');
                                    }else{
                                        $('#disks_avto_modification').html('<option value=\'-1\'>-- выберите значение --</option>');
                                        $('#disks_avto_modification').attr('disabled', 'disabled');
                                    }
                                }",
                                "error" => "js:function(XHR, textStatus, errorThrown){
                                    $('#disks_avto_modification').html('<option value=\'-1\'>-- выберите значение --</option>');
                                    $('#disks_avto_modification').attr('disabled', 'disabled');
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
                        data=[-1 => "-- выберите значение --"]
                        htmlOptions=[
                            "id" => "disks_avto_modification",
                            "disabled" => "disabled"
                        ]
                }
            </div>
            <div class="form-actions disks_search_by_avto">
                <input class="form-submit" type="submit" value="Подобрать">
            </div>
        </div>
    </div>
</div>