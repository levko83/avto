<?php

class ConvertBaseController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{           
           $this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
            if($error=Yii::app()->errorHandler->error)
            {
                if(Yii::app()->request->isAjaxRequest)
                        echo $error['message'];
                else{
                    $this->pageTitle=Yii::app()->name . ' - Ошибка';
                    $this->breadcrumbs=array(
                        'Ошибка',
                    );
                    $this->render('error', $error);
                }
            }
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
        
        /*
        public function actionConvertShins(){            
            $criteria = new CDbCriteria;
            $criteria->select = array('modification_id', 'zavod_shini', 'zamen_shini', 'tuning_shini');            
            //$criteria->limit = 100;
            $recs = Podbor::model()->findAll($criteria);
            $fn = 'file.txt';            
            if(file_exists($fn)) 
                unlink($fn);
            echo "Start converting...\n";
            $reg = "/^(\d{1,3})\/(\d{1,3})(?:\sR)?(\d{0,3})/";
            $i = 0;                        
            foreach($recs as $item){                                              
               $str = str_replace("#", "|", $item->zavod_shini);            
               $type = 1;
               foreach(explode("|", $str) as $elem){                   
                   $s = trim($elem);
                   if($s != ''){
                        $i++;                         
                        preg_match($reg, $s, $found);                        
                        $found[0] = $item->modification_id;
                        $arr = array_merge(array($i, $type), $found);
                        $s = join(';', $arr)."\n";
                        file_put_contents($fn, $s, FILE_APPEND);
                   }
               }               
               $str = str_replace("#", "|", $item->zamen_shini);            
               $type = 2;
               foreach(explode("|", $str) as $elem){                   
                   $s = trim($elem);
                   if($s != ''){
                        $i++;                         
                        preg_match($reg, $s, $found);                        
                        $found[0] = $item->modification_id;
                        $arr = array_merge(array($i, $type), $found);
                        $s = join(';', $arr)."\n";
                        file_put_contents($fn, $s, FILE_APPEND);
                   }
               }               
               $str = str_replace("#", "|", $item->tuning_shini);            
               $type = 3;
               foreach(explode("|", $str) as $elem){                   
                   $s = trim($elem);
                   if($s != ''){
                        $i++;                         
                        preg_match($reg, $s, $found);                        
                        $found[0] = $item->modification_id;
                        $arr = array_merge(array($i, $type), $found);
                        $s = join(';', $arr)."\n";
                        file_put_contents($fn, $s, FILE_APPEND);
                   }
               }               
            }           
            echo "Succesfully converting <b>$i</b> rows";
        }
        
        public function actionConvertDisks(){            
            $criteria = new CDbCriteria;
            $criteria->select = array('modification_id', 'zavod_diskov', 'zamen_diskov', 'tuning_diski');                        
            $recs = Podbor::model()->findAll($criteria);
            $fn = 'disks.txt';            
            if(file_exists($fn)) 
                unlink($fn);
            echo "Start converting...\n";
            $i = 0;            
            $reg = "/^(\d{1,}[\,|\.]?\d{0,3})x(\d{1,}[\,|\.]?\d{0,2})\s?([A-Za-z]{0,2}\d{0,3}[\,|\.]?\d{0,3})/";
            foreach($recs as $item){                                              
               $str = str_replace("#", "|", $item->zavod_diskov);            
               $str = str_replace(" x ", "x", $str);            
               $type = 1;
               $tmp = explode("|", $str);
               foreach(explode("|", $str) as $elem){                   
                   $s = trim($elem);
                   if($s != ''){
                        $i++;                         
                        preg_match($reg, $s, $found);                        
                        $found[0] = $item->modification_id;
                        $found[3] = trim($found[3]);
                        $arr = array_merge(array($i, $type), $found);
                        $s = join(';', $arr)."\n";
                        file_put_contents($fn, $s, FILE_APPEND);
                   }
               }                              
               $str = str_replace("#", "|", $item->zamen_diskov);            
               $str = str_replace(" x ", "x", $str);            
               $type = 2;
               $tmp = explode("|", $str);
               foreach(explode("|", $str) as $elem){                   
                   $s = trim($elem);
                   if($s != ''){
                        $i++;                         
                        preg_match($reg, $s, $found);                        
                        $found[0] = $item->modification_id;
                        $found[3] = trim($found[3]);
                        $arr = array_merge(array($i, $type), $found);
                        $s = join(';', $arr)."\n";
                        file_put_contents($fn, $s, FILE_APPEND);
                   }
               }        
               $str = str_replace("#", "|", $item->tuning_diski);            
               $str = str_replace(" x ", "x", $str);            
               $type = 3;
               $tmp = explode("|", $str);
               foreach(explode("|", $str) as $elem){                   
                   $s = trim($elem);
                   if($s != ''){
                        $i++;                         
                        preg_match($reg, $s, $found);                        
                        $found[0] = $item->modification_id;
                        $found[3] = trim($found[3]);
                        $arr = array_merge(array($i, $type), $found);
                        $s = join(';', $arr)."\n";
                        file_put_contents($fn, $s, FILE_APPEND);
                   }
               }                              
            }           
            echo "Succesfully converting <b>$i</b> rows";
        }
         * 
         */
        
