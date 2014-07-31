<?php
/**
 * Created by PhpStorm.
 * User: Ifaliuk
 * Date: 27.03.14
 * Time: 14:31
 */

class DrivesUrlRule extends CExtendsBaseUrlRule{

    private function _getDrivesPattern(){
        $translitPattern = RegExpHelper::getTextTranslitPattern();
        $doublePattern = RegExpHelper::getDoublePattern();
//        $patternArr[] = "(?:\/avto=(?<avto>{$translitPattern}))?";
        $patternArr[] = "(?:\/avto=(?<avto>[a-z0-9\-]+))?";
        $patternArr[] = "(?:\/cena_ot=(?<priceMin>\d+))?";
        $patternArr[] = "(?:\/cena_do=(?<priceMax>\d+))?";
        $patternArr[] = "(?:\/brand=(?<brand2>(?:{$translitPattern}){1}(?:\;{$translitPattern})*))?";
        $patternArr[] = "(?:\/radius=(?<radius2>(?:{$doublePattern}){1}(?:\;{$doublePattern})*))?";
        $patternArr[] = "(?:\/tip=(?<type>{$translitPattern}))?";
        $patternArr[] = "(?:\/shirina=(?<shirina>{$doublePattern}))?";
        $patternArr[] = "(?:\/cvet=(?<color>[;a-z0-9\-]+))?";
        $patternArr[] = "(?:\/psd=(?<psd>{$doublePattern}))?";
        $patternArr[] = "(?:\/kpo=(?<kpo>{$doublePattern}))?";
        $patternArr[] = "(?:\/et=(?<et>{$doublePattern}))?";
        $patternArr[] = "(?:\/hub=(?<hub>{$doublePattern}))?";
        $patternArr[] = "(?:\/(?<v_nalichii>v_nalichii))?";
        $patternArr[] = "(?:\/page=(?<page>\d+))?";
        $filterPattern = join("", $patternArr);
//        $pattern = "^diski(?:\-(?<brand1>(?!tipa)[a-z0-9]+(?:\-[a-z0-9]+)*)?)?(?:\-R(?<radius>(?!tipa)\d+))?\.html{$filterPattern}$";
        $pattern = "^diski(?:\-(?<brand1>(?!tipa)[a-z0-9]+(?:\-[a-z0-9]+)*)?)?(?:\-R(?<radius1>(?!tipa){$doublePattern}))?\.html{$filterPattern}$";
        return "/{$pattern}/";
    }

    public function createUrl($manager,$route,$params,$ampersand){
        if($route === 'drives/index'){
            $url = "diski";
            $dropDownListValue = function($param){
                if(is_array($param)){
                    return reset($param);
                }
                return $param;
            };
            if(isset($params["v12"]) and count($params["v12"]) == 1){
                $vendor_id = $params["v12"][0];
                $url .= "-".DisksVendors::model()->findByPk($vendor_id)->translit;
            }
            if(isset($params["v3"]) and count($params["v3"]) == 1){
                //$url .= "-R".reset($params["v3"]);
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
            if(isset($params["v12"]) and count($params["v12"]) > 1){
                $criteria = new CDbCriteria;
                $criteria->addInCondition("id", $params["v12"]);
                $vendors = DisksVendors::model()->findAll($criteria);
                $vendors_arr = array();
                foreach($vendors as $vendor){
                    $vendors_arr[] = $vendor->translit;
                }
                $url .= "/brand=".join(";", $vendors_arr);
            }
            if(isset($params["v3"]) and count($params["v3"]) > 1){
                $url .= "/radius=".join(";", $params["v3"]);
            }
            if(isset($params["v4"])){ // тип
                $url .= "/tip=".DisksType::model()->findByPk($params["v4"][0])->translit;
            }
            if(isset($params["v5"])){ // ширина
                $url .= "/shirina={$dropDownListValue($params['v5'])}";
            }
            if(isset($params["v11"])){ // цвет
                $url .= "/cvet=".join(";", $params['v11']);
            }
            if(isset($params["v6"])){ // psd
                $url .= "/psd={$dropDownListValue($params['v6'])}";
            }
            if(isset($params["v10"])){ // kpo
                $url .= "/kpo={$dropDownListValue($params['v10'])}";
            }
            if(isset($params["v7"])){ // et
                $url .= "/et={$dropDownListValue($params['v7'])}";
            }
            if(isset($params["v9"])){ // hub
                $url .= "/hub={$dropDownListValue($params['v9'])}";
            }
            if(isset($params["v13"])){ // v_nalichii
                $url .= "/v_nalichii";
            }
            if(isset($params["page"])){ // page
                $url .= "/page={$params['page']}";
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
                $vednor = DisksVendors::model()->find($criteria);
                if($vednor){
                    $_GET["v12"][] = $vednor->id;
                }
            }
            if($matches["brand2"]){
                $criteria = new CDbCriteria;
                $criteria->addInCondition("translit", explode(";", $matches["brand2"]));
                $vednors = DisksVendors::model()->findAll($criteria);
                foreach($vednors as $vednor){
                    $_GET["v12"][] = $vednor->id;
                }
            }
            if($matches["radius1"]){
                $_GET["v3"][] = $matches["radius1"];
            }
            if($matches["radius2"]){
                foreach(explode(";", $matches["radius2"]) as $radius){
                    $_GET["v3"][] = $radius;
                }
            }
            if($matches["type"]){
                $criteria = new CDbCriteria;
                $criteria->compare("translit", $matches["type"]);
                $tip = DisksType::model()->find($criteria);
                if($tip){
                    $_GET["v4"][] = $tip->id;
                }
            }
            if($matches["shirina"]){
                $_GET["v5"][] = $matches["shirina"];
            }
            if($matches["color"]){
                $arr = explode(";", $matches["color"]);
                if($arr){
                    $_GET["v11"] = $arr;
                }
            }
            if($matches["psd"]){
                $_GET["v6"][] = $matches["psd"];
            }
            if($matches["et"]){
                $_GET["v7"][] = $matches["et"];
            }
            if($matches["hub"]){
                $_GET["v9"][] = $matches["hub"];
            }
            if($matches["v_nalichii"]){
                $_GET["v13"] = 1;
            }
            if($matches["kpo"]){
                $_GET["v10"][] = $matches["kpo"];
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
            return "drives/index";
        }
        return false;
    }

} 