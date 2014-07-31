<?php

class OrdersController extends Controller
{

    public $layout = 'application.modules.admin.views.layouts.layout';

    public function accessRules(){
        return array(
            array('allow',
                'roles' => array('callCenter', 'manager'),
            ),
            array('deny',
                'roles' => array('guest'),
            ),
        );
    }

    public function filters(){
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    // список заказов
    public function actionIndex(){
        $model = new Orders("search");
        $model->unsetAttributes();
        if($formData = Yii::app()->request->getParam("Orders")){
            $model->attributes = $formData;
        }
        $this->breadcrumbs = array("Магазин", "Заказы");
        $this->render(
            'index',
            array(
                'model' => $model
            )
        );
    }

    // добавление заказа
	public function actionAdd()
	{
        $disks = new Disks('filter');
        $disks->unsetAttributes();
        if($formDataDisksFilter = Yii::app()->request->getPost('Disks')){
           $disks->attributes = $formDataDisksFilter;
        }
        $shins = new Shins('filter');
        $shins->priceMin = $shins->rangePrice->min;
        $shins->priceMax = $shins->rangePrice->max;
        $shins->unsetAttributes();
        if($formDataShinsFilter = Yii::app()->request->getPost('Shins')){
            $shins->attributes = $formDataShinsFilter;
        }
        $order = new Orders();
        $order->declaration = 0;
        if($formDataOrder = Yii::app()->request->getPost("Orders")){
            //$order->unsetAttributes();
            $order->attributes = $formDataOrder;
            $trans = Yii::app()->db->beginTransaction();
            try{
                if($order->save()){
                    $order_id = $order->id;
                    SessOrderDetails::getInstance()->saveDetails($order_id);
                    if(trim($order->comment) != ""){
                        $comment = new OrderComments;
                        $comment->order_id = $order_id;
                        $comment->user_id = Yii::app()->user->id;
                        $comment->comment = trim($order->comment);
                        $comment->addtime = time();
                        if(!$comment->save()){
                            throw new Exception("Ошибка сохранения комментария в базу данных");
                        }
                    }
                    $history = new OrderHistorys;
                    $history->order_id = $order_id;
                    $history->user_id = Yii::app()->user->id;
                    $history->status_id = $order->status_id;
                    $history->addtime = time();
                    if(!$history->save()){
                        throw new Exception("Ошибка сохранения статуса заказа в базу данных");
                    }
                }else{
                    throw new Exception("Ошибка сохранения заказа в базу данных");;
                }
                SessOrderDetails::getInstance()->clear();
                $trans->commit();
                $this->redirect("/admin/orders/index");
            }catch(Exception $e){
                $trans->rollback();
            }
        }
        if(!Yii::app()->request->isAjaxRequest and !$order->errors){
            SessOrderDetails::getInstance()->clear();
            SessOrderDetails::getInstance()->loadDetails();
        }
        $detailsProvider = new CArrayDataProvider(
                                    SessOrderDetails::getInstance()->getData(),
                                    array(
                                        'pagination'=>false,
                                    )
                               );
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/js/admin/filter.js", CClientScript::POS_END);
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/js/admin/order_edit.js", CClientScript::POS_END);
        $this->breadcrumbs = array(
            "Магазин",
            CHtml::link("Заказы", "/admin/orders/index"),
            "Новый заказ"
        );
		$this->render(
            'edit',
            array(
                'disks' => $disks,
                'shins' => $shins,
                'detailsProvider' => $detailsProvider,
                'order' => $order,
                'total' => SessOrderDetails::getInstance()->getTotal(),
            )
        );
	}

    // редактирование заказа
    public function actionEdit($id)
    {
        if(!$order = Orders::model()->findByPk((int)$id)){
            throw new CHttpException(404, "Заказ не найден");
        }
        $disks = new Disks('filter');
        $disks->unsetAttributes();
        if($formDataDisksFilter = Yii::app()->request->getPost('Disks')){
            $disks->attributes = $formDataDisksFilter;
        }
        $shins = new Shins('filter');
        $shins->priceMin = $shins->rangePrice->min;
        $shins->priceMax = $shins->rangePrice->max;
        $shins->unsetAttributes();
        if($formDataShinsFilter = Yii::app()->request->getPost('Shins')){
            $shins->attributes = $formDataShinsFilter;
        }
        if($formDataOrder = Yii::app()->request->getPost("Orders")){
            $order->attributes = $formDataOrder;
            $trans = Yii::app()->db->beginTransaction();
            try{
                if($order->save()){
                    SessOrderDetails::getInstance($id)->saveDetails();
                    if(trim($order->comment) != ""){
                        $comment = new OrderComments;
                        $comment->order_id = $id;
                        $comment->user_id = Yii::app()->user->id;
                        $comment->comment = trim($order->comment);
                        $comment->addtime = time();
                        if(!$comment->save()){
                            throw new Exception("Ошибка сохранения комментария в базу данных");
                        }
                    }
                    $history = new OrderHistorys;
                    $history->order_id = $id;
                    $history->user_id = Yii::app()->user->id;
                    $history->status_id = $order->status_id;
                    $history->addtime = time();
                    if(!$history->save()){
                        throw new Exception("Ошибка сохранения статуса заказа в базу данных");
                    }
                }else{
                    throw new Exception("Ошибка сохранения заказа в базу данных");;
                }
                SessOrderDetails::getInstance($id)->clear();
                $trans->commit();
                $this->redirect("/admin/orders/index");
            }catch(Exception $e){
                $trans->rollback();
            }
        }
        if(!Yii::app()->request->isAjaxRequest and !$order->errors){
            SessOrderDetails::getInstance($id)->clear();
            SessOrderDetails::getInstance($id)->loadDetails();
        }
        $detailsProvider = new CArrayDataProvider(
            SessOrderDetails::getInstance($id)->getData(),
            array(
                'pagination'=>false,
            )
        );
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/js/admin/filter.js", CClientScript::POS_END);
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/js/admin/order_edit.js", CClientScript::POS_END);
        $this->breadcrumbs = array(
            "Магазин",
            CHtml::link("Заказы", "/admin/orders/index"),
            "Редактирование заказа"
        );
        $this->render(
            'edit',
            array(
                'disks' => $disks,
                'shins' => $shins,
                'detailsProvider' => $detailsProvider,
                'order' => $order,
                'total' => SessOrderDetails::getInstance()->getTotal(),
                'comments' => OrderComments::model()->findAll(
                                array(
                                   "condition" => "order_id = {$id}",
                                   "order" => "addtime DESC",
                                )
                              ),
            )
        );
    }

    public function actionSearchDisks(){
        $disks = new Disks("filter");
        $disks->unsetAttributes();
        if($formData = Yii::app()->request->getPost("Disks")){
            $disks->attributes = $formData;
        }
        $this->render('index', array(
            'disks' => $disks,
            'pages' => 10
        ));
    }

    // AJAX добавление товара в заказ
    public function actionAddProduct(){
        if(Yii::app()->request->isAjaxRequest){
            if($product = Yii::app()->request->getPost('product') and $order_id = Yii::app()->request->getPost('order_id')){
                if($order_id == -1){
                    if(SessOrderDetails::getInstance()->add($product)){
                        $response = array(
                            "code" => 1,
                        );
                    }else{
                        $response = array(
                            "code" => 0,
                        );
                    }
                }else{
                    $order = Orders::model()->findByPk($order_id);
                    if($order and ($order->currStatus == 1 or $order->currStatus == 2 or $order->currStatus == 3)){
                        if(SessOrderDetails::getInstance($order_id)->add($product)){
                            $response = array(
                                "code" => 1,
                            );
                        }else{
                            $response = array(
                                "code" => 0,
                            );
                        }
                    }else{
                        $response = array(
                            "code" => 0,
                        );
                    }
                }
            }else{
                $response = array(
                    "code" => 0,
                );
            }
            echo CJSON::encode($response);
            Yii::app()->end();
        }else{
            throw new CHttpException(404, 'Документ не найден');
        }
    }

    // AJAX добавление удаление товара из заказа
    public function actionDelProduct(){
        if(Yii::app()->request->isAjaxRequest){
            if($product = Yii::app()->request->getPost('product') and $order_id = Yii::app()->request->getPost('order_id')){
                if($order_id == -1){
                    if(SessOrderDetails::getInstance()->remove($product)){
                        $response = array(
                            "code" => 1,
                        );
                    }else{
                        $response = array(
                            "code" => 0,
                        );
                    }
                }else{
                    $order = Orders::model()->findByPk($order_id);
                    if($order and ($order->currStatus == 1 or $order->currStatus == 2 or $order->currStatus == 3)){
                        if(SessOrderDetails::getInstance($order_id)->remove($product)){
                            $response = array(
                                "code" => 1,
                            );
                        }else{
                            $response = array(
                                "code" => 0,
                            );
                        }
                    }else{
                        $response = array(
                            "code" => 0,
                        );
                    }
                }
            }else{
                $response = array(
                    "code" => 0,
                );
            }
            echo CJSON::encode($response);
            Yii::app()->end();
        }else{
            throw new CHttpException(404, 'Документ не найден');
        }
    }

    // AJAX удаление товра из заказа
    public function actionChangeAmount(){
        if(Yii::app()->request->isAjaxRequest){
            $product = Yii::app()->request->getPost('product');
            $order_id = Yii::app()->request->getPost('order_id');
            $amount = Yii::app()->request->getPost('amount');
            if($product and $order_id and $amount){
                if($order_id == -1){
                    $v = SessOrderDetails::getInstance()->changeAmount($product, $amount);
                    if($v === false){
                        $response = array(
                            "code" => 0,
                        );
                    }else{
                        $response = array(
                            "code" => 1,
                            "value" => $v
                        );
                    }
                }else{
                    $order = Orders::model()->findByPk($order_id);
                    if($order and ($order->currStatus == 1 or $order->currStatus == 2 or $order->currStatus == 3)){
                        $v = SessOrderDetails::getInstance($order_id)->changeAmount($product, $amount);
                        if($v === false){
                            $response = array(
                                "code" => 0,
                            );
                        }else{
                            $response = array(
                                "code" => 1,
                                "value" => $v
                            );
                        }
                    }else{
                        $response = array(
                            "code" => 0,
                        );
                    }
                }
                echo CJSON::encode($response);
                Yii::app()->end();
            }
        }else{
            throw new CHttpException(404, 'Документ не найден');
        }
    }

    // AJAX очистить список товаров в заказе
    public function actionClearProducts(){
        if(Yii::app()->request->isAjaxRequest){
            if($order_id = (int)Yii::app()->request->getPost('order_id')){
                if($order_id == -1){
                    SessOrderDetails::getInstance()->clear();
                    $response = array(
                        "code" => 1,
                    );
                }else{
                    $order = Orders::model()->findByPk($order_id);
                    if($order and ($order->currStatus == 1 or $order->currStatus == 2 or $order->currStatus == 3)){
                        SessOrderDetails::getInstance($order_id)->clear();
                        $response = array(
                            "code" => 1,
                        );
                    }else{
                        $response = array(
                            "code" => 0,
                        );
                    }
                }
            }else{
                $response = array(
                    "code" => 0,
                );
            }
            echo CJSON::encode($response);
            Yii::app()->end();
        }else{
            throw new CHttpException(404, 'Документ не найден');
        }
    }

}