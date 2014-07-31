<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CExtendedActiveRecord
 *
 * @author Ifaliuk
 */
class CExtendedActiveRecord extends CActiveRecord{

    /**
     * @var bool
     */
    public $saveStatistica = false;

    public function getSingleData($prop_name){
        $class = __CLASS__;
        $rel = $this->relations();
        $relations = array_filter(
                        $this->relations(), 
                        function($relation) USE ($prop_name){
                            return $relation[2] == $prop_name;
                        }
                     );
        if(count($relations) > 0){
            reset($relations);
            $relationName = key($relations);
            return $this->$relationName->value;            
        }             
        return $this->$prop_name;
    }

    public function isParam($param_name){
        return  $this->$param_name and ($this->$param_name = trim(strip_tags($this->$param_name))) != "";
    }

    public function listFieldNumberValues($field_name, $addAll = false){
        $t = $this->tableName();
        $sql = "SELECT CAST(ROUND({$field_name}, 1) AS CHAR)+0 as val
                FROM {$t}
                WHERE NOT {$field_name} IS NULL
                GROUP BY CAST(ROUND({$field_name}, 1) AS CHAR)+0
                ORDER BY CAST(ROUND({$field_name}, 1) AS CHAR)+0";
        $arr = array();
        if($addAll == true){
            $arr[""] = "Все";
        }
        foreach(Yii::app()->db->createCommand($sql)->queryAll() as $item){
            $arr[$item["val"]] = $item["val"];
        }
        return $arr;
    }

    public function listFieldStringValues($field_name, $addAll = false){
        $t = $this->tableName();
        $sql = "SELECT {$field_name} as val
                FROM {$t}
                WHERE LENGTH(TRIM({$field_name})) > 0
                GROUP BY {$field_name}
                ORDER BY {$field_name}";
        $arr = array();
        if($addAll == true){
            $arr[""] = "Все";
        }
        foreach(Yii::app()->db->createCommand($sql)->queryAll() as $item){
            $arr[$item["val"]] = $item["val"];
        }
        return $arr;
    }

    public function listVocabValues($field_name, $addAll = false){
        $rel = $this->relations();
        $relations = array_filter(
            $this->relations(),
            function($relation) USE ($field_name){
                return $relation[2] == $field_name;
            }
        );
        reset($relations);
        $v = current($relations);
        $vocModel = $v[1];
        $valField = $field_name == 'vendor_id' ? "vendor_name" : 'value';
        $arr = array();
        if($addAll == true){
            $arr[""] = "Все";
        }
        $criteria = new CDbCriteria;
        $criteria->addCondition("id > 1");
        $criteria->order = "$valField";
        foreach($vocModel::model()->findAll($criteria) as $item){
            $arr[$item->id] = $item->$valField;
        }
        return $arr;
    }

    public function htmlSecurity($value){
        $p = new CHtmlPurifier;
//        $p->options = array(
//            'HTML.SafeObject'=>true,
//            'Output.FlashCompat'=>true,
//        );
        return $p->purify($value);
    }

    public function truncateTable()
    {
        $this->getDbConnection()->createCommand()->truncateTable($this->tableName());
    }

    /**
     * @param array $data
     * @param bool $callAfterFind
     * @param null $index
     * @return CFindResultActiveRecord
     */
    public function populateRecords($data,$callAfterFind=true,$index=null){
        $records=array();
        foreach($data as $attributes)
        {
            if(($record=$this->populateRecord($attributes,$callAfterFind))!==null)
            {
                if($index===null)
                    $records[]=$record;
                else
                    $records[$record->$index]=$record;
            }
        }
        return new CFindResultActiveRecord($records, $data);
    }

    protected function query($criteria,$all=false)
    {
        $this->beforeFind();
        $this->applyScopes($criteria);

        if(empty($criteria->with))
        {
            if(!$all)
                $criteria->limit=1;
            $command=$this->getCommandBuilder()->createFindCommand($this->getTableSchema(),$criteria,$this->getTableAlias());
            return $all ? $this->populateRecords($command->queryAll(), true, $criteria->index) : $this->populateRecord($command->queryRow());
        }
        else
        {
            $finder=$this->getActiveFinder($criteria->with);
            return $finder->query($criteria,$all);
        }
    }
    
}

?>
