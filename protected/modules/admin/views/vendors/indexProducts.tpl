<div class="default">
    {widget name='zii.widgets.grid.CGridView'
            id = "vendorsGrid"
            dataProvider = $model->search()
            filter = $model
            ajaxType = "POST"
            columns = [
                [
                    'name' => 'id',
                    'sortable' => false,
                    'filter' => false
                ],
                [
                    'name' => 'image',
                    'type' => 'html',
                    'value' => '!empty($data->image) ? "<img src=\"/images/{$data->type}_vendors/{$data->iconImg}\" alt=\"\">" :"no image"',
                    'sortable' => false,
                    'filter' => false
                ],
                [
                    'name' => 'vendor_name',
                    'type' => 'raw',
                    'value' => 'CHtml::encode($data->vendor_name)'
                ],
                [
                    'name' => 'description',
                    'type' => 'raw',
                    'value' => $data->description,
                    'sortable' => false,
                    'filter' => false
                ],
                [
                    'name' => 'title',
                    'type' => 'raw',
                    'value' => 'CHtml::encode($data->title)',
                    'sortable' => false,
                    'filter' => false
                ],
                [
                    'name' => 'meta_keywords',
                    'type' => 'raw',
                    'value' => 'CHtml::encode($data->meta_keywords)',
                    'sortable' => false,
                    'filter' => false
                ],
                [
                    'name' => 'meta_description',
                    'type' => 'raw',
                    'value' => 'CHtml::encode($data->meta_description)',
                    'sortable' => false,
                    'filter' => false
                ],
                [
                    'class' => 'CButtonColumn',
                    'template' => '{update}',
                    'updateButtonUrl' => 'Yii::app()->createUrl("admin/vendors/productsVendorsEdit", array("product_type" => $data->type == "drives" ? "disks" : "shins", "id" => $data->id))'
                ]
            ]
    }
</div>

