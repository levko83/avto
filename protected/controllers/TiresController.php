<?php

class TiresController extends Controller
{

    public $layout = 'application.views.layouts.tires_page';

    public function filters()
    {
        return;
        $actions = array("index", "tire", "tiresSubMenu");
        return array(
            array(
                "COutputCache + ".join(" + ", $actions),
                'duration' => 3600 * 365,
                'varyByParam' => array_merge(array_keys($_GET), array_keys($_POST)),
            ),
        );
    }

    // формирование списка параметров фильтра
    private function getShortPramNames(){
        return array(
            "avto_modification" => "v",
            "priceMin" => "v1" ,
            "priceMax" => "v2" ,
            "shins_diametr" => "v3" ,
            "shins_load_index" => "v4" ,
            "shins_profile_height" => "v5" ,
            "shins_profile_width" => "v6" ,
            "shins_run_flat_technology_id" => "v7" ,
            "shins_season_id"  => "v8" ,
            "shins_spike_id"  => "v9" ,
            "shins_type_of_avto_id"  => "v10" ,
            "vendor_id"  => "v11" ,
            "inStock"  => "v13" ,
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



    // формирование спраочников
    public static function getVocabsValues($avto_modification_arr = null, $filter = null){
        $unFilter = function($filter){
            if(!$filter){
                return array();
            }
            $filterParams = array(
                "avto_modification" => "v",
                "priceMin" => "v1" ,
                "priceMax" => "v2" ,
                "shins_diametr" => "v3" ,
                "shins_load_index" => "v4" ,
                "shins_profile_height" => "v5" ,
                "shins_profile_width" => "v6" ,
                "shins_run_flat_technology_id" => "v7" ,
                "shins_season_id"  => "v8" ,
                "shins_spike_id"  => "v9" ,
                "shins_type_of_avto_id"  => "v10" ,
                "vendor_id"  => "v11" ,
            );
            $result = array();
            foreach($filter as $k => $v){
                $newKey = $filterParams[$k];
                $result[$newKey] = $v;
            }
            return $result;
        };
        $urlParams = $unFilter($filter);
        $sqls = array();
        if($avto_modification_arr){
            $t = array();
            foreach($avto_modification_arr as $item){
                $item = str_replace("/", '\\\\\/', $item);
                $t[] = "@product_name \"{$item}\" ";
            }
            $where = "MATCH('".join(" | ", $t)."')";
        }
        // range
        $sql = "SELECT MIN(price) AS min_price, MAX(price) AS max_price, 1 AS one FROM shinsIndex WHERE price > 0";
        if($where) $sql .= " AND {$where}";
        $sqls[] = "{$sql} GROUP BY one";
        // Ширина шины
        $sql = "SELECT shins_profile_width FROM shinsIndex";
        if($where) $sql .= " WHERE {$where} AND shins_profile_width > 0";
        $sql .= " GROUP BY shins_profile_width ORDER BY shins_profile_width ASC LIMIT 500000";
        $sqls[] = $sql;
        // Индекс нагрузки
        $sql = "SELECT shins_load_index_translit, shins_load_index FROM shinsIndex";
        if($where) $sql .= " WHERE {$where}";
        $sql .= " GROUP BY shins_load_index ORDER BY shins_load_index ASC LIMIT 500000";
        $sqls[] = $sql;
        // Профиль
        $sql = "SELECT shins_profile_height FROM shinsIndex WHERE shins_profile_height > 0";
        if($where) $sql .= " AND {$where}";
        $sql .= " GROUP BY shins_profile_height ORDER BY shins_profile_height ASC LIMIT 500000";
        $sqls[] = $sql;
        // Диаметр
        $sql = "SELECT shins_diametr FROM shinsIndex WHERE  shins_diametr > 0.0";
        if($where) $sql .= " AND {$where}";
        $sql .= " GROUP BY shins_diametr ORDER BY shins_diametr ASC LIMIT 500000";
        $sqls[] = $sql;
        // Сезонность
        $sql = "SELECT shins_season_id, shins_season FROM shinsIndex WHERE shins_season_id > 1";
        if($where) $sql .= " AND {$where}";
        $sql .= " GROUP BY shins_season_id ORDER BY shins_season ASC LIMIT 500000";
        $sqls[] = $sql;
        // Тип авто
        $sql = "SELECT shins_type_of_avto_id, shins_type_of_avto FROM shinsIndex WHERE shins_type_of_avto_id > 1";
        if($where) $sql .= " AND {$where}";
//        $sql .= " GROUP BY shins_type_of_avto_id ORDER BY shins_type_of_avto ASC LIMIT 500000 OPTION max_matches=500000, ranker=none";
        $sql .= " GROUP BY shins_type_of_avto_id ORDER BY shins_type_of_avto ASC LIMIT 500000";
        $sqls[] = $sql;
        // Технология RunFlat +
        $sql = "SELECT shins_run_flat_technology_id FROM shinsIndex WHERE shins_run_flat_technology_id = 2";
        if($where) $sql .= " AND {$where}";
//        $sqls[] = $sql." GROUP BY shins_run_flat_technology_id OPTION max_matches=500000, ranker=none";
        $sqls[] = $sql." GROUP BY shins_run_flat_technology_id";
        // Шипы +
        $sql = "SELECT shins_spike_id FROM shinsIndex WHERE shins_spike_id = 2";
        if($where) $sql .= " AND {$where}";
        $sqls[] = $sql." GROUP BY shins_spike_id";
        // Бренд
        $sql = "SELECT vendor_id, vendor_name FROM shinsIndex WHERE vendor_id > 1";
        if($where) $sql .= " AND {$where}";
        $sql .= " GROUP BY vendor_id ORDER BY vendor_name ASC LIMIT 500000";
        $sqls[] = $sql;
        $log_file = Yii::getPathOfAlias("application.runtime")."/sqls_filter.log";
        if(file_exists($log_file)) unlink($log_file);
        foreach($sqls as $sql){
            file_put_contents($log_file, "$sql\n", FILE_APPEND);
        }
        $dataReader = Yii::app()->sphinx->createCommand(join(";", $sqls))->query();
        $prepare_value = function($v){
            if(is_numeric($v)){
                return round($v, 1);
            }
            return trim($v);
        };
        $tmp_arr = $res = array();
        $i = 0;
        do{
            $arr = $dataReader->readAll();
            $tmp_arr[] = $arr;
            if($i == 0){
               $res["price"] = (object)$arr[0];
            }else{
               if($arr){
                   unset($arr[0]["id"]); unset($arr[0]["weight"]); // для Unix
                   $fields = array_keys($arr[0]);
                   if(count($fields) == 2){
                       if(PHP_OS != "WINNT" and $fields[0] == "shins_load_index"){
                           $key_field = $fields[1];
                           $value_field = $fields[0];
                       }else{
                           $key_field = $fields[0];
                           $value_field = $fields[1];
                       }
                   }else{
                       $key_field = $value_field = $fields[0];
                   }
                   $buff = array();
                   if($value_field != "shins_season" and $value_field != "shins_diametr" and $value_field != "vendor_name" and $value_field != "shins_run_flat_technology_id" and $value_field != "shins_spike_id"){
                       $buff = array("" => "- все -");
                   }
                   foreach($arr as $v){
                       $buff[$prepare_value($v["$key_field"])] = $prepare_value($v["$value_field"]);
                       $key = (string)$prepare_value($v["$key_field"]);
                       $val = $prepare_value($v["$value_field"]);
                       if($value_field == "vendor_name"){
                           $currUrlParams = $urlParams;
                           $currUrlParams["v11"] = array($key);
                           $url = Yii::app()->createUrl(
                               "tires/index",
                               $currUrlParams
                           );
                           $buff[$key] = "<a href='{$url}'>{$val}</a>";
                       }elseif($value_field == "shins_diametr"){
                           $currUrlParams = $urlParams;
                           $currUrlParams["v3"] = $key;
                           $url = Yii::app()->createUrl(
                               "tires/index",
                               $currUrlParams
                           );
                           $buff[$key] = "<a href='{$url}'>{$val}</a>";
                       }else{
                           $buff[$key] = $val;
                       }
                   }
                   $res[$value_field] = $buff;
               }else{
                   $res[] = array();
               }
            }
            $i++;
        } while ($dataReader->nextResult());
        $dataReader->close();
        $log_file = Yii::getPathOfAlias("application.runtime")."/res.log";
        if(file_exists($log_file)) unlink($log_file);
        file_put_contents($log_file, print_r($res, true));
        $log_file = Yii::getPathOfAlias("application.runtime")."/tmp_arr.log";
        if(file_exists($log_file)) unlink($log_file);
        file_put_contents($log_file, print_r($tmp_arr, true));
        return $res;
    }

    // главная страница шин
    public function actionIndex(){
         if($formData = Yii::app()->request->getPost("Shins")){
             if(isset($_GET["v"])){
                 $formData["avto_modification"] = (int)$_GET["v"];
             }
             $url = CMap::mergeArray(array('tires/index'), $this->makeFilterString($formData));
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
             $avto_product_arr = PodborShiniIDiski::model()->getShinsArray($filter["avto_modification"]);
             $variants = PodborShini::model()->getShinsVariants($filter["avto_modification"]);
         }
         $vocabs = new FilterByTires($_GET);
         $model = new ShinsDisplays();
         if(count($filter) > 0){
             $model->shinsFilter = $filter;
             //$model->shinsFilter["avto_modification"] = $avto_product_arr;
         }
         $dataProvider = $model->searchSphinxForSite(10);
         $shins = new Shins();
         if(count($filter) > 0){
             $shins->unsetAttributes();
             $shins->attributes = $filter;
         }
         $browser = Yii::app()->mobileDetect;
         if($browser->isMobile() or $browser->isTablet() or $browser->isIphone()){
            $isMobile = true;
         }else
             $isMobile = false;
         if(count($filter) == 1 and isset($filter["vendor_id"]) and count($filter["vendor_id"]) == 1){
            $brand = ShinsVendors::model()->findByPk($filter["vendor_id"][0])->vendor_name;
            $header = "Шины {$brand}";
            $brand_description = trim(ShinsVendors::model()->findByPk($filter["vendor_id"][0])->description);
            if($brand_description){
                $this->body = $brand_description;
            }
            $this->breadcrumbs = array(
                array(
                    "url" => "/",
                    "title" => "Главная"
                ),
                array(
                    "url" => Yii::app()->createUrl("tires/index"),
                    "title" => "Шины"
                ),
                array(
                    "title" => $header
                )
            );
            $this->setSeoInformation("shins_brands", ["brand" => $brand]);
         }else{
            $header_array = array();
            $brand = $vocabs->getSeoValues("vendor_id", $filter);
            if($brand){
                $header_array[] = $brand;
            }
            if(isset($avto)){
                $header_array[] = "для {$avto}";
            }
            $tip_avto = $vocabs->getSeoValues("shins_type_of_avto_id", $filter);
            if($tip_avto){
                $header_array[] = $tip_avto;
            }
            $season = $vocabs->getSeoValues("shins_season_id", $filter);
            if($season){
                $header_array[] = $season;
            }
            $shirina = $vocabs->getSeoValues("shins_profile_width", $filter);
            if($shirina){
                $header_array[] = "ширина: {$shirina}";
            }
            $profile = $vocabs->getSeoValues("shins_profile_height", $filter);
            if($profile){
                $header_array[] = "профиль: {$profile}";
            }
            $diametr = $vocabs->getSeoValues("shins_diametr", $filter, "R");
            if($diametr){
                $header_array[] = "диаметр: {$diametr}";
            }
            $load_index = $vocabs->getSeoValues("shins_load_index", $filter, "R");
            if($load_index){
                 $header_array[] = "индекс нагрузки: {$load_index}";
            }
            $run_flat = (isset($filter["shins_run_flat_technology_id"]) and count($filter["shins_run_flat_technology_id"]) == 1 and $filter["shins_run_flat_technology_id"][0] == 2) ? 1 : 0;
            if($run_flat == 1){
                $header_array[] = "RunFlat";
            }
            $spike = isset($filter["shins_spike_id"]) and count($filter["shins_spike_id"]) == 1 and $filter["shins_spike_id"][0] == 2 ? 1 : 0;
            if($spike == "есть"){
                $header_array[] = "шипованные";
            }
            $header = "Шины";
            $header_filter = join(", ", $header_array);
            if($header_filter){
                $header .= " {$header_filter}";
            }
            $this->setSeoInformation("shins", array("filter" => $header_filter));
            if(trim($this->text) != ""){
                $this->body = $this->text;
            }
         }
         if(isset($_GET["page"])){
             $this->noIndex = true;
         }
         Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/tires.js', CClientScript::POS_HEAD);
         $this->render(
            'index',
             array(
                 'dataProvider' => $dataProvider,
                 'header' => $header,
                 'vocabs' => $vocabs,
                 'shins' => $shins,
                 'attributes' => $shins->attributeLabels(),
                 "avto" => $avto,
                 "variants" => $variants,
                 "isMobile" => $isMobile,
                 "filter" => $_GET,
                 "filter_url" => $filter["avto_modification"] ?  Yii::app()->createUrl("tires/index", ["v" => $filter["avto_modification"]]) : Yii::app()->createUrl("tires/index"),
                 "avto_product_arr" => $avto_product_arr,
             )
         );
	}

    public function actionTire($id, $translit){
        $criteria = new CDbCriteria;
        $criteria->compare("id", (int)$id);
        $criteria->compare("translit", $translit);
        if($display = ShinsDisplays::model()->find($criteria)){
           if($_GET["ids"]){
               $ids = array_map(
                           function($v){
                               return (int)$v;
                           },
                           explode(";", $_GET["ids"])
                      );
               $cnt = Yii::app()->sphinx->createCommand("SELECT COUNT(*) AS cnt FROM shinsIndex WHERE id IN (".join(", ", $ids).")")->queryRow();
               if($cnt["cnt"] != count($ids)){
                   $ids = false;
               }
           }else{
               $ids = false;
           }
           if($ids){
               $row = Yii::app()->sphinx->createCommand("SELECT MIN(min_display_price_fixture) AS display_min_price FROM shinsIndex WHERE id IN (".join(", ", $ids).")")->queryRow();
           }else{
               $row = Yii::app()->sphinx->createCommand("SELECT display_min_price FROM shinsIndex WHERE shins_display_id = {$display->id}")->queryRow();
           }
           $min_price = $row["display_min_price"];
           $imagesPath = Yii::getPathOfAlias(".webrootimages.products.shins");
           $images = Yii::app()->db->createCommand("SELECT imageName FROM shins_images WHERE shins_display_id = {$display->id} GROUP BY imageName LIMIT 12")->queryAll();
           $sql = "SELECT id,
                          shins_profile_width,
                          shins_profile_height,
                          shins_diametr,
                          shins_load_index,
                          shins_run_flat_technology_id,
                          shins_speed_index,
                          shins_spike_id,
                          shins_season_id,
                          shins_season,
                          amount,
                          price,
                          min_display_price_fixture
                    FROM shinsIndex
                    WHERE shins_display_id = {$display->id}
                    ORDER BY shins_profile_width ASC, shins_diametr ASC, shins_profile_height ASC, amount DESC
                    LIMIT 0, 100000";
           $dataResult = Yii::app()->sphinx->createCommand($sql)->queryAll();
           $season = function()use($dataResult){
                $seasons = array_filter(
                    $dataResult,
                    function($row){
                        return $row["shins_season_id"] > 1;
                    }
                );
                if($seasons){
                    $first_row = reset($seasons);
                    return array(
                        "id" => $first_row["shins_season_id"],
                        "value" => $first_row["shins_season"]
                    );
                }else{
                    return "";
                }
           };
           $shins_data = array();
           $sel_tabs = array();
           if(count($dataResult) > 0){
               foreach($dataResult as $item){
                   $r = round($item['shins_diametr'], 1);
                   $item["type_size"] = "{$item['shins_profile_width']}/{$item['shins_profile_height']} R{$r}";
                   $shins_data[$r][] = $item;
                   if($ids and in_array($item["id"], $ids) and !in_array($r, $sel_tabs)){
                       $sel_tabs[] = $r;
                   }
               }
               ksort($shins_data);
               foreach($shins_data as $ind => &$shins_by_radius){
                   $a = $w = $h = array();
                   foreach($shins_by_radius as $i => $v){
                       $a[$i] = (int)$v["amount"] > 0 ? 1 : 0;
                       $w[$i] = (double)$v['shins_profile_width'];
                       $h[$i] = (double)$v['shins_profile_height'];
                   }
                   array_multisort($a, SORT_DESC, $w, SORT_ASC, $h, SORT_ASC, $shins_by_radius);
               }
           }
           $feedback = new Feedbacks;
           if($formData = Yii::app()->request->getPost("Feedbacks")){
               $feedback->attributes = $formData;
               $feedback->product_type = 1;
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
           $criteria->compare("product_type", 1);
           $criteria->compare("product_id", $display->id);
           $criteria->order = "created DESC";
           $feedbacks = Feedbacks::model()->findAll($criteria);
           $feedbacksCount = Feedbacks::model()->count($criteria);

           // данные для фильтра
//           $vocabs = new FilterTires($_GET);
           $vocabs = new FilterByTires($_GET);
           $shins = new Shins;
//           $shins->priceMin = $vocabs["price"]->min_price;
//           $shins->priceMax = $vocabs["price"]->max_price;
           // выводим вьюху
           Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/tires.js', CClientScript::POS_HEAD);
           $this->layout = 'application.views.layouts.tire_page';
           $browser = Yii::app()->mobileDetect;
           if($browser->isMobile() or $browser->isTablet() or $browser->isIphone()){
               $isMobile = true;
           }else
               $isMobile = false;
           $this->setSeoInformation("shins_display", $display->id);

           $this->breadcrumbs = array(
                array(
                    "url" => "/",
                    "title" => "Главная"
                ),
                array(
                    "url" => Yii::app()->createUrl("tires/index"),
                    "title" => "Шины"
                ),
                array(
                   "url" => Yii::app()->createUrl("tires/index", array("v11" => array($display->shins[0]->vendor_id))),
                   "title" => $display->shins[0]->vendor->vendor_name,
                ),
                array(
                    "title" => "Шины {$display->display_name}"
                ),
            );
           $this->render(
               "tire",
               array(
                  "display" => $display,
                  "display_min_price" => $min_price,
                  "season" => $season(),
                  "images" => $images,
                  "ids" => $ids,
                  "sel_tabs" => $sel_tabs,
                  "diametrs" => array_keys($shins_data),
                  "shins_data" => $shins_data,
                  "feedback" => $feedback,
                  "feedbacks" => $feedbacks,
                  "feedbacksCount" => $feedbacksCount,
                  "feedbackErrors" => $feedback->getErrors(),
                  // данные для фильтра
                  "isMobile" => $isMobile,
                  "vocabs" => $vocabs,
                  "shins" => $shins,
                  "filter_url" => Yii::app()->createUrl('/tires/index'),
                  "attributes" => $shins->attributeLabels(),
               )
           );
        }else{
            throw new CHttpException(404, "Страница не найдена");
        }
    }

    public function actionAddTireToCart($id){
        if($shina = Shins::model()->findByPk((int)$id)){
            if((int)$shina->price == 0 or (int)$shina->amount == 0){
                echo CJSON::encode(
                    array(
                        "response" => "error",
                        "errorMsg" => "Шина отсутсвует в наличии"
                    )
                );
                Yii::app()->end();
            }
        }else{
            echo CJSON::encode(
                array(
                    "response" => "error",
                    "errorMsg" => "Шина не найдена"
                )
            );
            Yii::app()->end();
        }
    }

    public function actionPriceRange(){
        if(Yii::app()->request->isAjaxRequest){
            $conn = Yii::app()->sphinx;
            $comm = $conn->createCommand()
                        ->select("MIN(price) as priceMin, MAX(price) as priceMax, 1 as ONE")
                        ->from("shinsIndex")
                        ->group("one");
            $condition = array("price > 0");
            if($v = Yii::app()->request->getPost("v")){
                $avto_product_arr = PodborShiniIDiski::model()->getShinsArray($v);
                if($avto_product_arr){
                    $t = array();
                    foreach($avto_product_arr as $item){
                        $item = str_replace("/", '\\\\\/', $item);
                        $t[] = "@product_name \"{$item}\" ";
                    }
                    $condition[] = "MATCH('".join(" | ", $t)."')";
                }
            }
            $comm->setWhere(join(" AND ", $condition));
            $range = $comm->queryRow();
            $result = array(
               "min" => (int)$range["pricemin"],
               "max" => (int)$range["pricemax"],
            );
            echo CJSON::encode($result);
            Yii::app()->end();
        }
    }

    public function actionTiresSubMenu($type, $type1 = ""){
        $where = array();
        $criteria = new CDbCriteria;
        $criteria->compare("translit", $type);
        $model = ShinsTypeOfAvto::model()->find($criteria);
        if($model === null){
            throw new CHttpException(404, "Страница не найдена");
        }
        $vocabsCond = array();
        $v10 = $model->id;
        $vocabsCond["v10"] = [$v10];
        $breadCrumbTitle = $model->value;
        $where[] = "shins_type_of_avto_id = {$model->id}";
        if($type1){
            $criteria = new CDbCriteria;
            $criteria->compare("translit", $type1);
            $model = ShinsSeason::model()->find($criteria);
            if($model === null){
                throw new CHttpException(404, "Страница не найдена");
            }
            $v8 = $model->id;
            $vocabsCond["v8"] = [$v8];
            $breadCrumbTitle .= " {$model->value}";
            $where[] = "shins_season_id = {$model->id}";
        }
        $where = join(" AND ", $where);
        $sql = "SELECT vendor_id, vendor_name, vendor_image, MAX(amount) AS cnt
                FROM shinsIndex
                WHERE {$where}
                GROUP BY vendor_id
                ORDER BY vendor_name ASC
                LIMIT 10000";
        $recs = Yii::app()->sphinx->createCommand($sql)->queryAll();
        $inStock = array_filter(
            $recs,
            function(&$v){
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
//        $vocabs = new FilterTires($vocabsCond);
        $vocabs = new FilterByTires($vocabsCond);
        $shins = new Shins;
        $shins->shins_type_of_avto_id = $v10;
        if($v8){
            $shins->shins_season_id = $v8;
        }
//        $shins->priceMin = $vocabs["price"]->min_price;
//        $shins->priceMax = $vocabs["price"]->max_price;
        // выводим вьюху
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/tires.js', CClientScript::POS_HEAD);

        $this->setSeoInformation("shins_category_{$type}", array("category" => $breadCrumbTitle));
        if(isset($_GET["page"])){
            $this->noIndex = true;
        }
        $this->breadcrumbs = array(
            array(
                "url" => "/",
                "title" => "Главная"
            ),
            array(
                "url" => Yii::app()->createUrl("tires/index"),
                "title" => "Шины"
            ),
            array(
                "url" => Yii::app()->createUrl("tires/tiresSubMenu", array("type" => $type, "type" => $type1)),
                "title" => "Шины {$breadCrumbTitle}"
            ),
        );
        $this->page_type = "tires-index-node";
        $this->layout = 'application.views.layouts.page';
        $browser = Yii::app()->mobileDetect;
        if($browser->isMobile() or $browser->isTablet() or $browser->isIphone()){
            $isMobile = true;
        }else
            $isMobile = false;
        $this->render(
            "tiresSubMenuItem",
            array(
                "inStock" => $inStock,
                "outStock" => $outStock,
                // данные для фильтра
                "isMobile" => $isMobile,
                "vocabs" => $vocabs,
                "v10" => $v10,
                "v8" => $v8,
                "shins" => $shins,
                "h2" => "Шины {$breadCrumbTitle}",
                "filter_url" => Yii::app()->createUrl('/tires/index'),
                "attributes" => $shins->attributeLabels(),
            )
        );
    }

}