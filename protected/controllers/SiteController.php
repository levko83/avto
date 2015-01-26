<?php

class SiteController extends Controller
{

    public $layout = 'application.views.layouts.main_page';

	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}


	// главная страница
	public function actionIndex()
	{
        Yii::import('application.controllers.TiresController');
        Yii::import('application.controllers.DrivesController');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/index.js', CClientScript::POS_HEAD);
        $this->setSeoInformation("main");
        if(trim($this->text) != ""){
            $this->body = $this->text;
        }
        $this->render(
            'index',
            array(
                'shinsDisplays' => ShinsDisplays::model()->searchSphinxForSite(false, 20)->getData(),
                'disksDisplays' => DisksDisplays::model()->searchSphinxForSite(false, 20)->getData(),
                'tiresVocabs' => new FilterByTires(),
                'drivesVocabs' => new FilterByDrives(),
            )
        );
	}

	// страница ошибка
	public function actionError(){
        if($error=Yii::app()->errorHandler->error){
            if(Yii::app()->request->isAjaxRequest)
                    echo $error['message'];
            else{
                $this->pageTitle=Yii::app()->name . ' - Ошибка';
                $this->breadcrumbs=array(
                    'Ошибка',
                );
                $this->render('error', array(
                    "error" => $error,
                ));
            }
        }
	}

    private function _viewPage($page_key){
//        $model = Pages::model()->cache(86400)->find(
//            array(
//                "condition" => "page_key = '{$page_key}'",
//            )
//        );
        $model = PagesSeo::model()->find(
            array(
                "condition" => "page_key = '{$page_key}'",
            )
        );
        $this->page_type = $page_key;
        $this->layout = 'application.views.layouts.page';
        $this->setSeoInformation($page_key);
        $this->render(
            "page",
            array(
                "model" => $model
            )
        );
    }

    // cтраница "О нас"
    public function actionAbout(){
        $this->breadcrumbs = array(
            array(
                "url" => "/",
                "title" => "Главная"
            ),
            array(
                "url" => Yii::app()->createUrl("site/about"),
                "title" => "О нас"
            ),
        );
        $this->_viewPage("about");
    }

    // cтраница "Контакты"
    public function actionContacts(){
        $this->breadcrumbs = array(
            array(
                "url" => "/",
                "title" => "Главная"
            ),
            array(
                "url" => Yii::app()->createUrl("site/contacts"),
                "title" => "Контакты"
            ),
        );
        $this->_viewPage("contacts");
    }
    
    public function actionDelivery(){
        $region_groups = $buff = array();
        $i = $cnt = 0;
        foreach(Delivery::instance()->getRegions() as $region_key => $region_name){
            $cnt++;
            $buff[$region_key] = $region_name;
            if(++$i > 8){
                $region_groups[] = $buff;
                $i = 0;
                $buff = array();
            }
        }
        $region_groups[] = $buff;
        $this->layout = 'application.views.layouts.delivery_page';
        $this->setSeoInformation("payment_and_delivery");
        if(trim($this->text) != ""){
            $this->body = $this->text;
        }
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/ammap/ammap.js', CClientScript::POS_HEAD);
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/ammap/maps/js/ukraineHigh.js', CClientScript::POS_HEAD);
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/delivery_map.js', CClientScript::POS_HEAD);
        $this->render(
            "delivery",
            array(
                "region_groups" => $region_groups,
            )
        );
    }

    public function actionDeliveryRegion($region_translit){
        $regional_center = Delivery::instance()->getRegionalCenter($region_translit);
        if(!$regional_center){
            throw new CHttpException(404, "Страница не найдена");
        }
        $this->redirect(
            array(
                "site/deliveryCity",
                "region_translit" => $region_translit,
                "city_translit" => $regional_center,
            )
        );
        $regions = Delivery::instance()->getRegions();
        if(!array_key_exists($region_translit, $regions)){
            throw new CHttpException(404, "Страница не найдена");
        }
        $select_options = array();
        $cities = Delivery::instance()->getRegionCities($region_translit);
        foreach($cities->cities as $city_translit => $city_name){
            $options = array();
            $options["data-link"] = Yii::app()->createUrl(
                                        "site/deliveryCity",
                                        array("region_translit" => $region_translit, "city_translit" => $city_translit)
                                    );
            if($city_translit == $cities->regionalCenter){
                $options["selected"] = "selected";
            }
            $select_options[] = CHtml::tag("option", $options, $city_name);
        }
        $this->layout = 'application.views.layouts.delivery_page_city';
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/delivery.js', CClientScript::POS_HEAD);
        $this->render(
            "delivery_city",
            array(
                "region_name" => $regions[$region_translit],
                "region_center_name" => $cities->cities[$cities->regionalCenter],
                "select_options" => $select_options,
                "intimeWareHouses" => IntimeWarehouse::model()->getWareHousesForCity($region_translit, $cities->regionalCenter),
                "novaWareHouses" => NovaWarehouse::model()->getWareHousesForCity($region_translit, $cities->regionalCenter),
            )
        );
    }

    public function actionDeliveryCity($region_translit, $city_translit){
        $regions = Delivery::instance()->getRegions();
        if(!array_key_exists($region_translit, $regions)){
            throw new CHttpException(404, "Страница не найдена");
        }
        $cities = Delivery::instance()->getRegionCities($region_translit);
        if(!array_key_exists($city_translit, $cities->cities)){
            throw new CHttpException(404, "Страница не найдена");
        }
        $select_options = array();
        foreach($cities->cities as $city_translit_key => $city_name){
            $options = array();
            $options["data-link"] = Yii::app()->createUrl(
                                        "site/deliveryCity",
                                        array("region_translit" => $region_translit, "city_translit" => $city_translit_key)
                                    );
            if($city_translit_key == $city_translit){
                $options["selected"] = "selected";
            }
            $select_options[] = CHtml::tag("option", $options, $city_name);
        }
        // test
        $this->layout = 'application.views.layouts.delivery_page_city';
        $this->setSeoInformation(
            "payment_and_delivery_city",
            array(
                "city" => $cities->cities[$city_translit],
                "region" => $regions[$region_translit],
            )
        );
        $this->body = DelivarySeo::model()->getDeliverySeoTextForCity($city_translit, $region_translit);
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/delivery.js', CClientScript::POS_HEAD);
        $this->render(
            "delivery_city",
            array(
                "region_name" => $regions[$region_translit],
                "region_center_name" => $cities->cities[$city_translit],
                "select_options" => $select_options,
                "intimeWareHouses" => IntimeWarehouse::model()->getWareHousesForCity($region_translit, $city_translit),
                "novaWareHouses" => NovaWarehouse::model()->getWareHousesForCity($region_translit, $city_translit),
            )
        );
    }

    public function actionTest(){
        foreach(Delivery::instance()->getRegions() as $region_translit => $region_name){
            echo Yii::app()->createUrl("site/deliveryRegion", array("region_translit" => $region_translit));
            echo "        ".$region_name;
            echo "<br/>";
        }
    }

}