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
            'value' => '($v = DisksDisplays::model()->returnMinPrice($data->id)) > 0 ? $v : ""'
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
            'class' => 'CButtonColumn',
            'template' => '{update}',
            'updateButtonUrl' => 'Yii::app()->createUrl("/admin/displays/disks", array("id" => $data->id))'
        ]
     ]
    }
</div>

