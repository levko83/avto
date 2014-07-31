<?php

class CartController extends Controller
{

    public function actionGetData()
	{
		try{
            $cost = Yii::app()->shoppingCart->getCost();
            $count = Yii::app()->shoppingCart->getItemsCount();
            echo CJSON::encode(array(
                "result" => "suxx",
                "cost" => $cost,
                "count" => $count,
            ));
        }catch(Exception $e){
            echo CJSON::encode(array(
                "result" => "error",
            ));
        }
	}

    // добавление шины в корзину
    public function actionTire()
    {
        if($id = (int)Yii::app()->request->getPost("id") and $amount = (int)Yii::app()->request->getPost("amount") and $shina = Shins::model()->findByPk($id)){
            $amount = Yii::app()->shoppingCart->getPositionQuantity($shina) + $amount;
            if((int)$shina->price == 0 or $amount > $shina->amount){
                echo CJSON::encode(array(
                    "result" => "error",
                    "errMsg" => "Шина на склaде отсутствует"
                ));
                Yii::app()->end();
            }
            Yii::app()->shoppingCart->update($shina, $amount);
            echo CJSON::encode(array(
                "result" => "suxx",
            ));
            Yii::app()->end();
        }else{
            echo CJSON::encode(array(
                "result" => "error",
                "errMsg" => "Шина не найдена"
            ));
            Yii::app()->end();
        }
    }

    // добавление диска в корзину
    public function actionDrive()
    {
        if($id = (int)Yii::app()->request->getPost("id") and $amount = (int)Yii::app()->request->getPost("amount") and $disk = Disks::model()->findByPk($id)){
            $currAmount = Yii::app()->shoppingCart->getPositionQuantity($disk);
            $amount = $currAmount + $amount;
            if((int)$disk->price == 0 or $amount > $disk->amount){
                echo CJSON::encode(array(
                    "result" => "error",
                    "errMsg" => "Диск на склaде отсутствует"
                ));
                Yii::app()->end();
            }
            Yii::app()->shoppingCart->update($disk, $amount);
            echo CJSON::encode(array(
                "result" => "suxx",
            ));
            Yii::app()->end();
        }else{
            echo CJSON::encode(array(
                "result" => "error",
                "errMsg" => "Шина не найдена"
            ));
            Yii::app()->end();
        }
    }

    public function actionLoadCartBlock(){
        $positions = Yii::app()->shoppingCart->getPositions();
        $imagesTiresPath = Yii::getPathOfAlias("webroot.images.products.shins");
        $imagesDrivesPath = Yii::getPathOfAlias("webroot.images.products.disks");
        $cartItems = array();
        $summ = 0;
        foreach($positions as $position){
            $cost = $position->getPrice() * $position->getQuantity();
            $class = $position->getClass();
            if($class == "tire"){
                $imagesFolder =  "shins";
                $imagesPath = $imagesTiresPath;
            }else{
                $imagesFolder =  "disks";
                $imagesPath = $imagesDrivesPath;
            }
            $titlePrefix = $class == "tire" ? "Шина" : "Диск";
            $cartItems[] = (object)array(
                "id" => $position->id,
                "image" => "/images/products/{$imagesFolder}/".HtmlHelper::resizeImage($position->image, 100, 100, $imagesPath),
                "class" => $class,
                "title" => "{$titlePrefix} {$position->product_name}",
                "price" => $position->getPrice(),
                "count" => $position->getQuantity(),
                "cost" => $cost,
            );
            $summ += $cost;
        }
        echo CJSON::encode(array(
            "result" => "suxx",
            "html" => $this->render(
                          "_cartBlock",
                          array(
                             "summ" => $summ,
                             "cartItems" => $cartItems,
                          ),
                          true
                      )
        ));
        Yii::app()->end();
    }


