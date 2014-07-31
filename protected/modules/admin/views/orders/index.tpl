<div class="row-fluid">
    <div class="span12">
        {widget name='zii.widgets.grid.CGridView'
         id = "ordersGrid"
         dataProvider = $model->search()
         filter = $model
         afterAjaxUpdate = 'function(){
                               $.datepicker.setDefaults($.datepicker.regional["ru"]);
                               $.datepicker.setDefaults({dateFormat: "dd/mm/yy"});
                               $("#Orders_addtime").datepicker();
                           }'
         columns = [
            "id",
            [
                name => "status_id",
                value => 'OrderStatuses::model()->findByPk($data->status_id)->status',
                header => "Статус",
                filter => CHtml::listData(OrderStatuses::model()->findAll("id > 1"), 'id', 'status')
            ],
            [
                name => "fio",
                header => "ФИО"
            ],
            [
                name => "phone",
                header => "Телефон"
            ],
            [
                name => "region",
                header => "Область"
            ],
            [
                name => "city",
                header => "Город"
            ],
            [
                name => "district",
                header => "Район"
            ],
            [
                name => "street",
                header => "Улица"
            ],
            [
                name => "house_flat",
                header => "Дом/кв"
            ],
            [
                name => "delivary_id",
                header => "Способ доставки",
                value => 'OrderDeliverys::model()->findByPk($data->delivary_id)->delivery',
                filter => CHtml::listData(OrderDeliverys::model()->findAll(), 'id', 'delivery')
            ],
            [
                name => "declaration",
                header => "Декларация"
            ],
            [
                name => "sum",
                value => 'round($data->sum)',
                header => "Сумма, грн"
            ],
            [
                name => "amount",
                value => '$data->amount',
                header => "Кол-во"
            ],
            [
                name => "addtime",
                value => 'date("d/m/Y H:i", $data->orderHistorys[0]->addtime)',
                header => "Дата",
                'filter' => {widget name="zii.widgets.jui.CJuiDatePicker"
                    model = $model
                    attribute = addtime
                    options = ['dateFormat' => 'dd/mm/yy']
                    language = ru
                }
            ],
            [
                'class' => 'CButtonColumn',
                'template' => '{update}',
                'updateButtonUrl' => 'Yii::app()->createUrl("/admin/orders/edit", array("id" => $data->id))'
            ]
        ]
       }
    </div>
    <a class="btn blue" href="{Yii::app()->createUrl('/admin/orders/add')}">Добавить заказ</a>
</div>