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

    public function actionSeo_texts(){
        $criteria = new CDBCriteria;
        $criteria->select = array(
            "id",
            "name",
            "name_translit",
        );
        $criteria->compare("level", 1);
        $criteria->order = "name";
        $citysAll = DelivarySeo::model()->findAll(
            array(
                "select" => array("*", new CDbExpression("IF(LENGTH(TRIM(text)) = 0, 1 ,0) AS `is_new`"))
            )
        )->getArray();
        $data = array();
        foreach(IntimeWarehouse::model()->findAll($criteria) as $region){
            $region_id = $region->id;
            $is_new = 0;
            $citys = array_filter(
                $citysAll,
                function($v)use($region_id, &$is_new){
                    if($v["is_new"] == 0) $is_new++;
                    return $v["region_id"] == $region_id;
                }
            );
            usort(
                $citys,
                function($s1, $s2){
                    if($s1 == $s2)
                        return 0;
                    return $s1 > $s2 ? 1 : -1;
                }
            );
            $data[] = array(
                "region_name" => $region->name,
                "region_translit" => $region->name_translit,
                "is_new" => $is_new > 0 ? 1 : 0,
                "citys" => $citys
            );
        }
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/admin/seo_texts.js', CClientScript::POS_END);
        Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/css/admin/seo_texts.css');
        $this->render(
            'seo_texts',
            array(
                "data" => $data,
            )
        );
    }

    public function actionSeo_texts_edit($region, $city){
        $sql = <<< SQL
SELECT d.`city`, d.`city_translit`, d.`region_id`, n.`name` as `region`, n.`name_translit` as `region_translit`
FROM `delivary_seo` d
    INNER JOIN
    `nova_warehouse` n
    ON (d.`region_id` = n.`id` AND n.`level` = 1)
WHERE n.`name_translit` = :p1 AND d.`city_translit` = :p2
SQL;
        $row = Yii::app()->db->createCommand($sql)->queryRow(
            true, array(":p1" => $region, ":p2" => $city)
        );
        if(!$row){
            throw new CHttpException(404, "Страница не найдена");
        }
        $model = DelivarySeo::model()->find(
            array(
                "condition" => "region_id = :region_id AND city_translit = :city_translit",
                "params" => array(
                                ":region_id" => $row["region_id"],
                                ":city_translit" => $city,
                            )
            )
        );
        if($postData = Yii::app()->request->getPost("DelivarySeo")){
            $model->attributes = $postData;
            if($model->save()){
                $this->redirect("/admin/delivery/seo_texts");
            }
        }
        $this->breadcrumbs = array(
            "Доставка",
            "Уникальные тексты",
            "Уникальный текст для {$row[city]} ({$row[region]})"
        );
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/admin/seo_texts_edit.js', CClientScript::POS_END);
        $this->render(
            "seo_texts_edit",
            array(
                "city" => $row["city"],
                "region" => $row["region"],
                "model" => $model
            )
        );
    }

}