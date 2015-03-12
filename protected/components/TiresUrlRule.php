<?php
/**
 * Created by PhpStorm.
 * User: Ifaliuk
 * Date: 27.03.14
 * Time: 14:31
 */

class TiresUrlRule extends CExtendsBaseUrlRule{

    private function _getDrivesPattern(){
        $translitPattern = RegExpHelper::getTextTranslitPattern();
        $doublePattern = RegExpHelper::getDoublePattern();
//        $patternArr[] = "(?:\/avto=(?<avto>{$translitPattern}))?";
        $patternArr[] = "(?:\/avto=(?<avto>[a-z0-9\-]+))?";
        $patternArr[] = "(?:\/cena_ot=(?<priceMin>\d+))?";
        $patternArr[] = "(?:\/cena_do=(?<priceMax>\d+))?";
        $patternArr[] = "(?:\/brand=(?<brand2>(?:{$translitPattern}){1}(?:\;{$translitPattern})*))?";
        $patternArr[] = "(?:\/radius=(?<radius2>(?:{$doublePattern}){1}(?:\;{$doublePattern})*))?";
        $patternArr[] = "(?:\/shirina=(?<shirina>{$doublePattern}))?";
        $patternArr[] = "(?:\/index_nagruzki=(?<index_nagruzki>[a-z0-9\-]+))?";
        $patternArr[] = "(?:\/profil=(?<profil>{$doublePattern}))?";
        $patternArr[] = "(?:\/sezon=(?<sezon>(?:{$translitPattern}){1}(?:\;{$translitPattern})*))?";
        $patternArr[] = "(?:\/tip=(?<tip>{$translitPattern}))?";
        //$patternArr[] = "(?:\/(?<run_flat>run_flat))?";
        $patternArr[] = "(?:\/run_flat=(?<run_flat>(?:{$translitPattern}){1}(?:\;{$translitPattern})*))?";
        $patternArr[] = "(?:\/shipi=(?<shipi>(?:{$translitPattern}){1}(?:\;{$translitPattern})*))?";
        $patternArr[] = "(?:\/(?<v_nalichii>v_nalichii))?";
        $patternArr[] = "(?:\/page=(?<page>\d+))?";
        $patternArr[] = "(?:\?sort=(?<sort>\d+))?";
        $filterPattern = join("", $patternArr);
        //$pattern = "^shini(?:\-(?<brand1>(?!tipa)[a-z0-9]+(?:\-[a-z0-9]+)*)?)?(?:\-R(?<radius>(?!tipa){$doublePattern}))?\.html{$filterPattern}$";
        $pattern = "^shini(?:\-(?<brand1>(?!tipa)[a-z0-9]+(?:\-[a-z0-9]+)*)?)?(?:\-R(?<radius1>(?!tipa){$doublePattern}))?\.html{$filterPattern}$";
        return "/{$pattern}/";
    }

    public function createUrl($manager,$route,$params,$ampersand){
        if($route === 'tires/index'){
            $dropDownListValue = function($param){
                if(is_array($param)){
                    return reset($param);
                }
                return $param;
            };
            $url = "shini";
            if(isset($params["v11"]) and count($params["v11"]) == 1){
                $vendor_id = reset($params["v11"]);
                $url .= "-".ShinsVendors::model()->findByPk($vendor_id)->translit;
            }
            if(isset($params["v3"]) and count($params["v3"]) == 1){
                if(is_array($params["v3"])){
                    $url .= "-R".reset($params["v3"]);
                }else{
                    $url .= "-R".$params["v3"];
                }
            }
            $url .= ".html";
            if(isset($params["v"])){ // hub
                $url .= "/avto=".AvtoModification::model()->findByPk($params["v"])->translit;
            }
            if(isset($params["v1"]) and isset($params["v2"])){ // hub
                $url .= "/cena_ot={$params['v1']}/cena_do={$params['v2']}";
            }
            if(isset($params["v11"]) and count($params["v11"]) > 1){
                $criteria = new CDbCriteria;
                $criteria->addInCondition("id", $params["v11"]);
                $vendors = ShinsVendors::model()->findAll($criteria);
                $vendors_arr = array();
                foreach($vendors as $vendor){
                    $vendors_arr[] = $vendor->translit;
                }
                if($vendors_arr){
                    $url .= "/brand=".join(";", $vendors_arr);
                }
            }
            if(isset($params["v3"]) and count($params["v3"]) > 1){
                $url .= "/radius=".join(";", $params["v3"]);
            }
            if(isset($params["v6"])){ // ширина
//                $url .= "/shirina={$params['v6']}";

                $url .= "/shirina={$dropDownListValue($params['v6'])}";
            }
            if(isset($params["v4"])){ // индекс нагрузки
//                $url .= "/index_nagruzki={$params['v4']}";
                $url .= "/index_nagruzki={$dropDownListValue($params['v4'])}";
            }
            if(isset($params["v5"])){ // профиль
//                $url .= "/profil={$params['v5']}";
                $url .= "/profil={$dropDownListValue($params['v5'])}";
            }
            if(isset($params["v8"])){ // профиль
                $criteria = new CDbCriteria;
                $criteria->addInCondition("id", $params["v8"]);
                $seasons_arr = array();
                foreach(ShinsSeason::model()->findAll($criteria) as $i => $item){
                    $seasons_arr[] = $item->translit;
                }
                if($seasons_arr){
                    $url .= "/sezon=".join(";", $seasons_arr);
                }
            }
            if(isset($params["v10"]) and !empty($params["v10"])){ // тип
                $url .= "/tip=".ShinsTypeOfAvto::model()->findByPk($params["v10"])->translit;
            }
//            if(isset($params["v7"]) and $params["v7"] == 2){ // тип
//                $url .= "/run_flat";
//            }
            if(isset($params["v7"])){ // тип
                $data = array();
                foreach($params["v7"] as $param){
                    switch($param){
                        case 1:
                            $data[] = "net_dannyh";
                            break;
                        case 2:
                            $data[] = "da";
                            break;
                        case 3:
                            $data[] = "net";
                            break;
                    }
                }
                if(count($data) > 0){
                    $url .= "/run_flat=".join(";", $data);
                }
            }
            if(isset($params["v9"])){ // шипы
                $data = array();
                foreach($params["v9"] as $param){
                    switch($param){
                        case 1:
                            $data[] = "net_dannyh";
                            break;
                        case 2:
                            $data[] = "da";
                            break;
                        case 3:
                            $data[] = "net";
                            break;
                    }
                }
                if(count($data) > 0){
                    $url .= "/shipi=".join(";", $data);
                }
            }
            if(isset($params["v13"])){ // тип
                $url .= "/v_nalichii";
            }
            if(isset($params["page"])){ // hub
                $url .= "/page={$params['page']}";
            }
            if(isset($params["sort"])){ // hub
                $url .= "?sort={$params['sort']}";
            }
            return $url;
        }
        return false;
    }

