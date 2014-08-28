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

}