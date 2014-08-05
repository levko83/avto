<?php

include "../protected/config/db_settings.php";

$CFG = array (
  'charsets' => 'cp1251 utf8 latin1',
  'lang' => 'ru',
  'time_web' => '600',
  'time_cron' => '600',
  'backup_path' => 'backup/',
  'backup_url' => 'backup/',
  'only_create' => 'MRG_MyISAM MERGE HEAP MEMORY',
  'globstat' => 0,
  'my_host' => $_db_settings->host,
  'my_port' => 3306,
  'my_user' => $_db_settings->main_db_user,
  'my_pass' => $_db_settings->main_db_pass,
  'my_comp' => 0,
  'my_db' => $_db_settings->main_db_name,
  'user' => '',
  'pass' => '',
  'confirm' => '6',
  'exitURL' => './',
);
?>