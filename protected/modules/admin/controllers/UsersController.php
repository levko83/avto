<?php

class UsersController extends Controller
{

    public $layout = 'application.modules.admin.views.layouts.layout';

    public function accessRules(){
        return array(
            array('allow',
                  'roles' => array('administrator'),
            ),
            array('allow',
                  'actions' => array('changePass'),
                  'users' => array('@'),
            ),
            array('deny',
                'roles'=>array('guest'),
            ),
        );
    }

    public function filters(){
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    public function actionIndex()
	{
        $model = new Users('view');
        $model->unsetAttributes();
        if($formData = Yii::app()->request->getParam('Users')){
            $model->attributes = $formData;
        }
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl."/css/admin/users.css");
        $this->breadcrumbs = array("Пользователи");
        $this->render(
            'users',
            array(
                'model' => $model,
                'rowCssClassExpression' => function($row, $data){
                                               $class = $row%2 ? "even" : "odd";
                                               if($data->banned == 1)
                                                   return "$class banned";
                                               else
                                                   return $class;
                                           }
            )
        );
	}

    public function actionEdit($id = null){
        // редактирование пользователя
        if($id){
            $model = Users::model()->findByPk((int)$id);
            if(!$model){
                throw new CHttpException(404, "Пользователь не найден");
            }
            $model->scenario = "edit";
            $view = "edit";
        }else{ // новый пользователь
            $model = new Users('add');
            $view = "add";
        }
        if($data = Yii::app()->request->getPost('Users')){
            $model->attributes = $data;
            if($model->scenario == "add" and $model->validate()){
                $model->password = md5($model->password);
                $model->password_confirm = md5($model->password_confirm);
            }
            if($model->save()){
                $this->redirect("/admin/users");
            }
        }
        $this->render(
            $view,
            array(
                'model' => $model,
                'labels' => Users::model()->attributeLabels(),
            )
        );
    }

    public function actionDelete($id){
        $model = Users::model()->findByPk((int)$id);
        if(!$model){
            throw new CHttpException(404, "Пользователь не найден");
        }
        if($model->id == 0){
            $this->redirect("/admin/users/index");
        }
        $uid = Yii::app()->user->id;
        if($id == Yii::app()->user->id){
            $this->redirect("/admin/users/index");
        }
        if($model->delete()){
            $this->redirect("/admin/users/index");
        }else{
            throw new CHttpException(500, "Ошибка удаления пользователя");
        }
    }

    public function actionChangePass(){
        $id = Yii::app()->user->id;
        $model = Users::model()->findByPk(Yii::app()->user->id);
        $model->scenario = "change_pass";
        if($data = Yii::app()->request->getPost('Users')){
            $model->attributes = $data;
            if($model->validate()){
                $model->password = md5($model->password);
                $model->password_confirm = md5($model->password_confirm);
            }
            if($model->save()){
                $this->redirect("/admin");
            }
        }
        $this->render(
            "changePass",
            array(
                'model' => $model,
                'labels' => Users::model()->attributeLabels(),
            )
        );
    }


}