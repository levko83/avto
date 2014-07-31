<?php
/**
 * Created by PhpStorm.
 * User: Ifaliuk
 * Date: 29.04.14
 * Time: 11:17
 */

class Logger {

    public static function trace($value, $msg = ""){
        if(!empty($msg)) {
            Yii::log("{$msg}: ", CLogger::LEVEL_INFO);
        }
        if(is_array($value)){
            Yii::log(print_r($value, true), CLogger::LEVEL_INFO);
        }else{
            Yii::log($value, CLogger::LEVEL_INFO);
        }
    }

} 