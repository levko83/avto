<?php
/**
 * Created by PhpStorm.
 * User: Ifaliuk
 * Date: 29.04.14
 * Time: 15:24
 */

class CBaseFilter{

    const FIELD_INT = "int";
    const FIELD_FLOAT = "float";
    const FIELD_STRING = "string";

    private $_indexName;
    private $_filter;
    private $_indexFieldsInfo;

    private $_select = array();
    private $_whereIn = array();
    private $_match = array();
    private $_sphinxQueryResult = array();

    private $_configuration = array();
    private $_configurationPrice = array();
    private $_checkBoxesFields = array();

    function __construct($indexName, $filter = array()){
        $this->_indexName = $indexName;
        $this->_filter = $filter;
        $this->_indexFieldsInfo = Yii::app()->sphinx->createCommand("DESC {$this->_indexName}Main")->queryAll();
    }

    final protected function addFilterItem($filterRuleKey, $field_1, $field_2 = null){
        $fields = array();
        $fields[] = $field_1;
        if($field_2){
            $fields[] = $field_2;
        }
        $this->_configuration[$filterRuleKey] = array(
            "fields" => $fields,
        );
    }

    final protected function addFilterPrice($filterRuleKeyMin, $filterRuleKeyMax, $field){
        $this->_configurationPrice = array(
            "min" => $filterRuleKeyMin,
            "max" => $filterRuleKeyMax,
            "field" => $field,
        );
    }

    final protected function addCheckBoxesFields(){
        foreach(func_get_args() as $checkBoxesField){
            $this->_checkBoxesFields[] = $checkBoxesField;
        }
    }

    final protected function buildVocabs(){
        $this->_makeWhereConditions();
        $this->_generateFilterValues();
    }

    private function getVocabulary($field_name, $asUrlValue = FALSE){
        if($field_name == "price"){
            if(isset($this->_result["price"]) and $this->_result["price"][0]["min_price"] != $this->_result["price"][0]["max_price"]){
                return array(
                    "min_price" => $this->_result["price"][0]["min_price"],
                    "max_price" => $this->_result["price"][0]["max_price"],
                );
            }else{
                return null;
            }
        }else{
            foreach($this->_configuration as $config){
                if($config["fields"][0] == $field_name){
                    $fields = $config["fields"];
                    break;
                }
            }
            if(count($fields) == 1){
                $fields[] = $fields[0];
            }
            return $this->_prepareSphinxListData(
                $this->_sphinxQueryResult[$field_name], $fields[0], $fields[1], $asUrlValue
            );
        }
    }

    public function __get($field_name){
        if($field_name == "price"){
            return $this->getVocabulary($field_name);
        }
        if(substr($field_name, -7) == "_as_url"){
            $field_name = substr($field_name, 0, strlen($field_name) - 7);
            $asUrlValue = true;
        }else{
            $asUrlValue = false;
        }
        $result = $this->getVocabulary($field_name, $asUrlValue);
        return $result;
    }

