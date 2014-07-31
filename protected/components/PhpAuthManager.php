<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Ifaliuk
 * Date: 30.10.13
 * Time: 11:35
 * To change this template use File | Settings | File Templates.
 */

    class PhpAuthManager extends CPhpAuthManager{
        public function init(){
            // Иерархию ролей расположим в файле auth.php в директории config приложения
            if($this->authFile===null){
                $this->authFile = Yii::getPathOfAlias('application.config.auth').'.php';
            }

            parent::init();

            if(!Yii::app()->user->isGuest){
                $this->assign(Yii::app()->user->role, Yii::app()->user->id);
            }
        }
    }
