<?php

class LoginController extends Controller
{

    public $layout = 'application.modules.admin.views.layouts.login';

    public function actionError(){
        if($error=Yii::app()->errorHandler->error){
            if(Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else{
                $this->layout = 'application.modules.admin.views.layouts.layout';
                $this->breadcrumbs=array(
                    'Ошибка',
                );
                Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/bootstrap/css/pages/error.css');
                $this->render('error', $error);
            }
        }else{
            $this->redirect("/admin");
        }
    }

    public function actionLogin()
	{
        $model = new LoginForm;
        if($loginData = Yii::app()->request->getPost("LoginForm")){
            $model->attributes = $loginData;
            if($model->validate() and $model->login()){
                $this->saveUserInfoInSession();
                $this->redirect("/admin");
            }
        }else{
            // если залогинен, то переходим в админку
            if(!Yii::app()->user->isGuest){
                $this->redirect("/admin");
            }
            // если заблокировн, то переходим на страницу разблокировки
            if(Yii::app()->user->isGuest and isset(Yii::app()->session["user_uid"])){
                //$this->redirect("/admin/login/lock");
                $this->redirect("lock");
            }
        }
 		$this->render('login', array("model" => $model));
	}

    public function actionLogout(){
        Yii::app()->user->logout();
        $this->redirect("login");
    }

    public function actionLock(){
        $this->layout = 'application.modules.admin.views.layouts.lock';
        $model = new LoginForm;
        if($loginData = Yii::app()->request->getPost("LoginForm")){
            $model->attributes = $loginData;
            $model->login = Yii::app()->session["user_login"];
            if(isset(Yii::app()->session["user_remember"])){
                $model->remember = 1;
            }else{
                $model->remember = 0;
            }
            if($model->validate() and $model->login()){
                $this->redirect("/admin");
            }
        }else{
            // если аноним, то переходи на страницу авторизации
            if(Yii::app()->user->isGuest and !isset(Yii::app()->session["user_uid"])){
                $this->redirect("/admin");
            }
            Yii::app()->user->logout(false);
        }
        $this->render('lock', array("model" => $model));
    }



    private function saveUserInfoInSession(){
        $user = Users::model()->findByPk(Yii::app()->user->id);
        Yii::app()->session["user_uid"] = $user->id;
        Yii::app()->session["user_login"] = $user->login;
        Yii::app()->session["user_fio"] = $user->fio;
        //if(Yii::app()->user->role == "administrator" or Yii::app()->user->role == "root"){
        if(Yii::app()->user->checkAccess('root')){
            Yii::app()->session["is_dumper"] = 1;
        }
    }
}