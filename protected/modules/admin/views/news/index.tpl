<h3 class="block">Новости</h3>
<div class="default">
    {widget name='zii.widgets.grid.CGridView'
        id = "newsGrid"
        dataProvider = $model->search()
        selectableRows = 2
        filter = $model
        afterAjaxUpdate = 'function(){
                              $.datepicker.setDefaults($.datepicker.regional["ru"]);
                              $.datepicker.setDefaults({dateFormat: "dd/mm/yy"});
                              $("#News_created").datepicker();
                              $("#News_edited").datepicker();
                           }'
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
                    ['name' => 'title'],
                    [
                      'name' => 'short',
                      'type' => 'raw',
                      'sortable' => 'false'
                    ],
                    [
                      'name' => 'body',
                      'type' => 'raw',
                      'sortable' => 'false'
                    ],
                    [
                      'name' => 'search_keywords',
                      'sortable' => 'false'
                    ],
                    [
                      'name' => 'search_description',
                      'sortable' => 'false'
                    ],
                    [
                       'name' => 'created',
                       'value' => 'date("d/m/Y H:i", $data->created)',
                       'filter' => {widget name="zii.widgets.jui.CJuiDatePicker"
                                           model = $model
                                           attribute = created
                                           options = ['dateFormat' => 'dd/mm/yy']
                                           language = ru
                                   }
                    ],
                    [
                       'name' => 'edited',
                       'value' => 'date("d/m/Y H:i", $data->edited)',
                       'filter' => {widget name="zii.widgets.jui.CJuiDatePicker"
                                           model = $model
                                           attribute = edited
                                           options = ['dateFormat' => 'dd/mm/yy']
                                           language = ru
                                   }
                    ],
                    [
                      'name' => 'published',
                      'value' => '$data->published == 1 ? "Да" : "Нет"',
                      'filter' => [1 => 'Да', 0 => 'Нет']
                    ],
                    [
                        'class' => 'CButtonColumn',
                        'template' => '{update}{delete}',
                        'deleteConfirmation' => 'Вы действительно хотите удалить новость?',
                        'updateButtonUrl' => 'Yii::app()->createUrl("/admin/news/edit", array("id" => $data->id))',
                        'deleteButtonUrl' => 'Yii::app()->createUrl("/admin/news/delete", array("id" => $data->id))',
                        'afterDelete' => 'function(link,success,data){
                                  if(success){
                                      window.location = "/admin/news";
                                  }
                              }'

                    ]
                ]
        }
</div>
<a class="btn blue" href="{Yii::app()->createUrl('/admin/news/add')}">Добавить новость</a>
