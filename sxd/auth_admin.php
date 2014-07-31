<?php

   session_start();
   if(isset($_SESSION["is_dumper"]) and $_SESSION["is_dumper"] == 1){
       if(PHP_OS == "WINNT"){
           $this->CFG['my_host'] = 'localhost';
           $this->CFG['my_port'] = 3306;
           $this->CFG['my_user'] = 'root';
           $this->CFG['my_pass'] = '';
           $this->CFG['my_db'] = "avto_shins_new";
       }else{
           $this->CFG['my_host'] = 'localhost';
           $this->CFG['my_port'] = 3306;
           $this->CFG['my_user'] = 'root';
           $this->CFG['my_pass'] = 'jkmufdjtdjlf';
           $this->CFG['my_db'] = "avto";
       }
       $auth = 1;
   }
?>