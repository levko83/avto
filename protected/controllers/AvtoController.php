<?php

class AvtoController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

    public function actionChangeMark(){
        if(Yii::app()->request->isAjaxRequest
           and
           $avto_mark = Yii::app()->request->getPost("avto_mark"))
        {
           foreach(AvtoModels::model()->findAll("avto_marks_id = ".(int)$avto_mark) as $avto_model){
              $text .= "<option value='{$avto_model->id}'>{$avto_model->value}</option>";
           }
           if(mb_strlen($text) > 0){
               $text = "<option value='-1'>-- выберите значение --</option>".$text;
               $result = array(
                   "response" => 1,
                   "text" => $text,
               );
           }else{
               $result = array("response" => 0);
           }
           echo CJSON::encode($result);
           Yii::app()->end();
        }
    }

    public function actionChangeModel(){
        if(Yii::app()->request->isAjaxRequest
            and
            $avto_model= Yii::app()->request->getPost("avto_model"))
        {
            $criteria = new CDbCriteria;
            $criteria->order = "year, engine";
            $criteria->compare("avto_models_id", (int)$avto_model);
            foreach(AvtoModification::model()->findAll($criteria) as $avto_modification){
                $text .= "<option value='{$avto_modification->id}'>{$avto_modification->year} - {$avto_modification->engine}</option>";
            }
            if(mb_strlen($text) > 0){
                $text = "<option value='-1'>-- выберите значение --</option>".$text;
                $result = array(
                    "response" => 1,
                    "text" => $text,
                );
            }else{
                $result = array("response" => 0);
            }
            echo CJSON::encode($result);
            Yii::app()->end();
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