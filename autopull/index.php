<?php
    error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
    $result = shell_exec("cd .. && git checkout -- * && git fetch && git merge remotes/origin/master");
    $date_now = date("d-m-Y G:i:s");
    $post_data = "Post: ".print_r($_POST, true);
    $result = "{$date_now}\n{$result}\n\n{$post_data}";
    file_put_contents(__DIR__."/../protected/runtime/autopull.log", $result, FILE_APPEND);