    private function _makeWhereConditions(){
        $sortInc = 0;
        if($this->_filter["v"]){
            if($this->_indexName == "shinsIndex"){
                $sql = "SELECT shina_id AS id FROM view_shins_avto_modifications WHERE modif_id = ".(int)$this->_filter["v"];
            }else{
                $sql = "SELECT disk_id AS id FROM view_disks_avto_modifications WHERE modif_id = ".(int)$this->_filter["v"];
            }
            $rows = Yii::app()->db->createCommand($sql)->queryAll();
            $data = [];
            foreach($rows as $i => $row){
                $data[] = $row["id"];
            }
            if(count($data) > 0){
                $this->_whereIn["v"] = array("ident", $data);
            }
        }
        if($this->_filter["v13"] and $this->_filter["v13"] == 1){
            $sortInc++;
            $this->_select["v13"] = "IF((amount > 0), 1, 0) AS w{$sortInc}";
            $this->_whereIn["v13"] = "w{$sortInc}";
        }
        if($this->_configurationPrice){
            $filterRuleKeyMin = $this->_configurationPrice["min"];
            $filterRuleKeyMax = $this->_configurationPrice["max"];
            $fieldPrice = $this->_configurationPrice["field"];
            if($this->_filter[$filterRuleKeyMin] and $this->_filter[$filterRuleKeyMax]){
                $v1 = (int)$this->_filter[$filterRuleKeyMin];
                $v2 = (int)$this->_filter[$filterRuleKeyMax];
                $sortInc++;
                $this->_select[$fieldPrice] = "IF(({$fieldPrice} >= {$v1} AND {$fieldPrice} <= {$v2}), 1, 0) AS w{$sortInc}";
                $this->_whereIn[$fieldPrice] = "w{$sortInc}";
            }
        }
        foreach($this->_configuration as $filterRuleKey => $confItem){
            if(!$this->_filter[$filterRuleKey]) continue;
            $fieldType = $this->_getFieldType($confItem["fields"][0]);
            if($fieldType == self::FIELD_INT OR $fieldType == self::FIELD_FLOAT){
                if($fieldType == self::FIELD_INT){
                    $where = SphinxHelper::SetIntFilter($confItem["fields"][0], $this->_filter[$filterRuleKey]);
                }else{
                    $where = SphinxHelper::SetFloatFilter($confItem["fields"][0], $this->_filter[$filterRuleKey]);
                }
                $sortInc++;
                $this->_select[$filterRuleKey] = "IF(({$where}), 1, 0) AS w{$sortInc}";
                $this->_whereIn[$filterRuleKey] = "w{$sortInc}";
            }else{
                $this->_match[$filterRuleKey] = SphinxHelper::SetStringFilter($confItem["fields"][0], $this->_filter[$filterRuleKey]);
            }
        }
    }

    public function getSeoValues($field_name, $filter, $prefix = ""){
        $data = $this->$field_name;
        if(!$data){
            $field_name_translit = "{$field_name}_translit";
            $data = $this->$field_name_translit;
        }
        $list = array();
        foreach($filter[$field_name] as $v){
            $str = $data[$v];
            if(preg_match("/(.*)\(\+\d+\)$/u", $str, $matches) and count($matches) == 2){
                $str = trim($matches[1]);
                if($str != "нет данных"){
                    $list[] = "{$prefix}{$str}";
                }
            }
        }
        return join(", ", $list);
    }

