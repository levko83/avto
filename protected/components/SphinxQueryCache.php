<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mevis
 * Date: 25.01.15
 * Time: 16:54
 * To change this template use File | Settings | File Templates.
 */

class SphinxQueryCache{

    private static function __sortFilter($filter, $limit){
        $buff_filter = array("limit" => $limit);
        if($filter == null){
            return $buff_filter;
        }
        $filter_keys = array_keys($filter);
        sort($filter_keys);
        foreach($filter_keys as $filter_key){
            $val = $filter[$filter_key];
            if(is_null($val)){
                continue;
            }
            if(is_array($val)){
                sort($val);
                $buff_filter[$filter_key] = $val;
            }else{
                $buff_filter[$filter_key] = $val;
            }
        }
        return $buff_filter;
    }

    private static function _getCacheValue($cache_key, $filter, $limit){
        $id = "{$cache_key}_".md5(serialize(self::__sortFilter($filter, $limit)));
        return Yii::app()->cache->get($id);
    }

    private static function _setCacheValue($cache_key, $filter, $limit, $data){
        $id = "{$cache_key}_".md5(serialize(self::__sortFilter($filter, $limit)));
        Yii::app()->cache->set($id, $data);
        $cache_arr = Yii::app()->getGlobalState("cache_{$cache_key}", array());
        $cache_arr[] = $id;
        Yii::app()->setGlobalState("cache_{$cache_key}", $cache_arr);
    }

    private static function _clearCache($cache_key){
        foreach(Yii::app()->getGlobalState("cache_{$cache_key}", array()) as $id){
            Yii::app()->cache->delete($id);
        }
    }

    public static function getDisksDisplays($filter, $limit){
        return self::_getCacheValue("disks_displays", $filter, $limit);
    }

    public static function setDisksDisplays($filter, $data, $limit){
        self::_setCacheValue("disks_displays", $filter, $limit, $data);
    }

    public static function clearDisksDisplays(){
        self::_clearCache("disks_displays");
    }

    public static function getShinsDisplays($filter, $limit){
        return self::_getCacheValue("shins_displays", $filter, $limit);
    }

    public static function setShinsDisplays($filter, $data, $limit){
        self::_setCacheValue("shins_displays", $filter, $limit, $data);
    }

    public static function clearShinsDisplays(){
        self::_clearCache("shins_displays");
    }

}