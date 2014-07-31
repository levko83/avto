<?php
/**
 * Allows to translate strings using Yii::t().
 *
 * Syntax:
 * {t text="text to translate" cat="app"}
 * {t text="text to translate" cat="app" src="en" lang="ru"}
 * {t text="text to translate" cat="app" params=$params}
 *
 * @see Yii::t().
 *
 * @param array $params
 * @param Smarty $smarty
 * @return string
 */
function smarty_function_CHtml($params, &$smarty) {    
    $func_name = $params['function'];
    $class = new ReflectionClass('CHtml');
    if(!$class->hasMethod($func_name)){
        throw new CException(Yii::t('yiiext', "Метод <b>$func_name</b> в классе СHtml не найден"));
    }    
    $method = new ReflectionMethod('CHtml', $func_name);
    $call_params = array();
    foreach($method->getParameters() as $method_parametr){
        $prop_name = $method_parametr->name;
        $call_params[] = $params[$prop_name];
    }
    return $method->invokeArgs(NULL, $call_params);    
}