    private function _generateFilterValues(){
        require_once(Yii::getPathOfAlias("application.components")."/sphinxapi.php");
        $cl = new SphinxClient();
        $cl->SetServer('127.0.0.1', 9312);
        $cl->SetRankingMode(SPH_RANK_PROXIMITY_BM25);
        $cl->SetMatchMode(SPH_MATCH_EXTENDED2);
        $cl->SetLimits(0, 1000);
        $i = 0;
        $vocabs = array();
        if($this->_configurationPrice){
            $cl->ResetFilters();
            $cl->ResetGroupBy();
            $fieldPrice = $this->_configurationPrice["field"];
            $select = array_merge(
                array("MIN({$fieldPrice}) AS min_price", "MAX({$fieldPrice}) AS max_price", "1 AS c", "IF({$fieldPrice} > 0, 1, 0) AS c1"),
                $this->_select
            );
            $cl->SetSelect(join(", ", $select));
            $where = $this->_whereIn;
            foreach($where as $whereItem){
                if(is_array($whereItem)){
                    $cl->SetFilter($whereItem[0], $whereItem[1]);
                }else{
                    $cl->SetFilter($whereItem, array(1));
                }
            }
            $cl->SetFilter("c1", array(1));
            $cl->SetGroupBy("c", SPH_GROUPBY_ATTR);
            $match = $this->_match;
            if(count($match) > 0){
                $match = join(" | ", $match);
            }else{
                $match = "";
            }
            $cl->AddQuery($match, $this->_indexName);
            $vocabs[$i++] = array("field" => $fieldPrice);
        }
        foreach($this->_configuration as $filterRuleKey => $confItem){
            $cl->ResetFilters();
            $cl->ResetGroupBy();
            $select = array_merge($confItem["fields"], array("COUNT(*)"), $this->_select);
            $cl->SetSelect(join(", ", $select));
            $where = $this->_whereIn;
            if(isset($where[$filterRuleKey])) unset($where[$filterRuleKey]);
            foreach($where as $whereItem){
                if(is_array($whereItem)){
                    $cl->SetFilter($whereItem[0], $whereItem[1]);
                }else{
                    $cl->SetFilter($whereItem, array(1));
                }
            }
            $sort = array();
            if($this->_whereIn[$filterRuleKey]){
                $sort[] = $this->_whereIn[$filterRuleKey]." DESC";
            }
            if(count($confItem["fields"]) == 1){
                $sort[] = $confItem["fields"][0]." ASC";
            }else{
                $sort[] = $confItem["fields"][1]." ASC";
            }
            $cl->SetGroupBy($confItem["fields"][0], SPH_GROUPBY_ATTR, join(", ", $sort));
            $match = $this->_match;
            if(isset($match[$filterRuleKey])) unset($match[$filterRuleKey]);
            if(count($match) > 0){
                $match = join(" | ", $match);
            }else{
                $match = "";
            }
            $cl->AddQuery($match, $this->_indexName);
            $vocabs[$i++] = array("field" => $confItem["fields"][0]);
        }
        $res = $cl->RunQueries();
        if($res === false ) {
            echo "Query failed: {$cl->GetLastError()}</br>";
        }else{
            $this->_sphinxQueryResult = array();
            $i = 0;
            foreach($res as $res_item){
                $field = $vocabs[$i++]["field"];
                if(!empty($res_item["matches"])){
                    foreach($res_item["matches"] as $match){
                        $this->_sphinxQueryResult[$field][] = $match["attrs"];
                    }
                }
            }
        }
    }

    private function _getFieldType($fieldName){
        $found = array_filter(
                    $this->_indexFieldsInfo,
                    function($v) use (&$fieldName){
                       return $v["Field"] == $fieldName;
                    }
                );
        $found = reset($found);
        if(substr($found["Type"], -3) == "int"){
            return self::FIELD_INT;
        }
        if($found["Type"] == "float"){
            return self::FIELD_FLOAT;
        }
        return self::FIELD_STRING;
    }

    private function _prepareSphinxListData($match, $key_field, $value_field, $asUrlValue = FALSE){
        if(!$match){
            return null;
        }
        $urlParamFields = array();
        foreach($this->_configuration as $confRuleKey => $conf){
            $urlParamFields[$confRuleKey] = $conf["fields"][0];
        }
        $urlParam = array_search($key_field, $urlParamFields);
        if(!$urlParam){
            $urlParam = array_search($value_field, $urlParamFields);
        }
        foreach($match as $item){
            if(in_array($key_field, $this->_checkBoxesFields)){
                switch($item[$value_field]){
                    case 1: $v = "нет данных"; break;
                    case 2: $v = "ecть"; break;
                    case 3: $v = "нет"; break;
                }
            }else{
                $v = $item[$value_field];
                if(is_numeric($v)){
                    $v = (string)((double)number_format($v, 2, ".", ""));
                }
            }
            $v = "{$v} (+{$item["@count"]})";
            if($asUrlValue){
                $filter = $this->_filter;
                $filterParamKey = array_search($item[$key_field], $filter[$urlParam]);
                if (is_int($filterParamKey)) {
                    unset($filter[$urlParam][$filterParamKey]);
                } else {
                    $filter[$urlParam][] = $item[$key_field];
                }
                if($this->_indexName == "shinsIndex"){
                    $action = "tires/index";
                }else{
                    $action = "drives/index";
                }
                $href = Yii::app()->createUrl($action, $filter);
                $v = CHtml::link($v, $href);
            }
            //-----------------------
            $key = $item[$key_field];
            if(is_numeric($key)){
                $key = (string)((double)number_format($key, 2, ".", ""));
            }
            $data[$key] = $v;
        }
        return $data;
    }

}