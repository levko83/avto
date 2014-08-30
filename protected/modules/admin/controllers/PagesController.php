<?php

class PagesController extends Controller
{

    public $layout = 'application.modules.admin.views.layouts.layout';


    public function accessRules(){
        return array(
            array('allow',
                'roles' => array('administrator'),
            ),
            array('deny',
                'roles'=>array('guest'),
            ),
        );
    }

	public function actionIndex()
	{
        $this->breadcrumbs = array(
            CHtml::link("Страницы", array("/admin/pages/index")),
        );
		$this->render(
            'index',
            array(
                'model' => PagesSeo::model()->search()
            )
        );
	}

    public function actionEdit($id){
        $model = PagesSeo::model()->findByPk((int)$id);
        if(!$model){
            throw new CHttpException(404, "Страница не найдена");
        }
        if($model->hasTemplate == 1){
            $arr = unserialize($model->template_keywords);
        }
        if(isset($_POST["PagesSeo"])){
            $model->attributes = $_POST["PagesSeo"];
            if($model->validate()){
                if($model->hasText == 0){
                    $model->text = null;
                }
                if($model->save()){
                    $this->redirect(array("/admin/pages/index"));
                }
            }
        }
        $this->breadcrumbs = array(
            CHtml::link("Страницы", array("/admin/pages/index")),
            CHtml::link($model->label, array("/admin/pages/edit", "id" => $model->id)),
        );
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/js/admin/pages.js", CClientScript::POS_END);
        $this->render(
            "edit",
            array(
                "model" => $model,
            )
        );

    }

}