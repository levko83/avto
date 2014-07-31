<div class="default">
    {widget name='zii.widgets.grid.CGridView'
            id = "shinsGrid"
            dataProvider = $model->getTable()
            selectableRows = 2
            filter = $model
            columns = [
                [
                    'class' => 'CCheckBoxColumn',
                    'value' => '$data->id',
                    'checkBoxHtmlOptions' => [
                        'name' => 'idList[]'
                    ]
                ],
                [
                    'name' => 'id'
                ],
                [
                   'name' => 'product_name'
                ],
                [
                   'name' => 'vendor_id',
                   'value' => '$data->vendor->vendor_name',
                   'filter' => CHtml::listData(ShinsVendors::model()->findAll(), 'id', 'vendor_name')
                ],
                [
                    'name' => 'shins_type_of_avto_id',
                    'value' => '$data->shinsTypeOfAvto->value',
                    'filter' => CHtml::listData(ShinsTypeOfAvto::model()->findAll("id > 1"), 'id', 'value')
                ],
                [
                    'name' => 'shins_season_id',
                    'value' => '$data->shinsSeason->value',
                    'filter' => CHtml::listData(ShinsSeason::model()->findAll("id > 1"), 'id', 'value')
                ],
                [
                    'name' => 'shins_profile_width',
                    'value' => 'HtmlHelper::removeZero($data->shins_profile_width)'
                ],
                [
                    'name' => 'shins_profile_height',
                    'value' => 'HtmlHelper::removeZero($data->shins_profile_height)'
                ],
                [
                    'name' => 'shins_diametr',
                    'value' => 'HtmlHelper::removeZero($data->shins_diametr)'
                ],
                [
                    'name' => 'shins_speed_index_id',
                    'value' => '$data->shinsSpeedIndex->value',
                    'filter' => CHtml::listData(ShinsSpeedIndex::model()->findAll("id > 1"), 'id', 'value')
                ],
                [
                    'name' => 'shins_load_index'
                ],
                [
                    'name' => 'shins_run_flat_technology_id',
                    'value' => '$data->shinsRunFlatTechnology->value',
                    'filter' => CHtml::listData(VocabularyAvailability::model()->findAll("id > 1"), 'id', 'value')
                ],
                [
                    'name' => 'shins_spike_id',
                    'value' => '$data->shinsSpike->value',
                    'filter' => CHtml::listData(VocabularyAvailability::model()->findAll("id > 1"), 'id', 'value')
                ],
                [
                    'name' => 'description',
                    'sortable' => 'false',
                    'filter' => false
                ],
                [
                     'name' => 'price',
                     'value' => '$data->price ? round($data->price) : ""'
                ],
                [
                     'name' => 'amount'
                ],
                [
                    'class' => 'CButtonColumn',
                    'template' => '{update}{delete}',
                    'buttons' => [
                        'update' => [
                            'url' => '"/admin/products/shins/edit/".$data->id'
                        ],
                        'delete' => [
                            'url' => '"/admin/products/shins/delete/".$data->id'
                        ]
                    ]
                ]
            ]
    }
    <div class="form-actions">
        <a class="btn blue" href="/admin/products/shins/edit">Новая шина</a>
    </div>
</div>
