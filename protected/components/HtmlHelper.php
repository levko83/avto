<?php

/**
 * @author Ifaliuk
 */
class HtmlHelper {

    public static function transliterate($str){
//        $char = array(
//            "А"=>"a","Б"=>"b","В"=>"v","Г"=>"g",
//            "Д"=>"d","Е"=>"e","Ж"=>"j","З"=>"z","И"=>"i",
//            "Й"=>"y","К"=>"k","Л"=>"l","М"=>"m","Н"=>"n",
//            "О"=>"o","П"=>"p","Р"=>"r","С"=>"s","Т"=>"t",
//            "У"=>"u","Ф"=>"f","Х"=>"h","Ц"=>"ts","Ч"=>"ch",
//            "Ш"=>"sh","Щ"=>"sch","Ъ"=>"","Ы"=>"yi","Ь"=>"",
//            "Э"=>"e","Ю"=>"yu","Я"=>"ya","а"=>"a","б"=>"b",
//            "в"=>"v","г"=>"g","д"=>"d","е"=>"e","ж"=>"j",
//            "з"=>"z","и"=>"i","й"=>"y","к"=>"k","л"=>"l",
//            "м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r",
//            "с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"h",
//            "ц"=>"ts","ч"=>"ch","ш"=>"sh","щ"=>"sch","ъ"=>"y",
//            "ы"=>"yi","ь"=>"","э"=>"e","ю"=>"yu","я"=>"ya",
//            " "=> "_", "."=> "", "/"=> "_", "-" => "_"
//        );
//        return mb_strtolower(preg_replace('/[^A-Za-z0-9_]/', '', strtr($str, $char)));
        $table = array(
            'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D',
            'Е' => 'E', 'Ё' => 'YO', 'Ж' => 'ZH', 'З' => 'Z', 'И' => 'I',
            'Й' => 'J', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N',
            'О' => 'O', 'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T',
            'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C', 'Ч' => 'CH',
            'Ш' => 'SH', 'Щ' => 'CSH', 'Ь' => '', 'Ы' => 'Y', 'Ъ' => '',
            'Э' => 'E', 'Ю' => 'YU', 'Я' => 'YA',
            'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd',
            'е' => 'e', 'ё' => 'yo', 'ж' => 'zh', 'з' => 'z', 'и' => 'i',
            'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n',
            'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't',
            'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c', 'ч' => 'ch',
            'ш' => 'sh', 'щ' => 'csh', 'ь' => '', 'ы' => 'y', 'ъ' => '',
            'э' => 'e', 'ю' => 'yu', 'я' => 'ya',
        );
        $str = strtr($str, $table);
        $str = strtolower($str);
        $str = preg_replace('~[^-a-z0-9]+~u', '-', $str);
        $str = trim($str, '-');
        while (strpos($str,'--')!==false)
            $str = str_replace('--','-', $str);
        return $str;
    }

    public static function removeZero($v){
        $c = number_format($v, 0, ',', '');
        if(($v - $c) > 0)
            return number_format($v, 1, '.', '');
        if($c != 0)
            return $c;
        else
            return "";
    }

    public static function resizeImage($imgName, $w, $h, $imgFolder){
        $sep = DIRECTORY_SEPARATOR;
        list($name, $ext) = explode(".", $imgName);
        $resultName = "{$name}_{$w}_{$h}.{$ext}";
        $image = new EasyImage("{$imgFolder}{$sep}{$imgName}");
        $image->resize($w, $h, EasyImage::RESIZE_AUTO);
        $image->save("{$imgFolder}{$sep}{$resultName}");
        return $resultName;
    }

    public static function getIdsQuery($s){
        if($s){
            $arr = explode(",", $s);
            return "?ids=".join(";", $arr);
        }else{
            return "";
        }
    }


}

?>
