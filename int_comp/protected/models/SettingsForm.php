<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class SettingsForm extends CFormModel
{
    public $category;
    public $charge_shina;
    public $charge_disk;
    public $callback_email;


    /**
     * Declares the validation rules.
     */
    public function rules()
    {
        return array(
            // name, email, subject and body are required
            array('category', 'safe'),
            // verifyCode needs to be entered correctly
            array('charge_disk, charge_shina','numerical' ),
            array('charge_disk', 'length', 'max'=>3),
            array('charge_shina', 'length', 'max'=>3),
            array('callback_email','email'),
        );
    }

    /**
     * Declares customized attribute labels.
     * If not declared here, an attribute would have a label that is
     * the same as its name with the first letter in upper case.
     */
    public function attributeLabels()
    {
        return array(
            'charge_shina'=>'Наценка на шины в процентах',
            'charge_disk'=>'Наценка на диск в процентах',
            'callback_email'=>'E-mail для отправки заказов обратного звонка',
        );
    }
}