    public function parseUrl($manager, $request, $pathInfo, $rawPathInfo){
        if(preg_match_all($this->_getDrivesPattern(), $pathInfo, $matches)){
            $this->clearEmptyMatches($matches);
            if($matches["brand1"]){
                $criteria = new CDbCriteria;
                $criteria->compare("translit", $matches["brand1"]);
                $vednor = ShinsVendors::model()->find($criteria);
                if($vednor){
                    $_GET["v11"][] = $vednor->id;
                }
            }
            if($matches["brand2"]){
                $criteria = new CDbCriteria;
                $criteria->addInCondition("translit", explode(";", $matches["brand2"]));
                $vednors = ShinsVendors::model()->findAll($criteria);
                foreach($vednors as $vednor){
                    $_GET["v11"][] = $vednor->id;
                }
            }
            if($matches["shirina"]){
                $_GET["v6"][] = $matches["shirina"];
            }
            if($matches["radius1"]){
                $_GET["v3"][] = $matches["radius1"];
            }
            if($matches["radius2"]){
                foreach(explode(";", $matches["radius2"]) as $radius){
                    $_GET["v3"][] = $radius;
                }
            }
            if($matches["index_nagruzki"]){
                $_GET["v4"][] = $matches["index_nagruzki"];
            }
            if($matches["profil"]){
                $_GET["v5"][] = $matches["profil"];
            }
            if($matches["sezon"]){
                $criteria = new CDbCriteria;
                $criteria->addInCondition("translit", explode(";", $matches["sezon"]));
                $seasons = ShinsSeason::model()->findAll($criteria);
                foreach($seasons as $season){
                    $_GET["v8"][] = $season->id;
                }
            }
            if($matches["tip"]){
                $criteria = new CDbCriteria;
                $criteria->compare("translit", $matches["tip"]);
                $tip = ShinsTypeOfAvto::model()->find($criteria);
                if($tip){
                    $_GET["v10"][] = $tip->id;
                }
            }
//            if($matches["run_flat"]){
//                $_GET["v7"] = 2;
//            }
            if($matches["run_flat"]){
                $data = explode(";",  $matches["run_flat"]);
                if(is_array($data)){
                    $arr = array();
                    foreach($data as $v){
                        switch($v){
                            case "net_dannyh":
                                $arr[] = 1;
                                break;
                            case "da":
                                $arr[] = 2;
                                break;
                            case "net":
                                $arr[] = 3;
                                break;
                        }
                    }
                    if(count($arr) > 0){
                        $_GET["v7"] = $arr;
                    }
                }else{
                    switch($data){
                        case "net_dannyh":
                            $_GET["v7"] = array(1);
                            break;
                        case "da":
                            $_GET["v7"] = array(2);
                            break;
                        case "net":
                            $_GET["v7"] = array(3);
                            break;
                    }
                }
            }
            if($matches["shipi"]){
                $data = explode(";",  $matches["shipi"]);
                if(is_array($data)){
                    $arr = array();
                    foreach($data as $v){
                        switch($v){
                            case "net_dannyh":
                                $arr[] = 1;
                                break;
                            case "da":
                                $arr[] = 2;
                                break;
                            case "net":
                                $arr[] = 3;
                                break;
                        }
                    }
                    if(count($arr) > 0){
                        $_GET["v9"] = $arr;
                    }
                }else{
                    switch($data){
                        case "net_dannyh":
                            $_GET["v9"] = array(1);
                            break;
                        case "da":
                            $_GET["v9"] = array(2);
                            break;
                        case "net":
                            $_GET["v9"] = array(3);
                            break;
                    }
                }
            }
            if($matches["v_nalichii"]){
                $_GET["v13"] = 1;
            }
            if($matches["avto"]){
                $criteria = new CDbCriteria;
                $criteria->compare("translit", $matches["avto"]);
                $modif = AvtoModification::model()->find($criteria);
                if($modif){
                    $_GET["v"] = $modif->id;
                }
            }
            if($matches["priceMin"] and $matches["priceMax"]){
                $_GET["v1"] = $matches["priceMin"];
                $_GET["v2"] = $matches["priceMax"];
            }
            if($matches["page"]){
                $_GET["page"] = $matches["page"];
            }
            if($matches["sort"]){
                $_GET["sort"] = $matches["sort"];
            }
            return "tires/index";
        }
        return false;
    }

} 