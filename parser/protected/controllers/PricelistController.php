<?php

class PricelistController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Pricelist;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Pricelist']))
		{
			$model->attributes=$_POST['Pricelist'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
        $price=$model->parse_class;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Pricelist']))
		{
			$model->attributes=$_POST['Pricelist'];
			if($model->save())
            {
                SiteProducts::checkPrice(false, false, $id);
                if ($model->parse_class=='avtokoleso')
                {
                    $this->render('afterUpdate',array('information'=>avtokoleso::getInfo()));
                }
                elseif ($model->parse_class=='bcmarket')
                {
                    $this->render('afterUpdate',array('information'=>bcmarket::getInfo()));
                }
                elseif ($model->parse_class=='dtw')
                {
                    $this->render('afterUpdate',array('information'=>dtw::getInfo()));
                }
                elseif ($model->parse_class=='elittyres')
                {
                    $this->render('afterUpdate',array('information'=>elittyres::getInfo()));
                }
                elseif ($model->parse_class=='megatyre')
                {
                    $this->render('afterUpdate',array('information'=>megatyre::getInfo()));
                }
                elseif ($model->parse_class=='odessashina')
                {
                    $this->render('afterUpdate',array('information'=>odessashina::getInfo()));
                }
                elseif ($model->parse_class=='onlinetyres')
                {
                    $this->render('afterUpdate',array('information'=>onlinetyres::getInfo()));
                }
                elseif ($model->parse_class=='replaywheelsh')
                {
                    $this->render('afterUpdate',array('information'=>replaywheelsh::getInfo()));
                }
                elseif ($model->parse_class=='replaywheeld')
                {
                    $this->render('afterUpdate',array('information'=>replaywheeld::getInfo()));
                }
                elseif ($model->parse_class=='topgummarketz')
                {
                    $this->render('afterUpdate',array('information'=>topgummarketz::getInfo()));
                }
                elseif ($model->parse_class=='topgummarketl')
                {
                    $this->render('afterUpdate',array('information'=>topgummarketl::getInfo()));
                }
                elseif ($model->parse_class=='replaywheelshz')
                {
                    $this->render('afterUpdate',array('information'=>replaywheelshz::getInfo()));
                }
                elseif ($model->parse_class=='vianor')
                {
                    $this->render('afterUpdate',array('information'=>vianor::getInfo()));
                }
                elseif ($model->parse_class=='zorat')
                {
                    $this->render('afterUpdate',array('information'=>zorat::getInfo()));
                }
                elseif ($model->parse_class=='aviteh')
                {
                    $this->render('afterUpdate',array('information'=>aviteh::getInfo()));
                }
                elseif ($model->parse_class=='autoalians')
                {
                    $this->render('afterUpdate',array('information'=>autoalians::getInfo()));
                }
                elseif ($model->parse_class=='autoban')
                {
                    $this->render('afterUpdate',array('information'=>autoban::getInfo()));
                }
                elseif ($model->parse_class=='autodel')
                {
                    $this->render('afterUpdate',array('information'=>autodel::getInfo()));
                }
                elseif ($model->parse_class=='autoimidj')
                {
                    $this->render('afterUpdate',array('information'=>autoimidj::getInfo()));
                }
                elseif ($model->parse_class=='avtokilometr')
                {
                    $this->render('afterUpdate',array('information'=>avtokilometr::getInfo()));
                }
                elseif ($model->parse_class=='avtomarket')
                {
                    $this->render('afterUpdate',array('information'=>avtomarket::getInfo()));
                }
                elseif ($model->parse_class=='avtosport')
                {
                    $this->render('afterUpdate',array('information'=>avtosport::getInfo()));
                }
                elseif ($model->parse_class=='askania')
                {
                    $this->render('afterUpdate',array('information'=>askania::getInfo()));
                }
                elseif ($model->parse_class=='vito')
                {
                    $this->render('afterUpdate',array('information'=>vito::getInfo()));
                }
                elseif ($model->parse_class=='goverlash')
                {
                    $this->render('afterUpdate',array('information'=>goverlash::getInfo()));
                }
                elseif ($model->parse_class=='goverlad')
                {
                    $this->render('afterUpdate',array('information'=>goverlad::getInfo()));
                }
                elseif ($model->parse_class=='gurt')
                {
                    $this->render('afterUpdate',array('information'=>gurt::getInfo()));
                }
                elseif ($model->parse_class=='intershunam')
                {
                    $this->render('afterUpdate',array('information'=>intershunam::getInfo()));
                }
                elseif ($model->parse_class=='itaro')
                {
                    $this->render('afterUpdate',array('information'=>itaro::getInfo()));
                }
                elseif ($model->parse_class=='koleso')
                {
                    $this->render('afterUpdate',array('information'=>koleso::getInfo()));
                }
                elseif ($model->parse_class=='vinnik')
                {
                    $this->render('afterUpdate',array('information'=>vinnik::getInfo()));
                }
                elseif ($model->parse_class=='kraina')
                {
                    $this->render('afterUpdate',array('information'=>kraina::getInfo()));
                }
                elseif ($model->parse_class=='maxim')
                {
                    $this->render('afterUpdate',array('information'=>maxim::getInfo()));
                }
                elseif ($model->parse_class=='master')
                {
                    $this->render('afterUpdate',array('information'=>master::getInfo()));
                }
                elseif ($model->parse_class=='npc')
                {
                    $this->render('afterUpdate',array('information'=>npc::getInfo()));
                }
                elseif ($model->parse_class=='stokshina')
                {
                    $this->render('afterUpdate',array('information'=>stokshina::getInfo()));
                }
                elseif ($model->parse_class=='pskavto')
                {
                    $this->render('afterUpdate',array('information'=>pskavto::getInfo()));
                }
                elseif ($model->parse_class=='yuraperov')
                {
                    $this->render('afterUpdate',array('information'=>yuraperov::getInfo()));
                }
                elseif ($model->parse_class=='standart')
                {
                    $this->render('afterUpdate',array('information'=>standart::getInfo()));
                }
                elseif ($model->parse_class=='tairland')
                {
                    $this->render('afterUpdate',array('information'=>tairland::getInfo()));
                }
                elseif ($model->parse_class=='terex')
                {
                    $this->render('afterUpdate',array('information'=>terex::getInfo()));
                }
                elseif ($model->parse_class=='tehnoopttorg')
                {
                    $this->render('afterUpdate',array('information'=>tehnoopttorg::getInfo()));
                }
                elseif ($model->parse_class=='shinteh')
                {
                    $this->render('afterUpdate',array('information'=>shinteh::getInfo()));
                }
                elseif ($model->parse_class=='shinteh2')
                {
                    $this->render('afterUpdate',array('information'=>shinteh2::getInfo()));
                }
                elseif ($model->parse_class=='favorit')
                {
                    $this->render('afterUpdate',array('information'=>favorit::getInfo()));
                }
                elseif ($model->parse_class=='bardas')
                {
                    $this->render('afterUpdate',array('information'=>bardas::getInfo()));
                }
                elseif ($model->parse_class=='bardas2')
                {
                    $this->render('afterUpdate',array('information'=>bardas2::getInfo()));
                }
                elseif ($model->parse_class=='demidenko')
                {
                    $this->render('afterUpdate',array('information'=>demidenko::getInfo()));
                }
                elseif ($model->parse_class=='kotovec')
                {
                    $this->render('afterUpdate',array('information'=>kotovec::getInfo()));
                }
                elseif ($model->parse_class=='parabashev')
                {
                    $this->render('afterUpdate',array('information'=>parabashev::getInfo()));
                }
                elseif ($model->parse_class=='shinshina')
                {
                    $this->render('afterUpdate',array('information'=>shinshina::getInfo()));
                }
                elseif ($model->parse_class=='shinamix')
                {
                    $this->render('afterUpdate',array('information'=>shinamix::getInfo()));
                }
                elseif ($model->parse_class=='shipshinash')
                {
                    $this->render('afterUpdate',array('information'=>shipshinash::getInfo()));
                }
                elseif ($model->parse_class=='shipshinad')
                {
                    $this->render('afterUpdate',array('information'=>shipshinad::getInfo()));
                }
                elseif ($model->parse_class=='avtopilotsh')
                {
                    $this->render('afterUpdate',array('information'=>avtopilotsh::getInfo()));
                }
                elseif ($model->parse_class=='avtopilotd')
                {
                    $this->render('afterUpdate',array('information'=>avtopilotd::getInfo()));
                }
                elseif ($model->parse_class=='avtopilotd2')
                {
                    $this->render('afterUpdate',array('information'=>avtopilotd2::getInfo()));
                }
                elseif ($model->parse_class=='avtopilotsh2')
                {
                    $this->render('afterUpdate',array('information'=>avtopilotsh2::getInfo()));
                }
            }
		}

        else
        {
		$this->render('update',array(
			'model'=>$model,
		));
        }
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Pricelist');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Pricelist('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Pricelist']))
			$model->attributes=$_GET['Pricelist'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Pricelist the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{

		$model=Pricelist::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Pricelist $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='pricelist-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	/* public function actionCorrectMeta()
    {
        $last=115002;
        //$last=2001;
        for ($i=111800; $i<$last; $i=$i+1000)
        {
            $condition=new CDbCriteria();
            //$condition->select='meta_title_ru';
			
			$condition->offset=$i;
            $condition->limit='1000';
			
            
            $allproducts=Products::model()->findAll($condition);
            echo $i.'<br>';
            $l=0;
			
            foreach ($allproducts as $record)
            {
				$pos=strrpos($record->meta_title_ru,'-');
				var_dump($pos);
				if ($pos > 20)
				{
				
                $temp=substr($record->meta_title_ru,0,$pos);
                $temp=$temp.' - foshina.com.ua';
				$record->meta_title_ru=$temp;
				$record->save();
                //if ($record->save()){echo $l; echo $record->meta_title_ru.'<br>';}
                //else {echo "Error".$record->meta_title_ru."<br>";} 
				echo $l.' '.$record->meta_title_ru.'<br>';
				}
                $l++;
            }
			unset($allproducts);
			
        }
    }
	*/
}
