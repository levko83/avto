<?php
    error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
    $result = shell_exec("sh ".__DIR__."/autopull.sh");
    echo $result;