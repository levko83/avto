<?php

class DeliveryController extends Controller
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

    public function actionIntime()
	{
        $this->breadcrumbs = array("Доставка", "Интайм");
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/admin/intime.js', CClientScript::POS_END);
		$this->render('intime');
	}

    public function actionIntimeLoadXml(){
        if(Yii::app()->request->isAjaxRequest){
            $result = IntimeWarehouse::model()->loadXmlFromSite();
            if($result){
               $response = array(
                   "code" => 1,
               );
            }else{
                $response = array(
                    "code" => 0,
                    "message" => $result
                );
            }
            echo CJSON::encode($response);
            Yii::app()->end();
        }
        else{
            throw new CHttpException(404, "Страница не найдена");
        }
    }

    public function actionIntimeUpdateTable(){
        if(Yii::app()->request->isAjaxRequest){
            $result = IntimeWarehouse::model()->updateDataFromSite();
            if($result === true){
                $response = array(
                    "code" => 1,
                );
            }else{
                $response = array(
                    "code" => 0,
                    "message" => $result
                );
            }
            echo CJSON::encode($response);
            Yii::app()->end();
        }
        else{
            throw new CHttpException(404, "Страница не найдена");
        }
    }

    public function actionNova()
    {
        $this->breadcrumbs = array("Доставка", "Новая Почта");
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/admin/nova.js', CClientScript::POS_END);
        $this->render('nova');
    }

    public function actionNovaLoadXml(){
        if(Yii::app()->request->isAjaxRequest){
            $result = NovaWarehouse::model()->loadXmlFromSite();
            if($result){
                $response = array(
                    "code" => 1,
                );
            }else{
                $response = array(
                    "code" => 0,
                    "message" => $result
                );
            }
            echo CJSON::encode($response);
            Yii::app()->end();
        }
        else{
            throw new CHttpException(404, "Страница не найдена");
        }
    }

    public function actionNovaUpdateTable(){
        if(Yii::app()->request->isAjaxRequest){
            $result = NovaWarehouse::model()->updateDataFromSite();
            if($result === true){
                $response = array(
                    "code" => 1,
                );
            }else{
                $response = array(
                    "code" => 0,
                    "message" => $result
                );
            }
            echo CJSON::encode($response);
            Yii::app()->end();
        }
        else{
            throw new CHttpException(404, "Страница не найдена");
        }
    }

}