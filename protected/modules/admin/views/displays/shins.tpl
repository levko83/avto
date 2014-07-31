<div class="default">
    {widget name='zii.widgets.grid.CGridView'
     id = "disksGrid"
     dataProvider = $model->search()
     filter = $model
     columns = [
        [
            'name' => 'id'
        ],
        [
            'name' => 'display_name',
            'type' => 'raw',
            'value' => 'CHtml::encode($data->display_name)'
        ],
        [
            'name' => 'minPrice',
            'type' => 'raw',
            'value' => '($v = ShinsDisplays::model()->returnMinPrice($data->id)) > 0 ? $v : ""'
        ],
        [
            'name' => 'actionPrice'
        ],
        [
            'name' => 'title',
            'type' => 'raw',
            'value' => 'CHtml::encode($data->title)'
        ],
        [
            'name' => 'display_description',
            'type' => 'raw',
            'value' => '$data->display_description'
        ],
        [
            'name' => 'meta_keywords',
            'type' => 'raw',
            'value' => 'CHtml::encode($data->meta_keywords)'
        ],
        [
            'name' => 'meta_description',
            'type' => 'raw',
            'value' => 'CHtml::encode($data->meta_description)'
        ],
        [
            'class' => 'CButtonColumn',
            'template' => '{update}',
            'updateButtonUrl' => 'Yii::app()->createUrl("/admin/displays/shins", array("id" => $data->id))'
        ]
     ]
    }
</div>

