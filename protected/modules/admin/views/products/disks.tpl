<div class="default">
    {widget name='zii.widgets.grid.CGridView'
            id = "disksGrid"
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
                    'name' => 'vendor_id',
                    'value' => '$data->vendor->vendor_name',
                    'filter' => CHtml::listData(DisksVendors::model()->findAll(), 'id', 'vendor_name')
                ],
                [
                   'name' => 'product_name'
                ],
                [
                    'name' => 'disks_fixture_port_count',
                    'value' => 'HtmlHelper::removeZero($data->disks_fixture_port_count)'
                ],
                [
                    'name' => 'disks_fixture_port_diametr',
                    'value' => 'HtmlHelper::removeZero($data->disks_fixture_port_diametr)'
                ],
                [
                    'name' => 'disks_boom',
                    'value' => 'HtmlHelper::removeZero($data->disks_boom)'
                ],
                [
                    'name' => 'disks_port_position',
                    'value' => 'HtmlHelper::removeZero($data->disks_port_position)'
                ],
                [
                    'name' => 'disks_weight',
                    'value' => 'HtmlHelper::removeZero($data->disks_weight)'
                ],
                [
                    'name' => 'disks_rim_width',
                    'value' => 'HtmlHelper::removeZero($data->disks_rim_width)'
                ],
                [
                    'name' => 'disks_rim_diametr',
                    'value' => 'HtmlHelper::removeZero($data->disks_rim_diametr)'
                ],
                [
                    'name' => 'disks_type_id',
                    'value' => '$data->disksType->value',
                    'filter' => CHtml::listData(DisksType::model()->findAll(), 'id', 'value')
                ],
                [
                    'name' => 'disks_material_id',
                    'value' => '$data->disksMaterial->value',
                    'filter' => CHtml::listData(DisksMaterial::model()->findAll(), 'id', 'value')
                ],
                [
                    'name' => 'disks_color'
                ],
                [
                    'name' => 'description',
                    'sortable' => 'false',
                    'filter' => false
                ],
                [
                     'name' => 'price'
                ],
                [
                     'name' => 'amount'
                ],
                [
                    'class' => 'CButtonColumn',
                    'template' => '{update}{delete}',
                    'buttons' => [
                        'update' => [
                            'url' => '"/admin/products/disks/edit/".$data->id'
                        ],
                        'delete' => [
                            'url' => '"/admin/products/disks/delete/".$data->id'
                        ]
                    ]
                ]
            ]
    }
    <div class="form-actions">
        <a class="btn blue" href="/admin/products/disks/edit">Новый диск</a>
    </div>
</div>