        public function actionShins($season = 1){               
            Yii::app()->clientScript->registerPackage('jquery');
            Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/site.js');
            $this->pageTitle = 'Шины';
            $this->breadcrumbs = array('Шины');            
            $this->render(
                    'shins', 
                    array(
                        'season' => $season,
                        'shinsUrl' => Yii::app()->createUrl("site/shins"),
                        'shinsSeasonList' => ShinsSeason::model()->getListForFilter(),
                        'params' => ShinsParams::model()->_toArray(),
                        'dataProvider' => Shins::model()->getShins($season)
                    )
            );
        }
        
        public function actionViewShina($id, $linkProductName){
            if(!$shina = Shins::model()->findByPk($id)){
                throw new CHttpException(404, 'Шина не найдена');
            }
            Yii::app()->clientScript->registerPackage('colorbox');
            Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/product.js');
            $this->pageTitle = "Шина ".$shina->product_name;
            $this->breadcrumbs = array(
                "Шины" => Yii::app()->createUrl('site/shins'),
                $shina->product_name
            );            
            
            $this->render(
                    "viewShina",
                    array(
                        'shina' => $shina
                    )
            );            
        }

        // поиск по автомобилю
        public function actionSearch(){  
            if(Yii::app()->request->isAjaxRequest){
                echo "Yes";
                Yii::app()->end();
            }else{
                Yii::app()->clientScript->registerPackage('jquery');
                Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/search.js');            
                $this->pageTitle = 'Подбор по авто';
                $this->breadcrumbs = array(                
                    'Подбор по авто'
                );
                $this->render('search');
            }
        }

        // формирование списка моделей автомобиля конкретной марки
        public function actionDynamicAvtoMark(){
            if(Yii::app()->request->isAjaxRequest and $avto_mark = Yii::app()->request->getPost('avto_mark')){             
                   $avto_models = AvtoModels::model()->findAll(
                                     "avto_marks_id = :avto_mark", 
                                     array(":avto_mark" => $avto_mark)
                                  );                     
                   echo CHtml::tag(
                      "option", 
                       array("value" => ""), 
                       "-- выберите модель автомобиля --"
                   );
                   foreach($avto_models as $avto_model){
                       echo CHtml::tag(
                               "option", 
                               array("value" => $avto_model->id), 
                               $avto_model->value
                            );
                   }
                   Yii::app()->end();
            }else{
                throw new CHttpException(404, "Страница не найдена");
            }
        }

        // формирование списка модификаций автомобиля конкретной модели
        public function actionDynamicAvtoModel(){
            if(Yii::app()->request->isAjaxRequest and $avto_model = Yii::app()->request->getPost('avto_model')){             
                   $avto_modifications = AvtoModification::model()->findAll(
                                     "avto_models_id = :avto_model", 
                                     array(":avto_model" => $avto_model)
                                  );                                        
                   foreach($avto_modifications as $avto_modification){
                       echo CHtml::tag(
                               "option", 
                               array("value" => $avto_modification->id), 
                               "{$avto_modification->year} - {$avto_modification->engine}"
                            );
                   }
                   Yii::app()->end();
            }else{
                throw new CHttpException(404, "Страница не найдена");
            }
        }
        
}