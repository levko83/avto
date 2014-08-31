<?php

class DrivesController extends Controller{

    public $layout = 'application.views.layouts.drives_page';

    // формирование списка параметров фильтра
    private function getShortPramNames(){
        return array(
            "avto_modification" => "v",
            "priceMin" => "v1",
            "priceMax" => "v2",
            "disks_rim_diametr" => "v3",
            "disks_type_id" => "v4",
            "disks_rim_width" => "v5",
            "disks_port_position" => "v6",
            "disks_boom" => "v7",
            "disks_fixture_port_diametr" => "v9",
            "disks_fixture_port_count" => "v10",
            "disks_color" => "v11",
            "vendor_id"  => "v12",
            "inStock"  => "v13",
        );
    }

    // формирование строки фильтра
    private function makeFilterString($post){
        $filterArray = array();
        if(is_array($post)){
            $short_names = $this->getShortPramNames();
            foreach($post as $pk => $pv){
                if(!($pk = $short_names[$pk])){
                    continue;
                }
                if(is_array($pv)){
                    $cb_arr = array();
                    foreach($pv as $v){
                        if(($v = trim($v)) !== ""){
                            $cb_arr[] = $v;
                        }
                    }
                    if(count($cb_arr) > 0){
                        $filterArray[$pk] = $cb_arr;
                    }
                }else{
                    if(($pv = trim($pv)) === "")
                        continue;
                    $filterArray[$pk] = $pv;
                }
            }
        }
        return $filterArray;
    }

    public function actionIndex(){
        if($formData = Yii::app()->request->getPost("Disks")){
            if(isset($_GET["v"])){
                $formData["avto_modification"] = (int)$_GET["v"];
            }
            $url = CMap::mergeArray(array('drives/index'), $this->makeFilterString($formData));
            $this->redirect($url);
        }
        $filter = array();
        if(isset($_GET) and is_array($_GET)){
            foreach($_GET as $fk => $fv){
                if($filterParam = array_search($fk, $this->getShortPramNames())){
                    $filter[$filterParam] = $fv;
                }
            }
        }
        if($filter["avto_modification"]){
            $avto = AvtoModification::model()->fullAvto($filter["avto_modification"]);
            $avto_modification_arr = PodborDiski::model()->getDisksModifications((int)$filter["avto_modification"]);
        }
        $vocabs = new FilterByDrives($_GET);
        $model = new DisksDisplays();
        if(count($filter) > 0){
            $model->disksFilter = $filter;
            $model->disksFilter["avto_modification"] = $avto_modification_arr;
        }
        $dataProvider = $model->searchSphinxForSite(8);
//        $disks = new Disks("filter");
        $disks = new Disks();
        if(count($filter) > 0){
            $disks->unsetAttributes();
            $disks->attributes = $filter;
        }else{
            $disks->priceMin = $vocabs->price["min_price"];
            $disks->priceMax = $vocabs->price["max_price"];
        }
        $browser = Yii::app()->mobileDetect;
        if($browser->isMobile() or $browser->isTablet() or $browser->isIphone()){
            $isMobile = true;
        }else
            $isMobile = false;
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/drives.js', CClientScript::POS_HEAD);
        if(isset($_GET["page"])){
            $this->noIndex = true;
        }
        $this->breadcrumbs = array(
            array(
                "url" => "/",
                "title" => "Главная"
            ),
            array(
                "url" => Yii::app()->createUrl("drives/index"),
                "title" => "Диски"
            ),
        );
        if(isset($filter["vendor_id"]) and count($filter["vendor_id"]) == 1){
            $brand = DisksVendors::model()->findByPk($filter["vendor_id"][0])->vendor_name;
            $header = "Диски {$brand}";
            $brand_description = trim(DisksVendors::model()->findByPk($filter["vendor_id"][0])->description);
            if($brand_description){
                $this->body = $brand_description;
            }
            $this->setSeoInformation("disks_brands", ["brand" => $brand]);
        }else{
            $header = "Диски";
            $this->setSeoInformation("diski");
        }
        $this->render(
            'index',
            array(
                'dataProvider' => $dataProvider,
                "header" => $header,
                'vocabs' => $vocabs,
                'disks' => $disks,
                'attributes' => $disks->attributeLabels(),
                "avto" => $avto,
                "isMobile" => $isMobile,
                "filter" => $_GET,
                "filter_url" => $filter["avto_modification"] ?  Yii::app()->createUrl("drives/index", ["v" => $filter["avto_modification"]]) : Yii::app()->createUrl("drives/index"),
                "avto_product_arr" => $avto_modification_arr,
            )
        );
    }

