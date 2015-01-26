<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mevis
 * Date: 25.01.15
 * Time: 15:35
 * To change this template use File | Settings | File Templates.
 */

class TimeTracking {

    private static $_instance = null;
    private $_currTime;
    private $_interval;

    private function __construct(){}

    public static function getInstance(){
        if(self::$_instance == null){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function start(){
        $this->_currTime = microtime();
        $this->_interval = 0;
    }

    public function showInterval($msg = ""){
        $this->_interval += time() - $this->_currTime;
//        $sec = number_format($this->_interval / 1000, 2);
        $sec = number_format($this->_interval / 1000000000, 3);
        if(trim($msg) == ""){
            echo "{$sec} c. <br>";;
        }else{
            echo "{$msg}: {$sec} c.<br>";
        }
        $this->_currTime = microtime();
    }

}