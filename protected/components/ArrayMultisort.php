<?php

/**
 * Created by PhpStorm.
 * User: Ifaliuk
 * Date: 14.05.14
 * Time: 11:00
 */

    class ArrayMultisort {

        private $_arr = array();
        private $_fields = array();
        private $_data = array();
        private $_sortOptions = array();


        function __construct($arr){
           $this->_fields = array_keys(reset($arr));
           foreach($arr as $i => $item){
               foreach($this->_fields as $field){
                   $this->_data[$field][$i] = $item[$field];
               }
           }
           $this->_arr = $arr;
        }

        public function addSortOption($field, $sort_order = SORT_ASC, $sort_type = SORT_STRING){
            if(!in_array($field, $this->_fields))
                return;
            if(!in_array($sort_order, array(SORT_ASC, SORT_DESC)))
                return;
            if(!in_array($sort_type, array(SORT_STRING, SORT_NUMERIC)))
                return;
            $this->_sortOptions[] = array($this->_data[$field], $sort_order, $sort_type);
        }

        public function sort(){
            $args = array();
            foreach($this->_sortOptions as $sortOption){
                $args[] = $sortOption[0];
                $args[] = $sortOption[1];
            }
            $arr = $this->_arr;
            $args[] = &$arr;
            call_user_func_array("array_multisort", $args);
            $this->_clearSortOptions();
            return $arr;
        }

        private function _clearSortOptions(){
            $this->_sortOptions = array();
        }

    }