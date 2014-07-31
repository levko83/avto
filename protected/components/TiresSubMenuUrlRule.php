<?php

class TiresSubMenuUrlRule extends CBaseUrlRule{

    public function createUrl($manager,$route,$params,$ampersand){
        if ($route==='tires/tiresSubMenu') {
            if (isset($params['type'], $params['type1']))
                return "shini-tipa-{$params['type']}-{$params['type1']}.html";
            else
                return "shini-tipa-{$params['type']}.html";
        }
        return false;  // не применяем данное правило
    }

    public function parseUrl($manager, $request, $pathInfo, $rawPathInfo){
        $pattern = "/^shini-tipa-(\w+)(?:\-(\w+))?\.html/";
        if(preg_match($pattern, $pathInfo, $matches))//если число
        {
            if(count($matches) == 3){
                $_GET["type"] = $matches[1];
                $_GET["type1"] = $matches[2];
            }else
                $_GET["type"] = $matches[1];
            return 'tires/tiresSubMenu';
        }
        return false;
    }

} 