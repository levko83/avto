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
        $path = Yii::getPathOfAlias("application.shell");
        if($indexName){
            return shell_exec("sh {$path}/sphinx_index.sh {$indexName}");
        }else{
            return shell_exec("sh {$path}/sphinx_index.sh");
        }
//        if($indexName){
//            return shell_exec("sudo -u www-data indexer {$indexName} --rotate");
//        }else{
//            return shell_exec("sudo -u www-data indexer --all --rotate");
//        }
    }

    public static function restart(){
        $result = shell_exec("sudo service sphinxsearch restart");
        return $result;
    }

}