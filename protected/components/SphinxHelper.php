<?php

    class SphinxHelper{

        public static function SetFloatFilter($field_name, $field_value){
//            $getStringFilter = function($fn, $fv){
//                $v1 = number_format(floatval($fv) - 0.01, 3);
//                $v2 = number_format(floatval($fv) + 0.01, 3);
//                return "({$fn} >= {$v1} AND {$fn} <= {$v2})";
//            };
            $getStringFilter = function($fn, $fv){
                $fv = floatval($fv);
                return "(ABS({$fv} - {$fn}) <= 0.001)";
            };
            if(is_array($field_value)){
                $buff = array();
                foreach($field_value as $item){
                   $buff[] = $getStringFilter($field_name, $item);
                }
                // ? return join(" AND ", $buff);
                return join(" OR ", $buff);
            }else{
                return $getStringFilter($field_name, $field_value);
            }
        }

        public static function SetIntFilter($field_name, $field_value){
            $getStringFilter = function($fn, $fv){
                $fv = (int)$fv;
                return "{$fn} = {$fv}";
            };
            if(is_array($field_value)){
                $buff = array();
                foreach($field_value as $item){
                    $buff[] = $getStringFilter($field_name, $item);
                }
                // ? return join(" AND ", $buff);
                return join(" OR ", $buff);
            }else{
                return $getStringFilter($field_name, $field_value);
            }
        }

        public static function SetStringFilter($field_name, $field_value){
            if(is_array($field_value)){
                $buff = array();
                foreach($field_value as $item){
                    $item = str_replace("/", '\\\\\/', $item);
                    $buff[] = "@{$field_name} \"{$item}\"";
                }
                $s = join(" | ", $buff);
            }else{
                $item = str_replace("/", '\\\\\/', $field_value);
                $s = "@{$field_name} \"{$field_value}\"";
            }
            return $s;
        }

        public static function OR_Conditions($conditions){
            return join(" OR ", array_map(function($item){ return "({$item})"; }, $conditions));
        }

        public static function AND_Conditions($conditions){
            return join(" AND ", $conditions);
        }

    }

