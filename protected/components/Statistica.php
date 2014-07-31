<?php
/**
 * Created by PhpStorm.
 * User: Ifaliuk
 * Date: 11.02.14
 * Time: 12:12

 * use Statistica::getCount("disks");

 */

class StatisticaComplexItem{

    private $_tableName;
    private $_postCalc;

    /**
     * @param string|array $tableName
     * @param int $postCalc
     */
    public function __construct($tableName, $postCalc = 0){
        if(is_array($tableName))
            $this->_tableName = $tableName;
        else{
            $this->_tableName = array($tableName);
        }
        $this->_postCalc = $postCalc;
    }

    public function getCount($data){
        $cnt = 0;
        foreach($this->_tableName as $table){
           $cnt += $data[$table] + (int)$this->_postCalc;
        }
        return $cnt;
    }

    public function updateCount(){
        foreach($this->_tableName as $table_name){
            $sql = "SELECT count(*) FROM {$table_name}";
            $cnt = Yii::app()->db->createCommand($sql)->queryScalar();
            if(Stat::model()->isSetTableStatistica($table_name)){
                $stat = Stat::model()->find("table_name = '{$table_name}'");
                $stat->cnt = $cnt;
                $stat->save();
            }else{
                $stat = new Stat;
                $stat->table_name = $table_name;
                $stat->cnt = $cnt;
                $stat->save();
            }
        }
    }
}

class Statistica{

    private static $_instance = null;
    /**
     * @var array $data
     */
    private $_data = array();

    private $_complexItems = array();

    private function _initComplexItems(){
        $this->_complexItems["products"] = new StatisticaComplexItem(["shins", "disks"]);
        $this->_complexItems["vendors"]  = new StatisticaComplexItem(["shins_vendors", "disks_vendors"]);
        $this->_complexItems["displays"] = new StatisticaComplexItem(["shins_displays", "disks_displays"]);
        $this->_complexItems["users"] =    new StatisticaComplexItem("users", -2);
        $this->_complexItems["pages"] =    new StatisticaComplexItem("pages_view");
    }

    /**
     * @param $tableName
     * @return null|StatisticaComplexItem
     */
    private function _complexItem($tableName){
        return $this->_complexItems[$tableName];
    }

    private function __construct(){
        $this->_initComplexItems();
    }

    private function _getData($table_name = null){
        if(!$this->_data){
            array_walk(
                Stat::model()->findAll()->array,
                function($v){
                    $k = $v["table_name"];
                    $this->_data[$k] = $v["cnt"];
                },
                $this->_data
            );
        }
        return $table_name ? $this->_data[$table_name] : $this->_data;
    }

    public static function getInstance(){
        if(self::$_instance === null){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function getCount($table_name){
        if($complexItem = $this->_complexItem($table_name)){
            return $complexItem->getCount($this->_getData());
        }
        return $this->_getData($table_name);
    }

    public function updateCount($table_name){
        //@todo
        $stat = self::getInstance();
        if($item = $stat->_complexItem($table_name)){
            $item->updateCount();
        }else{
            $sql = "SELECT count(*) FROM {$table_name}";
            $cnt = Yii::app()->db->createCommand($sql)->queryScalar();
            if(Stat::model()->isSetTableStatistica($table_name)){
                $stat = Stat::model()->find("table_name = '{$table_name}'");
                $stat->cnt = $cnt;
                $stat->save();
            }else{
                $stat = new Stat;
                $stat->table_name = $table_name;
                $stat->cnt = $cnt;
                $stat->save();
            }
        }
    }

    public function updateAllCounts(){
        $stat = self::getInstance();
        $tables = array_keys($stat->_data);
        foreach($tables as $table){
            self::updateCount($table);
        }
    }

} 