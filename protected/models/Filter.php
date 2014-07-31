<?php
/**
 * Created by PhpStorm.
 * User: Ifaliuk
 * Date: 05.12.13
 * Time: 15:40
 @property ProductFilter $product_filer;
 */

class Filter extends CFormModel{

    private $_properties;

    public $product_filter;

    public function rules(){
        $rules = array();
        foreach($this->product_filter->filterFieldsProps as $property_name => $property){
           $rules[] = array("{$property_name}", "filterValidator", "safe");
        }
        return $rules;
    }

    public function filterValidator($attribute, $params){
        $property = $this->product_filter->filterFieldsProps[$attribute];
        if($property->widget == "select"){
            $v = $this->$attribute;
            if(!in_array($this->$attribute, $property->values)){
                $this->$attribute = null;
                return;
            }else{

            }
        }else{
            if(is_array($this->$attribute) and count($this->$attribute) > 0){
                $this->$attribute = array_map(
                                        function($v){
                                           return (int)$v;
                                        },
                                        $this->$attribute
                                    );
            }else{
                $this->$attribute = null;
                return;
            }
        }
    }

    public function __set($name, $value)
    {
        if($name == "attributes")
            $this->_properties = $value;
        else
            $this->_properties[$name] = $value;
    }

    public function __get($name)
    {
        if (isset($this->_properties[$name]))
            return $this->_properties[$name];
        else
            return null;
    }


} 