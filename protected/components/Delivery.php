<?php
/**
 * Created by PhpStorm.
 * User: Ifaliuk
 * Date: 23.05.14
 * Time: 13:58
 */

class Delivery{

    private static $_inst;

    private function __construct(){}

    public static function instance(){
        if(!isset(self::$_inst)){
            self::$_inst = new self();
        }
        return self::$_inst;
    }

    public function getRegionalCenter($region_translit){
        return Yii::app()->db->createCommand()
            ->select("n.name_translit")
            ->from("nova_warehouse n")
            ->where("n.level = 2 AND n.root = (SELECT id FROM nova_warehouse WHERE name_translit = :region_translit)", array(":region_translit" => $region_translit))
            ->order("(SELECT count(*) FROM nova_warehouse WHERE lft > n.lft AND rgt < n.rgt AND root = n.root) DESC")
            ->limit(1)
            ->queryScalar();
    }

    public function getRegions(){
        $result = NovaWarehouse::model()->findAll("level = 1");
        return CHtml::listData($result, "name_translit", "name");
    }

    public function getRegionCities($region_translit){
        $result = Yii::app()->db->createCommand()
            ->select("t.name, t.name_translit")
            ->from("(
                        SELECT n.name as name, n.name_translit as name_translit
                        FROM nova_warehouse n
                        WHERE n.level = 2 and n.root = (SELECT id FROM nova_warehouse WHERE name_translit = :region_translit and level = 1)
                        UNION ALL
                        SELECT i.name as name, i.name_translit as name_translit
                        FROM intime_warehouse i
                        WHERE i.level = 2 and i.root = (SELECT id FROM nova_warehouse WHERE name_translit = :region_translit and level = 1)
                    ) t")
            ->group("t.name, t.name_translit")
            ->order("t.name")
            ->where(null, array(":region_translit" => $region_translit))
            ->queryAll();
        return (object)array(
            "cities" => CHtml::listData($result, "name_translit", "name"),
            "regionalCenter" => $this->getRegionalCenter($region_translit),
        );
    }


} 