    public function actionRemoveCartItem(){
        if($id = (int)Yii::app()->request->getPost("product_id") and $type = Yii::app()->request->getPost("product_type")){
            if($type == "tire" or $type == "drive"){
                $modelClass = $type == "tire" ? Shins : Disks;
                $model = $modelClass::model()->findByPk($id);
                if($model){
                    Yii::app()->shoppingCart->remove($model->getId());
                    echo CJSON::encode(array(
                       "result" => "suxx",
                       "cost" => Yii::app()->shoppingCart->getCost(),
                    ));
                    Yii::app()->end();
                }else{
                    echo CJSON::encode(array(
                        "result" => "error",
                    ));
                    Yii::app()->end();
                }
            }else{
                echo CJSON::encode(array(
                    "result" => "error",
                ));
                Yii::app()->end();
            }
        }else{
            echo CJSON::encode(array(
                "result" => "error",
                "errMsg" => "Шина не найдена"
            ));
            Yii::app()->end();
        }
    }

    public function actionChangeCartItemAmount(){
        if($id = (int)Yii::app()->request->getPost("product_id") and
           $type = Yii::app()->request->getPost("product_type") and
           $amount = (int)Yii::app()->request->getPost("amount") and
           $amount > 0)
        {
            if($type == "tire" or $type == "drive"){
                $modelClass = $type == "tire" ? Shins : Disks;
                $model = $modelClass::model()->findByPk($id);
                if($model and $amount <= $model->amount){
                    Yii::app()->shoppingCart->update($model, $amount);
                    echo CJSON::encode(array(
                        "result" => "suxx",
                        "itemPrice" => $model->price * $amount,
                        "cost" => Yii::app()->shoppingCart->getCost(),
                    ));
                    Yii::app()->end();
                }else{
                    echo CJSON::encode(array(
                        "result" => "error",
                    ));
                    Yii::app()->end();
                }
            }else{
                echo CJSON::encode(array(
                    "result" => "error",
                ));
                Yii::app()->end();
            }
        }else{
            echo CJSON::encode(array(
                "result" => "error",
            ));
            Yii::app()->end();
        }
    }

    // упрощенное оформление заказа
    public function actionShortOrder(){
        $fio = trim($_POST["fio"]);
        if(!empty($fio)){
            $fio = trim(strip_tags($fio));
            if(empty($fio)){
                echo CJSON::encode(array(
                    "error_type" => 1,
                    "form_error" => "Укажите ФИО",
                ));
                Yii::app()->end();
            }
        }
        $phone = trim($_POST["phone"]);
        if(!empty($phone)){
            $phone = trim(strip_tags($phone));
            if(empty($phone)){
                echo CJSON::encode(array(
                    "error_type" => 2,
                    "form_error" => "Укажите телефон",
                ));
                Yii::app()->end();
            }
            $pattern = "/^\('0\d{2}\)\d{3}-\d{2}-\d{2}$/";
            if(!preg_match($pattern, $phone)){
                if(empty($phone)){
                    echo CJSON::encode(array(
                        "error_type" => 2,
                        "form_error" => "Неверный формат телефона",
                    ));
                    Yii::app()->end();
                }
            }
            $cartPositions = Yii::app()->shoppingCart->getPositions();
            if(count($cartPositions) == 0){
                echo CJSON::encode(array(
                    "error_type" => 3,
                    "form_error" => "Корзина пуста",
                ));
                Yii::app()->end();
            }
            $order = new Orders();
            $order->declaration = 0;
            $order->fio = $fio;
            $order->phone = $phone;
            $trans = Yii::app()->db->beginTransaction();
            try{
                if(!$order->save(false)){
                    throw new Exception("Ошибка сохранения заказа в базу данных");
                }
                $order_id = $order->id;
                // сохранение элементов заказа
                $orderDetails = new OrderDetails;
                foreach($cartPositions as $position){
                    $orderDetails->id = false;
                    $orderDetails->isNewRecord = true;
                    $orderDetails->order_id = $order_id;
                    $orderDetails->product_type = $position->getClass() == "tire" ? "shina" : "disk";
                    $orderDetails->product_id = $position->getId();
                    $orderDetails->price = $position->getPrice();
                    $orderDetails->amount = $position->getQuantity();
                    if(!$orderDetails->save()){
                        throw new Exception("Ошибка сохранения элемента истории заказа в базу данных");
                    }
                }
                // сохранение истории заказов
                $history = new OrderHistorys;
                $history->order_id = $order_id;
                $history->user_id = 0;
                $history->status_id = 1;
                $history->addtime = time();
                if(!$history->save()){
                    throw new Exception("Ошибка сохранения статуса заказа в базу данных");
                }
                $trans->commit();
            }catch(Exception $e){
                echo CJSON::encode(array(
                    "error_type" => 3,
                    "form_error" => $e->getMessage(),
                ));
                Yii::app()->end();
                $trans->rollback();
            }
            Yii::app()->shoppingCart->clear();
            echo CJSON::encode(array(
                "result" => "suxx",
            ));
            Yii::app()->end();
        }
    }

