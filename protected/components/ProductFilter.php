<?php
/**
 * Created by PhpStorm.
 * User: Ifaliuk
 * Date: 05.12.13
 * Time: 12:01
 * @property string $filterFieldsProps;
 * @property string $filterFieldsNames;
 */

class ProductFilter{

    public $filterFieldsProps;
    public $filterFieldsNames;
    public $min_price;
    public $max_price;
    public $type;
    private $_product_model;

    // $type = ['shins', 'disks']
    public function __construct($type){
        $this->type = $type;
        $this->_product_model = $type == 'shins' ? Shins : Disks;
        $this->getFieldsProps();
    }

    public function isFieldExists($field_name){
        return in_array($field_name, $this->filterFieldsNames);
    }

    private function getSelectValues($field_name){
        $pm = $this->_product_model;
        $t = $pm::model()->tableName();
        $sql = "SELECT CAST(ROUND({$field_name}, 1) AS CHAR)+0 as val
                FROM {$t}
                WHERE NOT {$field_name} IS NULL
                GROUP BY CAST(ROUND({$field_name}, 1) AS CHAR)+0
                ORDER BY CAST(ROUND({$field_name}, 1) AS CHAR)+0";
        $arr = array();
        foreach(Yii::app()->db->createCommand($sql)->queryAll() as $item){
            $arr[$item["val"]] = $item["val"];
        }
        return $arr;
    }

    private function getCheckBoxesValues($field_name){
        $pm = $this->_product_model;
        $rels = array_filter($pm::model()->relations(),
                             function($v)use($field_name){
                                 return $v[2] == $field_name;
                             });
        reset($rels);
        $voc = $rels[key($rels)][1];
        $value_name = $field_name == 'vendor_id' ? 'vendor_name' : 'value';
        $criteria = new CDbCriteria;
        $criteria->select = "id, {$value_name}";
        $criteria->addCondition("id > 1");
        $criteria->order = "{$value_name}";
        $arr = array();
        foreach($voc::model()->findAll($criteria) as $item){
           $arr[$item->id] = $item->$value_name;
        }
        return $arr;
    }

    private function getPrice(){
        $pm = $this->_product_model;
        $t = $pm::model()->tableName();
        $sql = "SELECT CAST(MIN(price) AS CHAR)+0 as min_price, CAST(MAX(price) AS CHAR)+0 as max_price
                FROM {$t}";
        $price = Yii::app()->db->createCommand($sql)->queryRow();
        $this->min_price = $price["min_price"];
        $this->max_price = $price["max_price"];
    }

    private function getFieldsProps(){
        $this->getPrice();
        $model_name = $this->type == "shins" ? ShinsParams : DisksParams;
        $model = $model_name::model()->findAll("NOT filter_widget IS NULL");
        $this->filterFieldsProps = array();
        $this->filterFieldsNames = array();
        foreach($model as $item){
            $this->filterFieldsNames[] = $item->param_name;
            $this->filterFieldsProps[$item->param_name] = (object)array(
                                                                    'label' => $item->param_text,
                                                                    'widget' => $item->filter_widget,
                                                                    'values' => $item->filter_widget == 'select' ? $this->getSelectValues($item->param_name) : $this->getCheckBoxesValues($item->param_name),
                                                                  );
        };
    }

}