    public function actionDrive($id, $translit){
        $criteria = new CDbCriteria;
        $criteria->compare("id", (int)$id);
        $criteria->compare("translit", $translit);
        if($display = DisksDisplays::model()->find($criteria)){
            $row = Yii::app()->sphinx->createCommand('SELECT MIN(min_display_price_fixture) AS min_price FROM disksIndex WHERE disks_display_id = '.$display->id)->queryRow();
            $min_price = $row["min_price"] == 4294967295 ? 0 : (int)$row["min_price"];
            $imagesPath = Yii::getPathOfAlias("webroot.images.products.disks");
            $images = Yii::app()->db->createCommand("SELECT imageName FROM disks_images WHERE disks_display_id = {$display->id} GROUP BY imageName LIMIT 12")->queryAll();
            $sql = "SELECT id,
                          disks_port_position,
                          disks_fixture_port_count,
                          disks_rim_diametr,
                          disks_boom,
                          disks_fixture_port_diametr,
                          disks_color,
                          amount,
                          price
                    FROM disksIndex
                    WHERE disks_display_id = {$display->id}
                    ORDER BY disks_rim_diametr ASC,
                             amount DESC,
                             disks_fixture_port_count ASC,
                             disks_port_position ASC,
                             disks_boom ASC";
            $dataResult = Yii::app()->sphinx->createCommand($sql)->queryAll();
            $disks_data = array();
            if(count($dataResult) > 0){
                foreach($dataResult as $item){
                    $r = round($item['disks_rim_diametr'], 1);
                    if($item["disks_port_position"] > 0 and $item["disks_fixture_port_count"] > 0){
                        $item["psd"] = $item["disks_fixture_port_count"]." X ".round($item["disks_port_position"], 1);
                    }
                    $disks_data[$r][] = $item;
                }
            }
            $feedback = new Feedbacks;
            if($formData = Yii::app()->request->getPost("Feedbacks")){
                $feedback->attributes = $formData;
                $feedback->product_type = 2;
                $feedback->product_id = $display->id;
                $rating = (double)$feedback->rating;
                if($rating > 0 and $rating <= 5){
                    $feedback->rating = $rating;
                }else{
                    $feedback->rating = null;
                }
                $feedback->created = time();
                if($feedback->save()){
                    $this->refresh();
                }
            }
            $criteria = new CDbCriteria;
            $criteria->compare("product_type", 2);
            $criteria->compare("product_id", $display->id);
            $criteria->order = "created DESC";
            $feedbacks = Feedbacks::model()->findAll($criteria);
            $feedbacksCount = Feedbacks::model()->count($criteria);
            // данные для фильтра
            $vocabs = new FilterByDrives($_GET);
            $disks = new Disks("filter");
            $disks->priceMin = $vocabs->price["min_price"];
            $disks->priceMax = $vocabs->price["max_price"];
            // выводим вьюху
            Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/drives.js', CClientScript::POS_HEAD);
            //Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/cart.js', CClientScript::POS_HEAD);
            $this->layout = 'application.views.layouts.tire_page';
            $browser = Yii::app()->mobileDetect;
            if($browser->isMobile() or $browser->isTablet() or $browser->isIphone()){
                $isMobile = true;
            }else
                $isMobile = false;
            $this->setSeoInformation("disks_display", $display->id);
            $this->breadcrumbs = array(
                array(
                    "url" => "/",
                    "title" => "Главная"
                ),
                array(
                    "url" => Yii::app()->createUrl("drives/drive", array("id" => $id, "translit" => $translit)),
                    "title" => "Диски {$display->display_name}"
                ),
            );
            $this->render(
                "drive",
                array(
                    "display" => $display,
                    "display_min_price" => $min_price,
                    "images" => $images,
                    "diametrs" => array_keys($disks_data),
                    "disks_data" => $disks_data,
                    "feedback" => $feedback,
                    "feedbacks" => $feedbacks,
                    "feedbacksCount" => $feedbacksCount,
                    //"feedbackErrors" => $feedback->getErrors(),
                    // данные для фильтра
                    "isMobile" => $isMobile,
                    "vocabs" => $vocabs,
                    "disks" => $disks,
                    "filter_url" => Yii::app()->createUrl("drives/index"),
                    "attributes" => $disks->attributeLabels(),
                )
            );
        }else{
            throw new CHttpException(404, "Страница не найдена");
        }
    }

