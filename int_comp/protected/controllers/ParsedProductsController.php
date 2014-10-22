<?php

class ParsedProductsController extends Controller
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
				'actions'=>array('admin','delete','showUpd','showDel','showNew','deleteAll','linkProd','notLinkProd','configs','unlink'),
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


    public function actionSettings()
    {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->render('settings');
    }
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new ParsedProducts;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ParsedProducts']))
		{
			$model->attributes=$_POST['ParsedProducts'];
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

        $shopProducts=new Products('search');
        $shopProducts->unsetAttributes();
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);;
		if(isset($_POST['ParsedProducts']))
		{
			$model->attributes=$_POST['ParsedProducts'];

			if($model->save())
            {
                ParsedProducts::updateRecord($model->id);
                if (isset($model->product_id)&&strlen($model->product_id)>0)
                {
                Products::checkPrice($model->product_id,false);
                }
				$this->redirect(array('view','id'=>$model->id));
            }
		}
        if (isset($_GET['Products']))
        {
         $shopProducts->attributes=$_GET['Products'];

        }
		$this->render('update',array(
        'model'=>$model,
        'shopProducts'=>$shopProducts,
    ));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
        $temp_product_id=$this->loadModel($id)->product_id;
        if ($this->loadModel($id)->delete())
        {
            Products::checkPrice($temp_product_id,false);
        }

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('ParsedProducts');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ParsedProducts('search');
		$model->unsetAttributes();
		// clear any default values
		if(isset($_GET['ParsedProducts']))
			$model->attributes=$_GET['ParsedProducts'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Parsedproducts the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ParsedProducts::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ParsedProducts $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='parsedProducts-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function actionShowUpd($company_id)
    {
        $dataProvider=new CActiveDataProvider('ParsedProducts', array(
            'criteria'=>array(
                'condition'=>'company_id='.$company_id.' AND flag_upd=1',
                'order'=>'com_prod_ident',
            ),
            'pagination'=>array(
                'pageSize'=>50,
            ),
        ));
        $this->render('showUpd',array('dataProvider'=>$dataProvider));
    }

    public function actionShowDel($company_id)
    {
        $for_menu=Pricelist::model()->findAll();
        $companies=array();
        foreach ($for_menu as $record)
        {
            $companies[]=array('label'=>$record->company,'url'=>array('showDel','company_id'=>$record->id));
        }
        if ($company_id==='all') {$company_cond='';} else $company_cond='company_id='.$company_id.' AND';
        $dataProvider=new CActiveDataProvider('ParsedProducts', array(
            'criteria'=>array(
                'condition'=>$company_cond.' flag_upd=0',
                'order'=>'com_prod_ident',
            ),
            'pagination'=>array(
                'pageSize'=>50,
            ),
        ));
        $this->render('showDel',array('dataProvider'=>$dataProvider, 'company_id'=>$company_id,'companies'=>$companies));
    }

    public function actionShowNew($company_id)
    {
        $for_menu=Pricelist::model()->findAll();
        $companies=array();
        foreach ($for_menu as $record)
        {
            $companies[]=array('label'=>$record->company,'url'=>array('showNew','company_id'=>$record->id));
        }
        if ($company_id==='all') {$company_cond='';} else $company_cond='company_id='.$company_id.' AND';
        $dataProvider=new CActiveDataProvider('ParsedProducts', array(
            'criteria'=>array(
                'condition'=>$company_cond.' flag_upd=2',
                'order'=>'com_prod_ident',
            ),
            'pagination'=>array(
                'pageSize'=>50,
            ),
        ));
        $this->render('showNew',array('dataProvider'=>$dataProvider,'companies'=>$companies));
    }

    public function actionDeleteAll()
    {
        $model=ParsedProducts::model();
        if ($model->deleteAllByAttributes(array('flag_upd'=>0)))
        {
            Products::checkPrice(false,false);
            $this->redirect(array('admin'));
        }
        else throw new CHttpException('Не удалось выполнить операцию');
    }

    public function actionLinkProd($company_id)
    {

        $for_menu=Pricelist::model()->findAll();
        $companies=array();
        foreach ($for_menu as $record)
        {
            $companies[]=array('label'=>$record->company,'url'=>array('linkProd','company_id'=>$record->id));
        }

        if ($company_id==='all') {$company_cond='';} else $company_cond='company_id='.$company_id.' AND';
        $dataProvider=new CActiveDataProvider('ParsedProducts', array(
            'criteria'=>array(
                'condition'=>$company_cond.' product_id IS NOT NULL',
                'order'=>'id',
            ),
            'pagination'=>array(
                'pageSize'=>50,
            ),
        ));
        $this->render('linkProd',array('dataProvider'=>$dataProvider,'companies'=>$companies));
    }

    public function actionNotLinkProd($company_id)
    {

        $for_menu=Pricelist::model()->findAll();
        $companies=array();
        foreach ($for_menu as $record)
        {
            $companies[]=array('label'=>$record->company,'url'=>array('notLinkProd','company_id'=>$record->id));
        }

        if ($company_id==='all') {$company_cond='';} else $company_cond='company_id='.$company_id.' AND';
        $dataProvider=new CActiveDataProvider('ParsedProducts', array(
            'criteria'=>array(
                'condition'=>$company_cond.' product_id IS NULL',
                'order'=>'id',
            ),
            'pagination'=>array(
                'pageSize'=>50,
            ),
        ));
        $this->render('linkProd',array('dataProvider'=>$dataProvider,'companies'=>$companies));
    }

    public function actionConfigs()
    {
        $model=new SettingsForm;
        $model->category='system';
        $model->charge_shina=Yii::app()->settings->get('system','charge_shina');
        $model->charge_disk=Yii::app()->settings->get('system','charge_disk');
        $model->callback_email=Yii::app()->settings->get('system','callback_email');
        if(isset($_POST['SettingsForm']))
        {
            $model->attributes=$_POST['SettingsForm'];
            if($model->validate())
            {
                Yii::app()->settings->set('system','charge_shina',$model->charge_shina,true);
                Yii::app()->settings->set('system','charge_disk',$model->charge_disk,true);
                Yii::app()->settings->set('system','callback_email',$model->callback_email,true);
            }
        }
        $this->render('configs',array('model'=>$model));
    }

    public function actionUnlink($id)
    {
        ParsedProducts::model()->updateByPk($id,array('product_id'=>''));
        $this->redirect(array('update','id'=>$id));
    }
}
