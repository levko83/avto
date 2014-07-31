<?php
/**
 * Created by PhpStorm.
 * User: Ifaliuk
 * Date: 21.02.14
 * Time: 14:44
 */

class ActionsHelper{

    public static function getActions(){
        $sql = "SELECT s.id,
                       s.display_name,
                       'tire' as type,
                       s.translit,
                       (SELECT min(price) FROM shins WHERE shins_display_id = s.id) AS oldPrice,
                       s.actionPrice as newPrice,
                       i.imageName
                FROM shins_displays s
                LEFT JOIN shins_images i ON s.id = i.shins_display_id
                WHERE actionPrice
                GROUP BY s.id
                UNION
                SELECT d.id,
                       d.display_name,
                       'drive' as type,
                       d.translit,
                       (SELECT min(price) FROM disks WHERE disks_display_id = d.id) AS oldPrice,
                       d.actionPrice as newPrice,
                       i.imageName
                FROM disks_displays d
                LEFT JOIN disks_images i ON d.id = i.disks_display_id
                WHERE actionPrice
                GROUP BY d.id";
        return Yii::app()->db->createCommand($sql)->queryAll();
    }

} 