    public function actionDrivesSubMenu($type){
        $criteria = new CDbCriteria;
        $criteria->compare("translit", $type);
        $model = DisksType::model()->find($criteria);
        if($model === null){
            throw new CHttpException(404, "Страница не найдена");
        }
        $sql = "SELECT vendor_id, vendor_name, vendor_image, MAX(amount) AS cnt
                FROM disksIndex
                WHERE disks_type_id = {$model->id}
                GROUP BY vendor_id
                ORDER BY vendor_name ASC
                LIMIT 10000";
        $recs = Yii::app()->sphinx->createCommand($sql)->queryAll();
        $inStock = array_filter(
            $recs,
            function($v){
                return $v["cnt"] > 0;
            }
        );
        $outStock = array_filter(
            $recs,
            function($v){
                return $v["cnt"] == 0;
            }
        );
        // данные для фильтра
        $vocabs = new FilterByDrives($_GET);
        $disks = new Disks("filter");
        $disks->priceMin = $vocabs->price["min_price"];
        $disks->priceMax = $vocabs->price["max_price"];
        // выводим вьюху
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/drives.js', CClientScript::POS_HEAD);
        $this->page_type = "drives-index-node";
        $this->layout = 'application.views.layouts.page';
        $browser = Yii::app()->mobileDetect;
        if($browser->isMobile() or $browser->isTablet() or $browser->isIphone()){
            $isMobile = true;
        }else
            $isMobile = false;
        $this->setSeoInformation("disks_category", array("category" => $model->value));
        if(isset($_GET["page"])){
            $this->noIndex = true;
        }
        $this->breadcrumbs = array(
            array(
                "url" => "/",
                "title" => "Главная"
            ),
            array(
                "url" => Yii::app()->createUrl("drives/drivesSubMenu", array("type" => $type)),
                "title" => "Диски {$model->value}"
            ),
        );
        $this->render(
            "drivesSubMenuItem",
            array(
                "inStock" => $inStock,
                "outStock" => $outStock,
                // данные для фильтра
                "isMobile" => $isMobile,
                "vocabs" => $vocabs,
                "disks" => $disks,
                "h2" => "Диски {$model->value}",
                "disks_type_id" => $model->id,
                "filter_url" => Yii::app()->createUrl("drives/index"),
                "attributes" => $disks->attributeLabels(),
            )
        );
    }

    public function actionGetAvtoModification(){
        if(Yii::app()->request->isAjaxRequest){
            $v = Yii::app()->request->getPost("v");
            if($v){
                $modif = AvtoModification::model()->findByPk($v);
                if($modif){
                    echo CJSON::encode(array(
                        "result" => "suxx",
                        "modif" => $modif->translit,
                    ));
                }else{
                    echo CJSON::encode(array(
                        "result" => "error",
                    ));
                }
            }
        }else{
            throw new CHttpException(404);
        }
    }
	
}