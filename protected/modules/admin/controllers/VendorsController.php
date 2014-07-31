<?php

class VendorsController extends Controller
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
        $model = new AvtoMarks;
        $model->unsetAttributes();
        if(isset($_POST["AvtoMarks"])){
            $model->attributes = $_POST["AvtoMarks"];
        }
        $this->breadcrumbs = array(
            "Магазин",
            CHtml::link("Производители", array("/admin/vendors/index")),
        );
		$this->render(
            "index",
            array(
                "model" => $model,
            )
        );
	}

    public function actionEdit($id){
        $model = AvtoMarks::model()->findByPk((int)$id);
        if($model === null){
            throw new CHttpException(404, "Страница не найдена");
        }
        if(isset($_POST["AvtoMarks"])){
            $model->attributes = $_POST["AvtoMarks"];
            $logoImg = CUploadedFile::getInstance($model,'image');
            if($logoImg->name){
                $model->image = "{$model->id}.jpg";
            }else{
                $delImg = (int)$model->delImg;
                if($delImg == 1){
                    $model->image = NULL;
                }
            }
            if($model->save()){
                $path = Yii::getPathOfAlias("webroot.images.vendors");
                if($logoImg->name){
                    $logoImg->saveAs("{$path}/{$model->id}.jpg");
                    HtmlHelper::resizeImage("{$model->id}.jpg", 75, 75, $path);
                }else{
                    $delImg = (int)$model->delImg;
                    if($delImg == 1){
                        $full = "{$path}.{DIRECTORY_SEPARATOR}.{$model->id}.jpg";
                        unlink($path.DIRECTORY_SEPARATOR."{$model->id}.jpg");
                        foreach(glob($path.DIRECTORY_SEPARATOR."{$model->id}_*.jpg") as $filename) {
                          unlink($filename);
                        }
                    }
                }
            }
        }
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/js/admin/vendors.js", CClientScript::POS_END);
        $this->breadcrumbs = array(
            "Магазин",
            CHtml::link("Производители", array("/admin/vendors/index")),
            CHtml::link($model->value, array("/admin/vendors/edit", "id" => $model->id)),
        );
        $this->render(
            "edit",
            array(
                "model" => $model,
            )
        );
    }

    public function actionProductsVendorsIndex($product_type){
        switch($product_type){
            case "shins":
                $className = "ShinsVendors";
                break;
            case "disks":
                $className = "DisksVendors";
                break;
            default:
                throw new CHttpException(404, "Страница не найдена");
        }
        $model = new $className;
        $model->unsetAttributes();
        if(isset($_POST[$className])){
            $model->attributes = $_POST[$className];
        }
        $breadCrumbsSuffix = $product_type == "shins" ? "шин" : "дисков";
        $this->breadcrumbs = array(
            "Магазин",
            "Производители {$breadCrumbsSuffix}"
        );
        $this->render(
            "indexProducts",
            array(
                "model" => $model,
            )
        );
    }

    public function actionProductsVendorsEdit($product_type, $id){
        switch($product_type){
            case "shins":
                $className = "ShinsVendors";
                break;
            case "disks":
                $className = "DisksVendors";
                break;
            default:
                throw new CHttpException(404, "Страница не найдена");
                break;
        }
        $model = $className::model()->findByPk((int)$id);
        if($model === null){
            throw new CHttpException(404, "Страница не найдена");
        }
        if(isset($_POST[$className])){
            $model->attributes = $_POST[$className];
            $logoImg = CUploadedFile::getInstance($model,'image');
            if($logoImg->name){
                $model->image = "{$model->id}.jpg";
            }else{
                $delImg = (int)$model->delImg;
                if($delImg == 1){
                    $model->image = NULL;
                }
            }
            if($model->save()){
                $path = Yii::getPathOfAlias("webroot.images.{$model->type}_vendors");
                if($logoImg->name){
                    $logoImg->saveAs("{$path}/{$model->id}.jpg");
                    HtmlHelper::resizeImage("{$model->id}.jpg", 75, 75, $path);
                }else{
                    $delImg = (int)$model->delImg;
                    if($delImg == 1){
                        $full = "{$path}.{DIRECTORY_SEPARATOR}.{$model->id}.jpg";
                        unlink($path.DIRECTORY_SEPARATOR."{$model->id}.jpg");
                        foreach(glob($path.DIRECTORY_SEPARATOR."{$model->id}_*.jpg") as $filename) {
                            unlink($filename);
                        }
                    }
                }
                $redirect_suffix = $model->type == "tires" ? "shins" : "disks";
                $this->redirect("/admin/{$redirect_suffix}_vendors");
            }
        }
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/js/admin/vendors.js", CClientScript::POS_END);
        $breadCrumbsSuffix = $product_type == "shins" ? "шин" : "дисков";
        $this->breadcrumbs = array(
            "Магазин",
            "Производители {$breadCrumbsSuffix}",
            $model->vendor_name
        );
        $this->render(
            $model->type == "drives" ? "editDisksVendor" : "editShinsVendor",
            array(
                "model" => $model,
            )
        );
    }





}