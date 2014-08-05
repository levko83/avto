<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mevis
 * Date: 01.08.14
 * Time: 10:41
 * To change this template use File | Settings | File Templates.
 */

   if(substr($_SERVER["HTTP_HOST"], -4) == ".loc"){
        // this is development server
       $_db_settings = (object)array(
           "host" => "localhost",
           "main_db_name" => "avto",
           "main_db_user" => "root",
           "main_db_pass" => "root",
           "parser_db_name" => "avto_parser",
           "parser_db_user" => "root",
           "parser_db_pass" => "root",
       );
   }else{
       // this is production server
       // 77.72.129.179
       $_db_settings = (object)array(
           "host" => "localhost",
           "main_db_name" => "avto",
           "main_db_user" => "avto",
           "main_db_pass" => "jkmufdjtdjl",
           "parser_db_name" => "avto_parser",
           "parser_db_user" => "avto_parser",
           "parser_db_pass" => "jkmufdjtdjl"
       );
   }