<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mevis
 * Date: 28.08.14
 * Time: 22:24
 * To change this template use File | Settings | File Templates.
 */

class SubMenu {

    private static $_instance;

    private function __construct(){}

    public static function getInstance(){
        if(!isset(self::$_instance)){
            self::$_instance = new SubMenu();
        }
        return self::$_instance;
    }

    public function getShinsSubMenu(){
        $firstLevelData = ShinsTypeOfAvto::model()->findAll("id > 1");
        $secondLevelData = ShinsSeason::model()->findAll("id > 1");
        $menu = array();
        foreach($firstLevelData as $firstLevelItem){
            $subMenu = array();
            foreach($secondLevelData as $secondLevelItem){
                $subMenu[] = array(
                    "label" => $secondLevelItem->value,
                    "itemOptions" => array(
                        "class" => "leaf-1"
                    ),
                    "url" => array(
                        "tires/tiresSubMenu",
                        "type" => $firstLevelItem->translit,
                        "type1" => $secondLevelItem->translit,
                    ),
                    "items" => $subMenu,
                );
            }
            $menu[] = array(
                "label" => $firstLevelItem->value,
                "itemOptions" => array(
                    "class" => "leaf-0"
                ),
                "url" => array(
                    "tires/tiresSubMenu",
                    "type" => $firstLevelItem->translit,
                ),
	            "items" => $subMenu,
	            "submenuOptions" => array(
                    "class" => "sub-menu-1"
                ),
            );
        }
        return $menu;
    }

    public function getDisksSubMenu(){
        $firstLevelData = DisksType::model()->findAll("id > 1");
        $menu = array();
        foreach($firstLevelData as $firstLevelItem){
            $menu[] = array(
                "label" => $firstLevelItem->value,
                "itemOptions" => array(
                    "class" => "leaf-0"
                ),
                "url" => array(
                    "drives/drivesSubMenu",
                    "type" => $firstLevelItem->translit,
                ),
            );
        }
        return $menu;
    }


}