<div class="default">
    {widget name='zii.widgets.grid.CGridView'
            id = "pagesGrid"
            dataProvider = $model
            columns = [
                [
                    'name' => 'label',
                    'type' => 'raw',
                    'value' => '$data["printLine"]($data["level"])." <b>".CHtml::encode($data["label"])."</b>"',
                    'filter' => false,
                    'sortable' => false
                ],
                [
                    'name' => 'text',
                    'type' => 'raw',
                    'value' => '$data["hasText"] == 0 ? "<b style=\"color: red;\">Это статическая страница</b>" : (!empty($data["text"]) ? substr($data["text"], 0, 50)."..." : "")',
                    'sortable' => false,
                    'filter' => false
                ],
                [
                    'name' => 'title',
                    'type' => 'raw',
                    'value' => 'CHtml::encode($data["title"])',
                    'sortable' => false,
                    'filter' => false
                ],
                [
                    'name' => 'meta_keywords',
                    'type' => 'raw',
                    'value' => '!empty($data["meta_keywords"]) ? substr($data["meta_keywords"], 0, 50)."..." : ""',
                    'sortable' => false,
                    'filter' => false
                ],
                [
                    'name' => 'meta_description',
                    'type' => 'raw',
                    'value' => '!empty($data["meta_description"]) ? substr($data["meta_description"], 0, 50)."..." : ""',
                    'sortable' => false,
                    'filter' => false
                ],
                [
                    'class' => 'CButtonColumn',
                    'template' => '{update}',
                    'updateButtonUrl' => 'Yii::app()->createUrl("/admin/pages/edit", array("id" => $data["id"]))'
                ]
            ]
    }
</div>

