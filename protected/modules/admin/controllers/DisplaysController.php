<?php

class DisplaysController extends Controller
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

	public function actionDisks($id = null)
	{
        if($id){
            $model = DisksDisplays::model()->findByPk((int)$id);
            if(!$model){
                throw new CHttpException("404", "Страница не найдена");
            }
            if($data = Yii::app()->request->getPost("DisksDisplays")){
                $model->attributes = $data;
                $model->editing = 1;
                if($model->validate()){
                    $title = trim($model->title) == "" ? $model->display_name : $model->title;
                    $model->title = $title;
                    //$model->translit = HtmlHelper::transliterate(trim($title));
                    if($model->save()){
                        $this->redirect("/admin/displays/disks");
                    }else{
                        throw new CHttpException(500, "Ошибка сохранения дисплея");
                    }
                }
            }else{
                if(empty($model->title)){
                    $model->title = $model->display_name;
                }
            }
            $sql = "SELECT d.imageName as imageName
                FROM disks_images d
                WHERE d.disks_id IN (
                    SELECT dp.id
                    FROM disks dp
                    WHERE dp.disks_display_id = :pid
                ) and d.typeImage = 2
                GROUP BY d.imageName";
            $command = Yii::app()->db->createCommand($sql);
            $command->bindParam(":pid", $id, PDO::PARAM_INT);
            $images = $command->queryAll();
            Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/js/admin/display_disks_edit.js", CClientScript::POS_END);
            $this->breadcrumbs = array("Магазин", "Дисплеи", "Диски", "Диски {$model->display_name}");
            $this->render(
                "disks_edit",
                array(
                    "model" => $model,
                    'labels' => DisksDisplays::model()->attributeLabels(),
                    'images' => $images,
                )
            );
        }else{
            $model = new DisksDisplays;
            $model->unsetAttributes();
            if($formData = Yii::app()->request->getParam('DisksDisplays')){
                $model->attributes = $formData;
            }
            $this->breadcrumbs = array("Магазин", "Дисплеи", "Диски");
            $this->render(
                'disks',
                array(
                    'model' => $model,
                )
            );
        }
	}

    public function actionShins($id = null)
    {
        if($id){
            $model = ShinsDisplays::model()->findByPk((int)$id);
            if(!$model){
                throw new CHttpException("404", "Страница не найдена");
            }
            if($data = Yii::app()->request->getPost("ShinsDisplays")){
                $model->attributes = $data;
                $model->editing = 1;
                if($model->validate()){
                    $title = trim($model->title) == "" ? $model->display_name : $model->title;
                    $model->title = $title;
                    //$model->translit = HtmlHelper::transliterate(trim($title));
                    if($model->save()){
                        $this->redirect("/admin/displays/shins");
                    }else{
                        throw new CHttpException(500, "Ошибка сохранения дисплея");
                    }
                }
            }
            $sql = "SELECT d.imageName as imageName
                FROM shins_images d
                WHERE d.shins_id IN (
                    SELECT dp.id
                    FROM shins dp
                    WHERE dp.shins_display_id = :pid
                ) and d.typeImage = 2
                GROUP BY d.imageName";
            $command = Yii::app()->db->createCommand($sql);
            $command->bindParam(":pid", $id, PDO::PARAM_INT);
            $images = $command->queryAll();
            Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/js/admin/display_shins_edit.js", CClientScript::POS_END);
            $this->breadcrumbs = array("Магазин", "Дисплеи", "Шины", "Шины {$model->display_name}");
            $this->render(
                "shins_edit",
                array(
                    "model" => $model,
                    'labels' => ShinsDisplays::model()->attributeLabels(),
                    'images' => $images,
                )
            );
        }else{
            $model = new ShinsDisplays;
            $model->unsetAttributes();
            if($formData = Yii::app()->request->getParam('ShinsDisplays')){
                $model->attributes = $formData;
            }
            $this->breadcrumbs = array("Магазин", "Дисплеи", "Шины");
            $this->render(
                'shins',
                array(
                    'model' => $model,
                )
            );
        }
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