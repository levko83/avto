<?php
    error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
    $result = shell_exec("sh ".__DIR__."/autopull.sh");
    $date_now = date("d-m-Y G:i:s");
    $result = "{$date_now}\n{$result}\n\n";
    file_put_contents(__DIR__."/../protected/runtime/autopull.log", $result, FILE_APPEND);