<?php

class NewsController extends Controller
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

    public function filters(){
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }


	public function actionIndex()
	{
        $model = new News;
        $model->unsetAttributes();
        if($formData = Yii::app()->request->getParam('News')){
            $model->attributes = $formData;
        }
        //Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/bootstrap/scripts/admin/grid_checkbox.js', CClientScript::POS_END);
        $this->breadcrumbs = array("Новости");
        $this->render(
            'index',
            array(
                'model' => $model,
            )
        );
	}

    public function actionAdd()
    {
        $model = new News;
        $model->unsetAttributes();
        if($formData = Yii::app()->request->getParam('News')){
            $model->attributes = $formData;
            if($model->validate()){
                $model->translit = HtmlHelper::transliterate($model->title);
                $model->created = time();
                $model->edited = time();
                if($model->save()){
                    $this->redirect("/admin/news/index");
                }else{
                    throw new CHttpException(500, 'Ошибка сохранения новости');
                }
            }
        }
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/js/admin/news.js", CClientScript::POS_END);
        $this->breadcrumbs = array("Новости", "Добавление новости");
        $this->render(
            'edit',
            array(
                'model' => $model,
                'labels' => News::model()->attributeLabels()
            )
        );
    }

    public function actionEdit($id)
    {
        $model = News::model()->findByPk($id);
        if(!$model){
            throw new CHttpException(404, 'Новость не найдена');
        }
        if($formData = Yii::app()->request->getParam('News')){
            $model->attributes = $formData;
            if($model->validate()){
                $model->edited = time();
                $model->translit = HtmlHelper::transliterate($model->title);
                if($model->save()){
                    $this->redirect("/admin/news/index");
                }else{
                    throw new CHttpException(500, 'Ошибка сохранения новости');
                }
            }
        }
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/js/admin/news.js", CClientScript::POS_END);
        $this->breadcrumbs = array("Новости", "Добавление новости");
        $this->render(
            'edit',
            array(
                'model' => $model,
                'labels' => News::model()->attributeLabels()
            )
        );
    }

    public function actionDelete($id){
        $model = News::model()->findByPk((int)$id);
        if(!$model){
            throw new CHttpException(404, "Новость не найдена");
        }
        if($model->delete()){
            $this->redirect("/admin/news");
        }else{
            throw new CHttpException(500, 'Ошибка удаления новости');
        }
    }

}