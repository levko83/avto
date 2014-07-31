<?php
/**
 * Created by PhpStorm.
 * User: Ifaliuk
 * Date: 17.01.14
 * Time: 15:53
 */

class BrowserDetector {

    public static function isMobile(){
        $browser = Yii::app()->mobileDetect;
        if($browser->isMobile() or $browser->isTablet() or $browser->isIphone()){
            return true;
        }else{
            return false;
        }
    }

} 