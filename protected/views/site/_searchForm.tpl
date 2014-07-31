<form action="{Yii::app()->createUrl("site/search")}" method="POST">
    <table style="width: 100%;">
        <tr>
            <td style="width: 50px;">Марка:</td>
            <td>
                {CHtml function="dropDownList"
                       name="avto_mark"
                       select=""
                       data=CHtml::listData(AvtoMarks::model()->findAll(), 'id', 'value')
                       htmlOptions=[
                            "empty" => "-- выберите марку автомобиля --",
                            "style" => "width: 40%;",
                            "id" => "avto_mark",
                            "ajax" => [
                                "type" => "POST",
                                "url" => Yii::app()->createUrl("site/dynamicAvtoMark"),
                                "update" => "#avto_model",
                                "data" => [
                                    "avto_mark" => "js:$('#avto_mark').val()"
                                ],
                                "success" => "js:function(data){
                                                $('#avto_model').html(data);
                                                $('#avto_model').removeAttr('disabled');
                                                $('#avto_modification').html('');
                                                $('#avto_modification').attr('disabled', 'disabled');
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
            <td>
        </tr>
        <tr>
            <td>Модель:</td>
            <td>
                {CHtml function="dropDownList"
                name="avto_model"
                select=""
                data=array()
                htmlOptions=[
                    "id" => "avto_model",
                    "style" => "width: 40%;",
                    "disabled" => "disabled",
                    "ajax" => [
                    "type" => "POST",
                    "url" => {Yii::app()->createUrl("site/dynamicAvtoModel")},
                    "update" => "#avto_modification",
                    "data" => [
                    "avto_model" => "js:$('#avto_model').val()"
                ],
                "success" => "js:function(data){
                $('#avto_modification').html(data);
                $('#avto_modification').removeAttr('disabled');
                $('#search').show();
                }",
                "error" => "js:function(XHR, textStatus, errorThrown){
                $('#avto_modification').html('');
                $('#avto_modification').attr('disabled', 'disabled');
                $('#search').hide();
                }"
                ]
                ]}
            </td>
        </tr>
        <tr>
            <td>Модификация:</td>
            <td>
                {CHtml function="dropDownList"
                    name="avto_modification"
                    select=""
                    data=array()
                    htmlOptions=[
                        "id" => "avto_modification",
                        "style" => "width: 40%;",
                        "disabled" => "disabled"
                ]}
            </td>
        </tr>
        <tr>
            <td colsan="2">
                {CHtml function="submitButton"
                    label="Подобрать"
                    htmlOptions=[
                        "id" => "search",
                        "style" => "display: none;"
                    ]}
            </td>
        </tr>
    </table>
</form>
