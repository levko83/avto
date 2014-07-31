<?php
/**
 * Created by PhpStorm.
 * User: Ifaliuk
 * Date: 28.02.14
 * Time: 10:33
 */

class DetailOrder extends CFormModel{

    public $fio;
    public $phone;
//    public $email;
    public $delivary_id;
    public $region;
    public $city;
    public $comment;
    public $other; // виртуальное поле для других ошибок

    public function rules()
    {
        return array(
            array('fio, phone, region, city, comment', 'filter', 'filter' => 'strip_tags'),
            array('fio, phone, delivary_id, region, city', 'required'),
//            array('email', 'email'),
            array('delivary_id', 'exist',
                  'skipOnError' => true,
                  'className' => 'OrderDeliverys',
                  'attributeName' => 'id',
                  'message' => 'Выберите способ доставки',
            ),
        );
    }

    public function attributeLabels(){
        return array(
            "fio" => "ФИО",
            "phone" => "Телефон",
//            "email" => "E-mail",
            "delivary_id" => "Способ доставки",
            "region" => "Область",
            "city" => "Город",
            "comment" => "Комментарий",
        );
    }


} 