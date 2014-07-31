<?php
/**
 * Created by PhpStorm.
 * User: Ifaliuk
 * Date: 28.11.13
 * Time: 9:49
 */

class ModelFilters{

    public static function htmlSecurity($value){
        $p = new CHtmlPurifier;
//        $p->options = array(
//            'HTML.SafeObject'=>true,
//            'Output.FlashCompat'=>true,
//        );
        return $p->purify($value);
    }

} 