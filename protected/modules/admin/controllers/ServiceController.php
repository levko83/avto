<?php

class ServiceController extends Controller
{

    public $layout = 'application.modules.admin.views.layouts.layout';

    public function filters(){
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    public function accessRules(){
        return array(
            array('allow',
                'roles' => array('root'),
            ),
            array('allow',
                'roles' => array('administrator'),
                'actions' => array('parser', 'make_shins_display', "clearCache"),
            ),
            array('deny',
                'roles'=>array('guest'),
            ),
        );
    }

	public function actionIndex()
	{
        $this->breadcrumbs=array(
            'Обслуживание CMS',
        );
		$this->render('index');
	}

    public function actionClearCache(){
        $this->breadcrumbs=array(
            'Обслуживание CMS',
            'Очистака кеша',
        );
        $this->render('clearCache');
    }

    public function actionParser()
    {
        $this->render('parser');
    }


    public function actionTest(){
        $translitPattern = RegExpHelper::getTextTranslitPattern();
        $doublePattern = RegExpHelper::getDoublePattern();
//        $patternArr[] = "(?:\/avto=(?<avto>{$translitPattern}))?";
        $patternArr[] = "(?:\/avto=(?<avto>[a-z0-9\-]+))?";
        $patternArr[] = "(?:\/cena_ot=(?<priceMin>\d+))?";
        $patternArr[] = "(?:\/cena_do=(?<priceMax>\d+))?";
        $patternArr[] = "(?:\/brand=(?<brand2>(?:{$translitPattern}){1}(?:\;{$translitPattern})*))?";
        $patternArr[] = "(?:\/radius=(?<radius2>(?:{$doublePattern}){1}(?:\;{$doublePattern})*))?";
        $patternArr[] = "(?:\/shirina=(?<shirina>{$doublePattern}))?";
        $patternArr[] = "(?:\/index_nagruzki=(?<index_nagruzki>[a-z0-9\-]+))?";
        $patternArr[] = "(?:\/profil=(?<profil>{$doublePattern}))?";
        $patternArr[] = "(?:\/sezon=(?<sezon>{$translitPattern}))?";
        $patternArr[] = "(?:\/tip=(?<tip>{$translitPattern}))?";
        $patternArr[] = "(?:\/(?<run_flat>run_flat))?";
        $patternArr[] = "(?:\/(?<shipi>shipi))?";
        $patternArr[] = "(?:\/(?<v_nalichii>v_nalichii))?";
        $patternArr[] = "(?:\/page=(?<page>\d+))?";
        $filterPattern = join("", $patternArr);
        $pattern = "^shini(?:\-(?<brand1>(?!tipa)[a-z0-9]+(?:\-[a-z0-9]+)*)?)?(?:\-R(?<radius1>(?!tipa){$doublePattern}))?\.html{$filterPattern}$";
        //$str = "shini-atturo.html/tip=vnedorozhnye/v_nalichii";
        $str = "shini-R6.html";
        if(preg_match_all("/$pattern/", $str, $matches)){
            echo "<pre>";
            var_dump($matches);
            echo "</pre>";
        }else{
            echo "Совпадений не найдено";
        }
    }

    public function actionTest1(){
//        $criteria = new CDbCriteria();
//        $criteria->addCondition('UPPER(name) = UPPER("Киев")');
//        $criteria->compare("level", 1);
//        $kiev_region = IntimeWarehouse::model()->find($criteria);
//
//        $kiev_city = $kiev_region->children()->find();
//
//        $criteria = new CDbCriteria();
//        $criteria->addCondition('UPPER(name) LIKE UPPER("Киев%")');
//        $criteria->addCondition('UPPER(name) LIKE UPPER("%обл%")');
//        $criteria->compare("level", 1);
//        $kiev_area_region = IntimeWarehouse::model()->find($criteria);
//
//        echo "<pre>";
//        var_dump($kiev_area_region);
//        echo "</pre>";

        //IntimeWarehouse::model()->updateDataFromSite();
        echo (string)NovaWarehouse::model()->loadXmlFromSite();
    }
    public function actionMake_shins_display(){}

    public function actionShowLog(){
        $file_name = Yii::getPathOfAlias("application.runtime").DIRECTORY_SEPARATOR."application.log";
        if(!file_exists($file_name)){
            $err = "Файла логов не существует";
        }else{
            $file_str = file_get_contents($file_name);
            $pattern = "/^(?:(?<dateTime>20\d{2}\/\d{2}\/\d{2}\s+\d{2}\:\d{2}\:\d{2})\s+\[(?<notifyType>error|info)\]\s*(?<message>[\s\S]+(?=20\d{2}\/\d{2}\/\d{2}))(?:\-\-\-)?)+/Um";
            if(preg_match_all($pattern, $file_str, $matches, PREG_SET_ORDER)){
                $notifyTypes = $result = array();
                foreach($matches as $match){
                    $notifyType = trim($match["notifyType"]);
                    if(!in_array($notifyType, $notifyTypes)){
                        $notifyTypes[] = $notifyType;
                    }
                    $match["dateTimeStamp"] = DateTime::createFromFormat('Y/m/d H:i:s', $match["dateTime"])->getTimestamp();
                    $result[$notifyType][] = $match;
                }
                foreach($result as &$item){
                    uasort(
                        $item,
                        function($a, $b){
                            if($a["dateTimeStamp"] == $b["dateTimeStamp"]) return 0;
                            if($a["dateTimeStamp"] > $b["dateTimeStamp"]) return -1;
                            return 1;
                        }
                    );
                    $item = new CArrayDataProvider(
                        $item,
                        array(
                            'pagination'=>array(
                                'pageSize' => 5,
                            ),
                        )
                    );
                }
            }
            //$msg = $file_str;
        }
        $this->render(
            "showLog",
            array(
                "err" => $err,
                "result" => $result
            )
        );
    }

}