<?php
/**
 * Created by PhpStorm.
 * User: Ifaliuk
 * Date: 27.03.14
 * Time: 14:27
 */

class CExtendsBaseUrlRule extends CBaseUrlRule{

    final protected function clearEmptyMatches(&$matches){
        foreach($matches as $k => $v){
            if(is_int($k) or !$v[0]){
                unset($matches[$k]);
            }else{
                $matches[$k] = $v[0];
            }
        }
    }

    public function createUrl($manager, $route, $params, $ampersand){}

    public function parseUrl($manager, $request, $pathInfo, $rawPathInfo){}

} 