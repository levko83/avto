<?php

class MainUrlRule extends CBaseUrlRule{

    public function createUrl($manager,$route,$params,$ampersand){
        return false;
    }

    public function parseUrl($manager,$request,$pathInfo,$rawPathInfo){
        return false;
    }

} 