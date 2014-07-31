<?php
/**
 * Created by PhpStorm.
 * User: Ifaliuk
 * Date: 13.03.14
 * Time: 9:30
 * @property-read array $array
 */
class CFindResultActiveRecord extends ArrayObject{

    private $_resultArray = array();

    public function __construct($inputArrayOfActiveRecord, $inputArrayOfArray){
        parent::__construct($inputArrayOfActiveRecord, ArrayObject::STD_PROP_LIST);
        $this->_resultArray = $inputArrayOfArray;
    }

    public function getArray($key_field = null){
        if(count($this->_resultArray) === 0){
            return array();
        }
        if($key_field){
            if(!array_key_exists($key_field, $this->_resultArray[0])){
                return $this->_resultArray;
            }
            $result = array();
            foreach($this->_resultArray as $resultItem){
                $result[$resultItem[$key_field]] = $resultItem;
            }
            return $result;
        }else{
            return $this->_resultArray;
        }
    }

    public function __get($name){
        if($name === "array"){
            return $this->_resultArray;
        }else{
            throw new Exception("Переменная {$name} не существует");
        }
    }

}