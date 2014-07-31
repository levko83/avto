<?php
/**
 * Created by PhpStorm.
 * User: Ifaliuk
 * Date: 13.03.14
 * Time: 18:38
 */

class StatisticaBehavior extends CActiveRecordBehavior{

    public $tables = array();

    private function _getTables(){
        if(!is_array($this->tables)){
            $this->tables = array($this->tables);
        }
        return $this->tables;
    }

    public function afterSave($event){
        if($this->owner->isNewRecord){
            foreach($this->_getTables() as $table){
                Statistica::getInstance()->updateCount($table);
            }
        }
        return parent::afterSave($event);
    }

} 