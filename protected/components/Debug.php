<?php
/**
 * Created by PhpStorm.
 * User: Ifaliuk
 * Date: 12.04.14
 * Time: 1:28
 */

class Debug {

    public static function showVariable($value, $label = ""){
        echo "<hr>";
        if($label){
            echo "{$label}: <br>";
        }
        if(is_array($value)){
            echo "<pre>";
            var_dump($value);
            echo "</pre>";
        }else{
            echo $value;
        }
    }

} 