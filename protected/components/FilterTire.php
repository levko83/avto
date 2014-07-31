<?php
/**
 * Created by PhpStorm.
 * User: Ifaliuk
 * Date: 05.04.14
 * Time: 17:12
 */

class FilterTire{

    private $_where = array();
    private $_select = array();
    private $_match = array();
    private $_filter = array();
    private $_result = array();
    private $_indexName;


    public function __construct($filter){
      $this->_indexName = "shinsIndex";
      $this->_filter = $filter;
      $this->_createTiresWhere();
      $this->_getSql();
    }

    public function getResult(){
        return $this->_result;
    }

//    private function _getTiresParams(){
//        /*
//         *  widget -
//         *    - list - вернет список
//         *    - checkbox - вернет число
//         *  relation (true/false)
//         *    - если true - отфильтровываем key = 1, "не указано"
//         *  float:
//         *
//         *  "avto_modification" => "v",
//         *  "priceMin" => "v1" ,
//         *  "priceMax" => "v2" ,
//         */
//        return array(
//            "v3" => "shins_diametr",
//            "v4" => "shins_load_index",
//            "v5" => "shins_profile_height",
//            "v6" => "shins_profile_width",
//            "v7" => "shins_run_flat_technology_id",
//            "v8" => "shins_season_id",
//            "v9" => "shins_spike_id",
//            "v10" => "shins_type_of_avto_id",
//            "v11" => "vendor_id",
//        );
//    }

    private function _createTiresWhere(){
       // формирование условий WHERE и списка колонок
       if($this->_filter["v"]){
           $sql = "SELECT shina_id FROM view_shins_avto_modifications WHERE modif_id = ".(int)$this->_filter["v"];
           $rows = Yii::app()->db->createCommand($sql)->queryAll();
           $data = [];
           foreach($rows as $i => $row){
              $data[] = $row["shina_id"];
           }
           if(count($data) > 0){
               $this->_where["v"] = array(
                   "method" => "in",
                   "column" => "ident",
                   "value" => $data,
               );
           }
       }
       // условие по диапазону цен
       if($this->_filter["v1"] and $this->_filter["v2"]){
           $v1 = (int)$this->_filter["v1"];
           $v2 = (int)$this->_filter["v2"];
           $this->_select["price"] = "IF((price >= {$v1} AND price <= {$v2}), 1, 0) AS wp";
           $this->_where["price"] = array(
               "method" => "in",
               "column" => "wp",
               "value" => 1,
           );
       }
       // условие по диаметру шины
       if($this->_filter["v3"]){
           $where = SphinxHelper::SetFloatFilter("shins_diametr", $this->_filter["v3"]);
           $this->_select["v3"] = "IF(({$where}), 1, 0) AS w1";
           $this->_where["v3"] = array(
               "method" => "in",
               "column" => "w1",
               "value" => array(1),
           );
       }
       // условие по индексу нагрузки
       if($this->_filter["v4"]){
           $this->_match[] = SphinxHelper::SetStringFilter("shins_load_index_translit", $this->_filter["v4"]);
       }
        // условие по профилю
        if($this->_filter["v5"]){
            $this->_where["v5"] = array(
                "method" => "in",
                "column" => "shins_profile_height",
                "value" => $this->_filter["v5"],
            );
        }
        // условие по ширине
        if($this->_filter["v6"]){
            $this->_where["v6"] = array(
                "method" => "in",
                "column" => "shins_profile_width",
                "value" => $this->_filter["v6"],
            );
        }
        // условие по Run Flat
        if($this->_filter["v7"]){
            $where = SphinxHelper::SetIntFilter("shins_run_flat_technology_id", $this->_filter["v7"]);
            $this->_select["v7"] = "IF(({$where}), 1, 0) AS w4";
            $this->_where["v7"] = array(
                "method" => "in",
                "column" => "shins_run_flat_technology_id",
                "value" => $this->_filter["v7"],
            );
        }
        // условие по сезону
        if($this->_filter["v8"]){
            $where = SphinxHelper::SetIntFilter("shins_season_id", $this->_filter["v8"]);
            $this->_select["v8"] = "IF(({$where}), 1, 0) AS w2";
            $this->_where["v8"] = array(
                "method" => "in",
                "column" => "shins_season_id",
                "value" => $this->_filter["v8"],
            );
        }
        // условие по шипам
        if($this->_filter["v9"]){
            $where = SphinxHelper::SetIntFilter("shins_spike_id", $this->_filter["v9"]);
            $this->_select["v9"] = "IF(({$where}), 1, 0) AS w5";
            $this->_where["v9"] = array(
                "method" => "in",
                "column" => "shins_spike_id",
                "value" => $this->_filter["v9"],
            );
        }
        // условие по типу авто
        if($this->_filter["v10"]){
            $this->_where["v10"] = array(
                "method" => "in",
                "column" => "shins_type_of_avto_id",
                "value" => $this->_filter["v10"],
            );
        }
        // условие по производителю
        if($this->_filter["v11"]){
            $where = SphinxHelper::SetIntFilter("vendor_id", $this->_filter["v11"]);
            $this->_select["v11"] = "IF(({$where}), 1, 0) AS w3";
            $this->_where["v11"] = array(
                "method" => "in",
                "column" => "vendor_id",
                "value" => $this->_filter["v11"],
            );
        }
//        // условие по наличию
//        if($this->_filter["v12"]){
//            $this->_where["v12"] = array(
//                "type" => "int",
//                "method" => "range",
//                "column" => "amount",
//                "min" => 1,
//                "max" => 1000000,
//            );
//        }
    }