    // детальное оформление заказа
    public function actionOrderDetail(){
        $this->layout = 'application.views.layouts.order_detail';
        $cartPositions = Yii::app()->shoppingCart->getPositions();
        if(count($cartPositions) == 0){
            $this->render(
                "order_empty"
            );
            Yii::app()->end();
        }
        $imagesTiresPath = Yii::getPathOfAlias("webroot.images.products.shins");
        $imagesDrivesPath = Yii::getPathOfAlias("webroot.images.products.disks");
        $cartItems = array();
        $summ = 0;
        foreach($cartPositions as $position){
            $cost = $position->getPrice() * $position->getQuantity();
            $class = $position->getClass();
            if($class == "tire"){
                $imagesFolder =  "shins";
                $imagesPath = $imagesTiresPath;
            }else{
                $imagesFolder =  "disks";
                $imagesPath = $imagesDrivesPath;
            }
            $titlePrefix = $class == "tire" ? "Шина" : "Диск";
            $cartItems[] = (object)array(
                "id" => $position->id,
                "image" => "/images/products/{$imagesFolder}/".HtmlHelper::resizeImage($position->image, 100, 100, $imagesPath),
                "class" => $class,
                "title" => "{$titlePrefix} {$position->product_name}",
                "price" => $position->getPrice(),
                "count" => $position->getQuantity(),
                "cost" => $cost,
            );
            $summ += $cost;
        }
        $model = new DetailOrder;
        if(isset($_POST["DetailOrder"])){
            $model->attributes = $_POST["DetailOrder"];
            if($model->validate()){
                $order = new Orders();
                $order->declaration = 0;
                $order->fio = $model->fio;
                $order->phone = $model->phone;
                $order->delivary_id = $model->delivary_id;
                $order->region = $model->region;
                $order->city = $model->city;
                $trans = Yii::app()->db->beginTransaction();
                try{
                    if(!$order->save(false)){
                        throw new Exception("Ошибка сохранения заказа в базу данных");
                    }
                    $order_id = $order->id;
                    // сохранение элементов заказа
                    $orderDetails = new OrderDetails;
                    foreach($cartPositions as $position){
                        $orderDetails->id = false;
                        $orderDetails->isNewRecord = true;
                        $orderDetails->order_id = $order_id;
                        $orderDetails->product_type = $position->getClass() == "tire" ? "shina" : "disk";
                        $orderDetails->product_id = $position->getId();
                        $orderDetails->price = $position->getPrice();
                        $orderDetails->amount = $position->getQuantity();
                        if(!$orderDetails->save()){
                            throw new Exception("Ошибка сохранения элемента истории заказа в базу данных");
                        }
                    }
                    // сохранение истории заказов
                    $history = new OrderHistorys;
                    $history->order_id = $order_id;
                    $history->user_id = 0;
                    $history->status_id = 1;
                    $history->addtime = time();
                    if(!$history->save()){
                        throw new Exception("Ошибка сохранения статуса заказа в базу данных");
                    }
                    // сохранение комментария к заказу
                    if(trim($model->comment) != ""){
                        $comment = new OrderComments;
                        $comment->order_id = $order_id;
                        $comment->user_id = 0;
                        $comment->comment = trim($model->comment);
                        $comment->addtime = time();
                        if(!$comment->save()){
                            throw new Exception("Ошибка сохранения комментария к заказу в базу данных");
                        }
                    }
                    $trans->commit();
                    Yii::app()->shoppingCart->clear();
                    $this->redirect("/");
                }catch(Exception $e){
                    $model->addError("other", $e->getMessage());
                    $trans->rollback();
                }
            }
        }
        $this->render(
            "order_detail",
            array(
                "order" => $model,
                "cartItems" => $cartItems,
                "summ" => $summ,
            )
        );
    }

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}