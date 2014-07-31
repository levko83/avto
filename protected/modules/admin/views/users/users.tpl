<h3 class="block">Пользователи</h3>
<div class="default">
    {widget name='zii.widgets.grid.CGridView'
    id = "usersGrid"
    dataProvider = $model->view()
    rowCssClassExpression = $rowCssClassExpression
    filter = $model
    columns = [
        ['name' => 'id'],
        ['name' => 'fio'],
        ['name' => 'login'],
        [
            'name' => 'role_id',
            'value' => '$data->roles->role_description',
            'filter' => CHtml::listData(Roles::model()->findAll('id > 1'), 'id', 'role_description')
        ],
        ['name' => 'post'],
        ['name' => 'email'],
        [
            'name' => 'banned',
            'value' => '$data->banned == 0 ? "Активен" : "Заблокирован"',
            'filter' => [0 => 'Активен', 1 => 'Заблокирован']
        ],
        [
            'class' => 'CButtonColumn',
            'template' => '{update}{delete}',
            'deleteConfirmation' => 'Вы действительно хотите удалить пользователя?',
            'updateButtonUrl' => 'Yii::app()->createUrl("/admin/users/edit", array("id" => $data->id))',
            'deleteButtonUrl' => 'Yii::app()->createUrl("/admin/users/delete", array("id" => $data->id))',
            'afterDelete' => 'function(link,success,data){
                                  if(success){
                                      window.location = "/admin/users";
                                  }
                              }'
        ]
    ]
    }
</div>
<a class="btn blue" href="{Yii::app()->createUrl('/admin/users/edit')}">Новый пользователь</a>