    private function _getSql(){
        $createFilterConditions = function(&$cl, $where){
            foreach($where as $filterItem){
                $cl->SetFilter($filterItem["column"], $filterItem["value"]);
            }
        };
        require(Yii::getPathOfAlias("application.components")."/sphinxapi.php");
        $cl = new SphinxClient();
        $cl->SetServer('127.0.0.1', 9312);
        $cl->SetRankingMode(SPH_RANK_PROXIMITY_BM25);
        $cl->SetMatchMode(SPH_MATCH_EXTENDED2);
        $cl->SetLimits(0, 1000);
        //$cl->SetArrayResult(true);
        $i = 0;
        $vocabs = array();
        // price
            $cl->ResetFilters();
            $cl->ResetGroupBy();
            $select = array("MIN(price) AS min_price", "MAX(price) AS max_price", "1 AS c", "IF(price > 0, 1, 0) AS c1");
            $select = array_merge($select, $this->_select);
            $cl->SetSelect(join(", ", $select));
            $where = $this->_where;
            //if(isset($where["v1"])) unset($where["v1"]);
            $createFilterConditions($cl, $where);
            $cl->SetFilter("c1", array(1));
            $cl->SetGroupBy("c", SPH_GROUPBY_ATTR);
            $vocabs[$i++] = array("field" => "price");
            if(count($this->_match) > 0){
                $match = join(" | ", $this->_match);
            }else{
                $match = "";
            }
            $cl->AddQuery($match, "shinsIndex");
        // диаметр
            $cl->ResetFilters();
            $cl->ResetGroupBy();
            $select = array("shins_diametr", "count(*)");
            $select = array_merge($select, $this->_select);
            $cl->SetSelect(join(", ", $select));
            $where = $this->_where;
            if(isset($where["v3"])) unset($where["v3"]);
            $createFilterConditions($cl, $where);
            $cl->SetFilterRange("shins_diametr", 1, 1000000);
            $sort = [];
            if(isset($this->_where["v3"])){
                $sort[] = "w1 DESC";
            }
            $sort[] = "shins_diametr ASC";
            $cl->SetGroupBy("shins_diametr", SPH_GROUPBY_ATTR, join(", ", $sort));
            $vocabs[$i++] = array("field" => "shins_diametr");
            if(count($this->_match) > 0){
                $match = join(" | ", $this->_match);
            }else{
                $match = "";
            }
            $cl->AddQuery($match, "shinsIndex");
        // индекс нагрузки
            $cl->ResetFilters();
            $cl->ResetGroupBy();
            $select = array("shins_load_index_translit", "shins_load_index", "count(*)");
            $select = array_merge($select, $this->_select);
            $cl->SetSelect(join(", ", $select));
            $where = $this->_where;
            if(isset($where["v4"])) unset($where["v4"]);
            $createFilterConditions($cl, $where);
            $cl->SetGroupBy("shins_load_index_translit", SPH_GROUPBY_ATTR, "shins_load_index ASC");
            $vocabs[$i++] = array("field" => "shins_load_index");
//            if(count($this->_match) > 0){
//                $match = join(" | ", $this->_match);
//            }else{
//                $match = "";
//            }
            $match = "";
            $cl->AddQuery("", "shinsIndex");
        // индекс по профилю
            $cl->ResetFilters();
            $cl->ResetGroupBy();
            $select = array("shins_profile_height", "count(*)");
            $select = array_merge($select, $this->_select);
            $cl->SetSelect(join(", ", $select));
            $where = $this->_where;
            if(isset($where["v5"])) unset($where["v5"]);
            $createFilterConditions($cl, $where);
            $cl->SetFilterRange("shins_profile_height", 0.01, 1000000);
            $cl->SetGroupBy("shins_profile_height", SPH_GROUPBY_ATTR, "shins_profile_height ASC");
            $vocabs[$i++] = array("field" => "shins_profile_height");
            if(count($this->_match) > 0){
                $match = join(" | ", $this->_match);
            }else{
                $match = "";
            }

            $cl->AddQuery($match, "shinsIndex");
        // индекс по ширине
            $cl->ResetFilters();
            $cl->ResetGroupBy();
            $select = array("shins_profile_width", "count(*)");
            $select = array_merge($select, $this->_select);
            $cl->SetSelect(join(", ", $select));
            $where = $this->_where;
            if(isset($where["v6"])) unset($where["v6"]);
            $createFilterConditions($cl, $where);
            $cl->SetFilterRange("shins_profile_width", 0.01, 1000000);
            $cl->SetGroupBy("shins_profile_width", SPH_GROUPBY_ATTR, "shins_profile_width ASC");
            $vocabs[$i++] = array("field" => "shins_profile_width");
            if(count($this->_match) > 0){
                $match = join(" | ", $this->_match);
            }else{
                $match = "";
            }
            $cl->AddQuery($match, "shinsIndex");
        // сезонность
            $cl->ResetFilters();
            $cl->ResetGroupBy();
            $select = array("shins_season_id", "shins_season", "count(*)");
            $select = array_merge($select, $this->_select);
            $cl->SetSelect(join(", ", $select));
            $where = $this->_where;
            if(isset($where["v8"])) unset($where["v8"]);
            $createFilterConditions($cl, $where);
            $sort = [];
            if(isset($this->_where["v8"])){
                $sort[] = "w2 DESC";
            }
            $sort[] = "shins_season ASC";
            $cl->SetGroupBy("shins_season_id", SPH_GROUPBY_ATTR, join(", ", $sort));
            $vocabs[$i++] = array("field" => "shins_season_id");
            if(count($this->_match) > 0){
                $match = join(" | ", $this->_match);
            }else{
                $match = "";
            }
            $cl->AddQuery($match, "shinsIndex");
        // тип авто
            $cl->ResetFilters();
            $cl->ResetGroupBy();
            $select = array("shins_type_of_avto_id", "shins_type_of_avto", "count(*)");
            $select = array_merge($select, $this->_select);
            $cl->SetSelect(join(", ", $select));
            $where = $this->_where;
            if(isset($where["v10"])) unset($where["v10"]);
            $createFilterConditions($cl, $where);
            $cl->SetGroupBy("shins_type_of_avto_id", SPH_GROUPBY_ATTR, "shins_type_of_avto ASC");
            $vocabs[$i++] = array("field" => "shins_type_of_avto_id");
            if(count($this->_match) > 0){
                $match = join(" | ", $this->_match);
            }else{
                $match = "";
            }
            $cl->AddQuery($match, "shinsIndex");
        // Run Flat
            $cl->ResetFilters();
            $cl->ResetGroupBy();
            $select = array("shins_run_flat_technology_id", "count(*)");
            $select = array_merge($select, $this->_select);
            $cl->SetSelect(join(", ", $select));
            $where = $this->_where;
            if(isset($where["v7"])) unset($where["v7"]);
            $createFilterConditions($cl, $where);
            $sort = [];
            if(isset($this->_where["v7"])){
                $sort[] = "w4 DESC";
            }
            $sort[] = "shins_run_flat_technology_id ASC";
            $cl->SetGroupBy("shins_run_flat_technology_id", SPH_GROUPBY_ATTR, join(", ", $sort));
            $vocabs[$i++] = array("field" => "shins_run_flat_technology_id");
            if(count($this->_match) > 0){
                $match = join(" | ", $this->_match);
            }else{
                $match = "";
            }
            $cl->AddQuery($match, "shinsIndex");
        // Шипы
            $cl->ResetFilters();
            $cl->ResetGroupBy();
            $select = array("shins_spike_id", "count(*)");
            $select = array_merge($select, $this->_select);
            $cl->SetSelect(join(", ", $select));
            $where = $this->_where;
            if(isset($where["v9"])) unset($where["v9"]);
            $createFilterConditions($cl, $where);
            $sort = [];
            if(isset($this->_where["v9"])){
                $sort[] = "w5 DESC";
            }
            $sort[] = "shins_spike_id ASC";
            $cl->SetGroupBy("shins_spike_id", SPH_GROUPBY_ATTR, join(", ", $sort));
            $vocabs[$i++] = array("field" => "shins_spike_id");
            if(count($this->_match) > 0){
                $match = join(" | ", $this->_match);
            }else{
                $match = "";
            }
            $cl->AddQuery($match, "shinsIndex");
        // производитель
            $cl->ResetFilters();
            $cl->ResetGroupBy();
            $select = array("vendor_id", "vendor_name", "count(*)");
            $select = array_merge($select, $this->_select);
            $cl->SetSelect(join(", ", $select));
            $where = $this->_where;
            if(isset($where["v11"])) unset($where["v11"]);
            $createFilterConditions($cl, $where);
            $sort = [];
            if(isset($this->_where["v11"])){
                $sort[] = "w3 DESC";
            }
            $sort[] = "vendor_name ASC";
            $cl->SetGroupBy("vendor_id", SPH_GROUPBY_ATTR, join(", ", $sort));
            $vocabs[$i++] = array("field" => "vendor_id");
            if(count($this->_match) > 0){
                $match = join(" | ", $this->_match);
            }else{
                $match = "";
            }
            $cl->AddQuery($match, "shinsIndex");

        //----------------------
        $res = $cl->RunQueries();
        if($res === false ) {
            echo "Query failed: {$cl->GetLastError()}</br>";
        }else{
            $this->_result = array();
            $i = 0;
            foreach($res as $res_item){
                $field = $vocabs[$i++]["field"];
                if(!empty($res_item["matches"])){
                    foreach($res_item["matches"] as $match){
                        $this->_result[$field][] = $match["attrs"];
                    }
                }
            }
        }
    }

