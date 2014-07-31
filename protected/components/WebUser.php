<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Ifaliuk
 * Date: 29.10.13
 * Time: 14:14
 * To change this template use File | Settings | File Templates.
 */

class WebUser extends CWebUser{

    function getRole() {
        if($this->isGuest){
            return null;
        }
        return $user = Users::model()->findByPk($this->id)->roles->role;
    }

    function getRoleDesc(){
        $roles = Yii::app()->authManager->getRoles($this->id);
        reset($roles);
        return current($roles)->description;
    }

}