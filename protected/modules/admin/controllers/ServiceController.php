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
                'actions' => array(
                    'parser',
                    'make_shins_display',
                    "clearCache",
                    "sphinx",
                    "sphinxReindex",
                    "sphinxRestart",
                    "sitemap",
                ),
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

    public function actionSphinx()
    {
        $this->breadcrumbs=array(
            'Обслуживание CMS',
            'Sphinx',
        );
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/admin/sphinx.js', CClientScript::POS_END);
        $this->render('sphinx');
    }

    public function actionSphinxReindex(){
        if(!Yii::app()->request->isAjaxRequest){
            throw new CHttpException(404, "Страница ен найдена");
        }
        $indexName = Yii::app()->request->getPost("indexName");
        if($indexName){
            switch ($indexName){
                case "shins":
                    $indexName = "shinsIndexMain";
                    break;
                case "disks":
                    $indexName = "disksIndexMain";
                    break;
                default:
                    $indexName = null;
                    break;
            }
            try{
                $reindexResponse = SphinxManager::reindex($indexName);
                $reindexResponse = str_replace(",", "<br/>", $reindexResponse);
                $response = array(
                    "code" => 1,
                    "message" => $reindexResponse,
                );
            }catch(Exception $e){
                $response = array(
                    "code" => 0,
                    "message" => $e->getMessage(),
                );
            }
            echo CJSON::encode($response);
            Yii::app()->end();
        }
    }

    public function actionSphinxRestart(){
        if(!Yii::app()->request->isAjaxRequest){
            throw new CHttpException(404, "Страница ен найдена");
        }
        try{
            $restartResponse = SphinxManager::restart();
            $restartResponse = str_replace(",", "<br/>", $restartResponse);
            $response = array(
                "code" => 1,
                "message" => $restartResponse,
            );
        }catch(Exception $e){
            $response = array(
                "code" => 0,
                "message" => $e->getMessage(),
            );
        }
        echo CJSON::encode($response);
        Yii::app()->end();
    }

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

    public function actionSitemap(){
        $this->breadcrumbs=array(
            'Обслуживание CMS',
            'Карта сайта',
        );
        $siteMap = new SiteMapSaver(Yii::getPathOfAlias("application.runtime.sitemap"));
        $siteMap->add_url("http://extraload.com.ua/");
        foreach(ShinsTypeOfAvto::model()->findAll("id > 1") as $type){
            $siteMap->add_url(Yii::app()->createAbsoluteUrl("tires/tiresSubMenu", array("type" => $type->translit)));
            foreach(ShinsSeason::model()->findAll("id > 1") as $type1){
                $siteMap->add_url(Yii::app()->createAbsoluteUrl(
                    "tires/tiresSubMenu",
                    array(
                        "type" => $type->translit,
                        "type1" => $type1->translit,
                    )
                ));
            }
        }
        $siteMap->add_url(Yii::app()->createAbsoluteUrl("tires/index"));
        foreach(ShinsDisplays::model()->findAll() as $shinsDisplay){
            $siteMap->add_url(Yii::app()->createAbsoluteUrl(
                "tires/tire",
                array(
                    "id" => $shinsDisplay->id,
                    "translit" => $shinsDisplay->translit,
                )
            ));
        }
        foreach(DisksType::model()->findAll("id > 1") as $type){
            $siteMap->add_url(Yii::app()->createAbsoluteUrl("drives/drivesSubMenu", array("type" => $type->translit)));
        }
        $siteMap->add_url(Yii::app()->createAbsoluteUrl("drives/index"));
        foreach(DisksDisplays::model()->findAll() as $disksDisplay){
            $siteMap->add_url(Yii::app()->createAbsoluteUrl(
                "drives/drive",
                array(
                    "id" => $disksDisplay->id,
                    "translit" => $disksDisplay->translit,
                )
            ));
        }
        $siteMap->add_url(Yii::app()->createAbsoluteUrl("site/about"));
        $siteMap->add_url(Yii::app()->createAbsoluteUrl("site/contacts"));
        $siteMap->add_url(Yii::app()->createAbsoluteUrl("site/delivery"));
        $sql = <<< SQL
    SELECT t.region_translit, t.city_translit
    FROM (
    SELECT t1.`name_translit` as region_translit,
           t.`name_translit` as city_translit
    FROM `nova_warehouse` t
    LEFT JOIN (
        SELECT `id`, `name`, `name_translit`
        FROM `nova_warehouse`
        WHERE `level` = 1
    ) t1 ON t.root = t1.id
    WHERE t.`level` = 2
    UNION
    SELECT t1.`name_translit` as region_translit,
           t.`name_translit` as city_translit
    FROM `intime_warehouse` t
    LEFT JOIN (
        SELECT `id`, `name`, `name_translit`
        FROM `intime_warehouse`
        WHERE `level` = 1
    ) t1 ON t.root = t1.id
    WHERE t.`level` = 2)  t
    GROUP BY t.region_translit, t.city_translit
SQL;
        foreach(Yii::app()->db->createCommand($sql)->queryAll() as $city){
            $siteMap->add_url(Yii::app()->createAbsoluteUrl(
                "site/deliveryCity",
                array(
                    "region_translit" => $city["region_translit"],
                    "city_translit" => $city["city_translit"],
                )
            ));
        }
        $siteMap->save();
        $this->render('sitemap', ['cnt' => $siteMap->all_nodes_count]);
    }

    public function actionTest(){
        $this->render(
            'test',
            array(
                "result" => exec("whoami")
            )
        );
    }

}
