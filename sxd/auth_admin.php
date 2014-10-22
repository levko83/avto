<?php
   session_start();
   if(isset($_SESSION["is_dumper"]) and $_SESSION["is_dumper"] == 1){
       include __DIR__."/../protected/config/db_settings.php";
       $this->CFG['my_host'] = $_db_settings->host;
       $this->CFG['my_port'] = 3306;
       $this->CFG['my_user'] = $_db_settings->main_db_user;
       $this->CFG['my_pass'] = $_db_settings->main_db_pass;
       $this->CFG['my_db'] = $_db_settings->main_db_name;
       $this->CFG['auth'] = 'admin';
       $auth = 1;
   }
?>