<?php
/**
 * Created by PhpStorm.
 * User: Ifaliuk
 * Date: 19.12.13
 * Time: 12:03
 */

class CExtendsActiveForm extends CActiveForm{

    public function checkBoxList($model,$attribute,$data,$htmlOptions=array())
    {
        return CExtendedHtml::activeCheckBoxList($model,$attribute,$data,$htmlOptions);
    }

}