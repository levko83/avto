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
        $printLine = function($level){
            if($level == 1){
                return "--->";
            }
            $line = "";
            for($i = 0; $i < $level; $i++){
                $line .= "---";
            }
            return $line.">";
        };
		$this->render(
            'index',
            array(
                'model' => new CArrayDataProvider(
                                    array_map(
                                        function($v) use ($printLine){
                                            $v["printLine"] = $printLine;
                                            return $v;
                                        },
                                        Menu::getInstance()->getSitePages()
                                    ),
                                    array(
                                        'pagination' => array(
                                            'pageSize' => 100,
                                        ),
                                    )
                               ),
            )
        );
	}

    public function actionEdit($id){
        $page = Pages::model()->findByPk((int)$id);
        if(!$page){
            throw new CHttpException(404, "Страница не найдена");
        }
        $this->actionEditPage($page->id);
    }

    public function actionEditPage($id){
        $model = Pages::model()->findByPk((int)$id);
        if($model === null){
            throw new CHttpException(404, "Страница не найдена");
        }
        if(isset($_POST["Pages"])){
            $model->attributes = $_POST["Pages"];
            if($model->hasText == 0){
                $model->text = null;
            }
            if($model->save()){
                $this->redirect(array("/admin/pages/index"));
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


	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}