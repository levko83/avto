<?php
/**
 * Created by PhpStorm.
 * User: mevis
 * Date: 12.03.15
 * Time: 17:46
 */

class CMultiArrayDataProvider extends CArrayDataProvider{

    protected $multiRawData = array();

    public function __construct($multiRawData,$config=array())
    {
        $this->multiRawData = $multiRawData;
        foreach($config as $key=>$value)
            $this->$key=$value;
    }

    protected function sortData($directions)
    {
        $this->rawData = array();
        if(empty($directions)){
            while($this->multiRawData){
                $this->rawData = CMap::mergeArray($this->rawData, array_shift($this->rawData));
            }
            return;
        }
        $args=array();
        $dummy=array();
        foreach($this->multiRawData as $i => $multiRawDataItem){
            foreach($directions as $name=>$descending)
            {
                $column=array();
                $fields_array=preg_split('/\.+/',$name,-1,PREG_SPLIT_NO_EMPTY);
                foreach($multiRawDataItem as $index=>$data)
                    $column[$index]=$this->getSortingFieldValue($data, $fields_array);
                $args[]=&$column;
                $dummy[]=&$column;
                unset($column);
                $direction=$descending ? SORT_DESC : SORT_ASC;
                $args[]=&$direction;
                $dummy[]=&$direction;
                unset($direction);
            }
            $args[]=&$multiRawDataItem;
            call_user_func_array('array_multisort', $args);
            $this->multiRawData[$i] = $multiRawDataItem;
        }
        while($this->multiRawData){
            $this->rawData = CMap::mergeArray($this->rawData, array_shift($this->multiRawData));
        }
    }

}