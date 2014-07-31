<?php

 class DbHelper{
     
     static function getNewId(CActiveRecord $model, $idField = 'id'){
         $table = $model->tableName();
         $curdb  = explode('=', Yii::app()->db->connectionString);
         $db = $curdb[2];
         $sql = "select auto_increment from information_schema.TABLES where TABLE_NAME ='$table' and TABLE_SCHEMA='$db'";
         return Yii::app()->db->createCommand($sql)->queryScalar();
     }
     
     public static function getRelationDictionaryRecords($tableName, $id){         
         $curdb  = explode('=', Yii::app()->db->connectionString);
         $db = $curdb[2];
         $sql = "select TABLE_NAME from information_schema.COLUMNS where COLUMN_NAME ='$tableName' and TABLE_SCHEMA='$db'";
         $cnt = 0;
         foreach(Yii::app()->db->createCommand($sql)->queryAll() as $rec){
             $model = $rec["TABLE_NAME"];     
             $sql = "SELECT count(*) FROM {$model} WHERE {$tableName} = {$id}";
             $cnt += Yii::app()->db->createCommand($sql)->queryScalar();
         }
         return $cnt;
     }
     
     static function vocabSelectListData($modelName){
         //$arr = array(0 => "Все");         
         $arr = array();         
         foreach($modelName::model()->findAll() as $row){
             $arr[(int)$row->id] = $row->value;
         }
         //sort($arr);
         return $arr;
     }
     
     static function getVocabsFields($modelName){
         $arr = array();
         $data = $modelName::model()->relations();
         foreach($data as $item){
             $arr[] = array_pop($item);
         }
         return $arr;
     }
     
     static function getBelongsToRules($model){
         $rules = array();
         foreach($model::model()->relations() as $relation){
             if($relation[0] == CActiveRecord::BELONGS_TO){
                 $fk = $relation[2];                 
                 $className = $relation[1];
                 $attributeName = $className::model()->tableSchema->primaryKey;                 
                 $rules[] = array(
                     $fk, 'exist', 
                     'allowEmpty' => false,
                     'attributeName' => $attributeName, 
                     'className' => $className,
                     'message' => "Значение в справочнике {$className} не найдено",                     
                 );
             }
         };         
         return $rules;
     }
     
 }

?>
