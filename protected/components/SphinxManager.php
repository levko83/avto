<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mevis
 * Date: 06.08.14
 * Time: 13:29
 * To change this template use File | Settings | File Templates.
 */

class SphinxManager {

    public static function reindex($indexName = null){
        if($indexName){
            return shell_exec("indexer {$indexName} --rotate");
        }else{
            return shell_exec("indexer --all --rotate");
        }
    }

    public static function restart(){
        return shell_exec("searchd --stopwait; searchd");
    }

}