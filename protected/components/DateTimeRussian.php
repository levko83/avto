<?php
/**
 * Created by PhpStorm.
 * User: Ifaliuk
 * Date: 20.01.14
 * Time: 10:12
 */

class DateTimeRussian {

    public static function getDate($datetime){
        $monthes = array(
            1 => "января",
            2 => "февраля",
            3 => "марта",
            4 => "апреля",
            5 => "мая",
            6 => "июня",
            7 => "июля",
            8 => "августа",
            9 => "сентября",
            10 => "октября",
            11 => "ноября",
            12 => "декабря"
        );
        $date = getdate($datetime);
        return $date["mday"]." ".$monthes[$date["mon"]]." ".$date["year"];
    }

} 