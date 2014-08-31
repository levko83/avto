<?php
    error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
    if(isset($_GET["key"]) and $_GET["key"] == "38d1d6b862a552198acae32977b283ce"){
        $result = shell_exec("git checkout -- * && git fetch && git merge remotes/origin/master");
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
        $result = "Unsuccessful pull form {$ip}";
    }
    $date_now = date("d-m-Y G:i:s");
    $result = "{$date_now}\n{$result}\n\n";
    file_put_contents(__DIR__."/protected/runtime/autopull.log", $result, FILE_APPEND);