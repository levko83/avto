<?php
/**
 * Created by PhpStorm.
 * User: Ifaliuk
 * Date: 26.03.14
 * Time: 15:54
 */

class RegExpHelper {

    public static function getTextTranslitPattern(){
        return "\w+(?:\-\w+)*";
    }

    public static function getDoublePattern(){
        return "\d+(?:\.\d+)?";
    }

} 