    private function _prepareSphinxListData($match, $key_field, $value_field, $selected_field = null){
        if(!$match){
            return null;
        }
        $urlKeyValues = array(
            "v3" => "shins_diametr",
            "v4" => "shins_load_index",
            "v5" => "shins_profile_height",
            "v6" => "shins_profile_width",
            "v7" => "shins_run_flat_technology_id",
            "v8" => "shins_season_id",
            "v9" => "shins_spike_id",
            "v10" => "shins_type_of_avto_id",
            "v11" => "vendor_id",
        );
        foreach($match as $item){
            if($key_field == "shins_run_flat_technology_id" or $key_field == "shins_spike_id"){
                switch($item[$value_field]){
                    case 1: $v = "нет данных"; break;
                    case 2: $v = "ecть"; break;
                    case 3: $v = "нет"; break;
                }
            }else{
                $v = $item[$value_field];
            }
            $v = "{$v} (+{$item["@count"]})";
            $data[$item[$key_field]] = $v;
        }
        return $data;
    }

    public function getVocabulary($field_name){
        if($field_name == "price"){
            if(isset($this->_result["price"]) and $this->_result["price"][0]["min_price"] != $this->_result["price"][0]["max_price"]){
                return array(
                    "min_price" => $this->_result["price"][0]["min_price"],
                    "max_price" => $this->_result["price"][0]["max_price"],
                );
            }else{
                return null;
            }
        }
        if($field_name == "shins_diametr"){
            return $this->_prepareSphinxListData(
                $this->_result["shins_diametr"],
                "shins_diametr",
                "shins_diametr",
                "w1"
            );
        }
        if($field_name == "shins_load_index"){
            return $this->_prepareSphinxListData(
                $this->_result["shins_load_index"],
                "shins_load_index_translit",
                "shins_load_index"
            );
        }
        if($field_name == "shins_profile_height"){
            return $this->_prepareSphinxListData(
                $this->_result["shins_profile_height"],
                "shins_profile_height",
                "shins_profile_height"
            );
        }
        if($field_name == "shins_profile_width"){
            return $this->_prepareSphinxListData(
                $this->_result["shins_profile_width"],
                "shins_profile_width",
                "shins_profile_width"
            );
        }
        if($field_name == "shins_season_id"){
            return $this->_prepareSphinxListData(
                $this->_result["shins_season_id"],
                "shins_season_id",
                "shins_season",
                "w2"
            );
        }
        if($field_name == "shins_type_of_avto_id"){
            return $this->_prepareSphinxListData(
                $this->_result["shins_type_of_avto_id"],
                "shins_type_of_avto_id",
                "shins_type_of_avto"
            );
        }
        if($field_name == "shins_run_flat_technology_id"){
            return $this->_prepareSphinxListData(
                $this->_result["shins_run_flat_technology_id"],
                "shins_run_flat_technology_id",
                "shins_run_flat_technology_id"
            );
        }
        if($field_name == "shins_spike_id"){
            return $this->_prepareSphinxListData(
                $this->_result["shins_spike_id"],
                "shins_spike_id",
                "shins_spike_id"
            );
        }
        if($field_name == "vendor_id"){
            return $this->_prepareSphinxListData(
                $this->_result["vendor_id"],
                "vendor_id",
                "vendor_name",
                "w3"
            );
        }
        return null;
    }

    public function __get($field_name){
        return $this->getVocabulary($field_name);
    }

} 