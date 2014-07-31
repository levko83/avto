<?php
/**
 * Created by PhpStorm.
 * User: Ifaliuk
 * Date: 20.03.14
 * Time: 16:58
 */

class Menu{

    private $_sitePages = array();
    private $_shinsSubMenu = array();
    private $_disksSubMenu = array();

    private static $_instance = null;

    private function __construct(){
        $this->_makeSitePages();
    }

    public static function getInstance(){
        if(!isset(self::$_instance)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    private function _checkOnNewPages(){
        $subMenu = array(
            "shini" => array(
                2 => "ShinsTypeOfAvto",
                3 => "ShinsSeason",
            ),
            "diski" => array(
                2 => "DisksType",
            ),
        );
        $pages = Pages::model()->findAll();
        $pages_array = CHtml::listData($pages, "page_key", "id");
        $page_exists = function($page_key) use ($pages_array){
            return array_key_exists($page_key, $pages_array);
        };
        foreach($pages as $page){
            $hasLevel2 = array_key_exists($page->page_key, $subMenu);
            if($hasLevel2){
                $level2data = $subMenu[$page->page_key][2]::model()->findAll("id > 1");
                $hasLevel3 = array_key_exists(3, $subMenu[$page->page_key]);
                if($hasLevel3){
                    $level3data = $subMenu[$page->page_key][3]::model()->findAll("id > 1");
                }
            }else{
                $hasLevel3 = false;
            }
            // если есть 2-й уровень
            if($hasLevel2){
                foreach($level2data as $level2){
                    if(!$page_exists("{$page->page_key}-{$level2->translit}")){
                        $newPage = new Pages;
                        $newPage->label = "{$page->label} {$level2->value}";
                        $newPage->page_key = "{$page->page_key}-{$level2->translit}";
                        $newPage->hasText = 1;
                        $newPage->level = 2;
                        $newPage->save(false);
                    }
                    $subMenuItem2 = array(
                        'label' => "{$level2->value}",
                        'urlParams' => array($level2->translit),
                    );
                    // если есть третий уровень
                    if($hasLevel3){
                        $subMenuItem3 = array();
                        foreach($level3data as $level3){
                            if(!$page_exists("{$page->page_key}-{$level2->translit}-{$level3->translit}")){
                                $newPage = new Pages;
                                $newPage->label = "{$page->label} {$level2->value} {$level3->value}";
                                $newPage->page_key = "{$page->page_key}-{$level2->translit}-{$level3->translit}";
                                $newPage->hasText = 1;
                                $newPage->level = 3;
                                $newPage->save(false);
                            }
                            $subMenuItem3[] = array(
                                'label' => "{$level3->value}",
                                'urlParams' => array($level2->translit, $level3->translit),
                            );
                        }
                        $subMenuItem2["items"] = $subMenuItem3;
                    }
                    if($page->page_key == "shini"){
                        $this->_shinsSubMenu[] = $subMenuItem2;
                    }else{
                        $this->_disksSubMenu[] = $subMenuItem2;
                    }
                }
            }
        }
    }

    private function _makeSitePages(){
        $this->_checkOnNewPages();
        $this->_sitePages = Pages::model()->findAll(array("order" => "label"))->array;
    }

    public function getSitePages(){
        return $this->_sitePages;
    }

    public function getSitePageById($id){
        $page = array_filter($this->_sitePages, function($v) use ($id){
                                                    return $v["id"] == $id;
                                                });
        return reset($page);
    }

    public function getSitePageByPageKey($page_key){
        $page = array_filter($this->_sitePages, function($v) use ($page_key){
            return $v["page_key"] == $page_key;
        });
        return reset($page);
    }

    public function getShinsSubMenu(){
        return $this->_shinsSubMenu;
    }

    public function getDisksSubMenu(){
        return $this->_disksSubMenu;
    }

}