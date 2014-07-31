<?php

class ProductsController extends Controller
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


    public function actionLogin()
    {
        $this->render('index');
    }

	public function actionIndex()
	{
        $this->render('index');
	}

    private function getImages($images, $one = false){
        $arr = explode("|", trim($images));
        if($one)
            return $arr[0];
        else
            return $arr;
    }

    public function actionShins()
    {
        $model = new Shins('getTable');
        $model->unsetAttributes();
        if($formData = Yii::app()->request->getParam('Shins')){
            $model->attributes = $formData;
        }
        $this->breadcrumbs = array("Магазин", "Товары", "Шины");
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/bootstrap/scripts/admin/grid_checkbox.js', CClientScript::POS_END);
        $this->render(
            'shins',
            array(
                'model' => $model,
                'imgUrl' => Yii::getPathOfAlias("webroot.images.products.shins")."/",
            )
        );
    }

    public function actionDisks()
    {
        $model = new Disks('getTable');
        $model->unsetAttributes();
        if($formData = Yii::app()->request->getParam('Disks')){
            $model->attributes = $formData;
        }
        $this->breadcrumbs = array("Магазин", "Товары", "Диски");
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/bootstrap/scripts/admin/grid_checkbox.js', CClientScript::POS_END);
        $this->render(
            'disks',
            array(
                'model' => $model,
                'imgUrl' => Yii::getPathOfAlias("webroot.images.products.disks")."/",
            )
        );
    }

    // редактирование шин
    public function actionUpdateShins($id = null){
        // если редактирование шины
        if($id){
            $model = Shins::model()->findByPk((int)$id);
            if(!$model){
                throw new CHttpException(404, "Страница не найдена");
            }
            $isNewShina = false;
        }else{
            $model = new Shins;
            $isNewShina = true;
        }
        if(isset($_POST["Shins"])){
            $model->attributes = $_POST["Shins"];
            $model->shinsImages = CUploadedFile::getInstances($model, 'shinsImages');
            if($model->validate()){
                $display_name = $model->displayString;
                //ищем дисплей, куда попадает шина, если его нет, то создаем его
                $criteria = new CDbCriteria;
                $criteria->addCondition("UPPER(display_name) = '".strtoupper($display_name)."'");
                $display = ShinsDisplays::model()->find($criteria);
                if($display){
                    $model->shins_display_id = $display->id;
                }else{
                    $display = new ShinsDisplays;
                    $display->display_name = $display_name;
                    $display->title = $display_name;
                    $display->translit = HtmlHelper::transliterate($display_name);
                    $model->shins_display_id = $model->save(false);
                }
                $transaction = Yii::app()->db->beginTransaction();
                try{
                    if(!$model->save()){
                        throw new Exception("Ошибка сохранения шины!");
                    }
                    //проверка удаления картинок при редактировании
                    $imagesPath = Yii::getPathOfAlias('webroot.images.products.shins');
                    if(is_array($model->delImage) and count($model->delImage) > 0){
                        $delImages = array_filter($model->delImage, function($v){ return $v == 1; });
                        // если картинки удалялись
                        if(count($delImages) > 0){
                            $ids = array_map(function($v){return (int)$v; }, array_keys($delImages));
                            // получаем картинки, которые только можно удалить с сервера(они принадлежат только этой шине)
                            $data = Yii::app()->db->createCommand()
                                        ->select("s.id, s.imageName, (SELECT count(*) FROM shins_images WHERE imageName = s.imageName) as cnt")
                                        ->from("shins_images s")
                                        ->where(
                                            array(
                                                "AND",
                                                "s.shins_id = :p1",
                                                array("IN", "s.id", $ids)
                                            ),
                                            array(":p1" => $model->id)
                                        )
                                        ->having("cnt = 1")
                                        ->queryAll();
                            foreach($data as $item){
                                list($fn, $ext) = explode(".", $item["imageName"]);
                                foreach(glob($imagesPath.DIRECTORY_SEPARATOR."{$fn}*.{$ext}") as $filename) {
                                    unlink($filename);
                                }
                            }
                            $criteria = new CDbCriteria;
                            $criteria->compare("shins_id", $model->id);
                            $criteria->addInCondition("id", $ids);
                            ShinsImages::model()->deleteAll($criteria);
                        }
                    }
                    $imagesCount = count($model->images);
                    foreach($model->shinsImages as $newImage){
                        $imgModel = new ShinsImages;
                        $newImgNom = DbHelper::getNewId($imgModel);
                        $newImgFileName = "100{$model->id}{$newImgNom}.jpg";
                        if($newImage->saveAs($imagesPath.DIRECTORY_SEPARATOR.$newImgFileName)){
                            $newImagesArray[] = $newImgFileName;
                            $imgModel->shins_id = $model->id;
                            $imgModel->imageName = $newImgFileName;
                            $imgModel->typeImage = 3;
                            $imgModel->shins_display_id = $model->shins_display_id;
                            if(!$imgModel->save()){
                                throw new Exception("Ошибка сохранения изображения шины в базу данных!");
                            }
                        }else{
                            throw new Exception("Ошибка сохранения изображения шины на сервер!");
                        }
                    }
                    $transaction->commit();
                    $this->redirect("/admin/products/shins");
                }catch(Exception $e){
                    $transaction->rollback();
                    if(is_array($newImagesArray) and count($newImagesArray) > 0){
                        foreach($newImagesArray as $imgName){
                            unlink($imagesPath.DIRECTORY_SEPARATOR.$imgName);
                        }
                    }
                    $error = $e->getMessage();
                }
            }
        }

        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/admin/products.js', CClientScript::POS_END);
        $this->breadcrumbs = array("Магазин", "Товары", CHtml::link("Шины", array("/admin/products/shins")), "Шина {$model->product_name}");
        $this->render(
            'shinsUpdate',
            array(
                'id' => $id,
                'model' => $model,
                'display' => $display->id,
            )
        );
    }

    // редактирование дисков
    public function actionUpdateDisks($id = null){
        // если редактирование шины
        if($id){
            $model = Disks::model()->findByPk((int)$id);
            if(!$model){
                throw new CHttpException(404, "Страница не найдена");
            }
            $isNewDisk = false;
        }else{
            $model = new Disks;
            $isNewDisk = true;
        }
        if(isset($_POST["Disks"])){
            $model->attributes = $_POST["Disks"];
            $model->disksImages = CUploadedFile::getInstances($model, 'disksImages');
            if($model->validate()){
                $display_name = $model->displayString;
                //ищем дисплей, куда попадает диск, если его нет, то создаем его
                $criteria = new CDbCriteria;
                $criteria->addCondition("UPPER(display_name) = '".strtoupper($display_name)."'");
                $display = DisksDisplays::model()->find($criteria);
                if($display){
                    $model->disks_display_id = $display->id;
                }else{
                    $display = new DisksDisplays;
                    $display->display_name = $display_name;
                    $display->title = $display_name;
                    $display->translit = HtmlHelper::transliterate($display_name);
                    $model->disks_display_id = $model->save(false);
                }
                $transaction = Yii::app()->db->beginTransaction();
                try{
                    if(!$model->save()){
                        throw new Exception("Ошибка сохранения диска!");
                    }
                    //проверка удаления картинок при редактировании
                    $imagesPath = Yii::getPathOfAlias('webroot.images.products.disks');
                    if(is_array($model->delImage) and count($model->delImage) > 0){
                        $delImages = array_filter($model->delImage, function($v){ return $v == 1; });
                        // если картинки удалялись
                        if(count($delImages) > 0){
                            $ids = array_map(function($v){return (int)$v; }, array_keys($delImages));
                            // получаем картинки, которые только можно удалить с сервера(они принадлежат только этой шине)
                            $data = Yii::app()->db->createCommand()
                                ->select("d.id, d.imageName, (SELECT count(*) FROM disks_images WHERE imageName = d.imageName) as cnt")
                                ->from("disks_images d")
                                ->where(
                                    array(
                                        "AND",
                                        "d.disks_id = :p1",
                                        array("IN", "d.id", $ids)
                                    ),
                                    array(":p1" => $model->id)
                                )
                                ->having("cnt = 1")
                                ->queryAll();
                            foreach($data as $item){
                                list($fn, $ext) = explode(".", $item["imageName"]);
                                foreach(glob($imagesPath.DIRECTORY_SEPARATOR."{$fn}*.{$ext}") as $filename) {
                                    unlink($filename);
                                }
                            }
                            $criteria = new CDbCriteria;
                            $criteria->compare("disks_id", $model->id);
                            $criteria->addInCondition("id", $ids);
                            DisksImages::model()->deleteAll($criteria);
                        }
                    }
                    $imagesCount = count($model->images);
                    foreach($model->disksImages as $newImage){
                        $imgModel = new DisksImages;
                        $newImgNom = DbHelper::getNewId($imgModel);
                        $newImgFileName = "100{$model->id}{$newImgNom}.jpg";
                        if($newImage->saveAs($imagesPath.DIRECTORY_SEPARATOR.$newImgFileName)){
                            $newImagesArray[] = $newImgFileName;
                            $imgModel->disks_id = $model->id;
                            $imgModel->imageName = $newImgFileName;
                            $imgModel->typeImage = 3;
                            $imgModel->disks_display_id = $model->disks_display_id;
                            if(!$imgModel->save()){
                                throw new Exception("Ошибка сохранения изображения диска в базу данных!");
                            }
                        }else{
                            throw new Exception("Ошибка сохранения изображения диска на сервер!");
                        }
                    }
                    $transaction->commit();
                    $this->redirect("/admin/products/disks");
                }catch(Exception $e){
                    $transaction->rollback();
                    if(is_array($newImagesArray) and count($newImagesArray) > 0){
                        foreach($newImagesArray as $imgName){
                            unlink($imagesPath.DIRECTORY_SEPARATOR.$imgName);
                        }
                    }
                    $model->addError("disksImages", $e->getMessage());
                }
            }
        }
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/admin/products.js', CClientScript::POS_END);
        $this->breadcrumbs = array("Магазин", "Товары", CHtml::link("Диски", array("/admin/products/disks")), "Диск {$model->product_name}");
        $this->render(
            'disksUpdate',
            array(
                'id' => $id,
                'model' => $model,
                'display' => $display->id,
            )
        );
    }

    // удаление шин
    public function actionDeleteShins($id = null){
        $model = Shins::model()->findByPk((int)$id);
        if(!$model){
            throw new CHttpException(404, "Страница не найдена");
        }
        $transaction = Yii::app()->db->beginTransaction();
        try{
            $criteria = new CDbCriteria;
            $criteria->compare("shins_id", $model->id);
            ShinsImages::model()->deleteAll($criteria);
            Shins::model()->deleteByPk($model->id);
            $transaction->commit();
            $this->redirect("/admin/products/shins");
        }catch(Exception $e){
            $transaction->rollback();
            throw new CHttpException(500, "Ошибка удаления шины");
        }
    }

    // удаление дисков
    public function actionDeleteDisks($id = null){
        $model = Disks::model()->findByPk((int)$id);
        if(!$model){
            throw new CHttpException(404, "Страница не найдена");
        }
        $transaction = Yii::app()->db->beginTransaction();
        try{
            $criteria = new CDbCriteria;
            $criteria->compare("disks_id", $model->id);
            DisksImages::model()->deleteAll($criteria);
            Disks::model()->deleteByPk($model->id);
            $transaction->commit();
            $this->redirect("/admin/products/disks");
        }catch(Exception $e){
            $transaction->rollback();
            throw new CHttpException(500, "Ошибка удаления диска");
        }
    }

    public function actionWork(){
        $from = Yii::getPathOfAlias("webroot.images.temp.disks").DIRECTORY_SEPARATOR;
        $to = Yii::getPathOfAlias("webroot.images.products.disks").DIRECTORY_SEPARATOR;
        $i = 0;
        foreach(DisksImages::model()->findAll() as $img){
            if(file_exists($from.$img->imageName)){
                copy($from.$img->imageName, $to.$img->imageName);
                unlink($from.$img->imageName);
            }
        }
        echo "Complete...";
    }

    public function actionNews()
    {
        $a = Yii::app()->user->checkAccess("backup");
        throw new CHttpException(404, "Тестирование ошибки");
        $this->breadcrumbs = array("Новости");
        $this->render('index');
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