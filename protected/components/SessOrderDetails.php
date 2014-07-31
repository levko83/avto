<?php
/**
 * Created by PhpStorm.
 * User: Ifaliuk
 * Date: 11.12.13
 * Time: 11:40
 */

class SessOrderDetails {

    private $_data;
    private $_ordser_id;

    private static $_instance = null;

    private function __construct($order_id = null){
        $this->_ordser_id = $order_id == null ? "new" : $order_id;
        $this->load();
    }

    public static function getInstance($order_id = null){
        if(self::$_instance == null){
            self::$_instance = new self($order_id);
        }
        return self::$_instance;
    }

    public function getData(){
        return $this->_data;
    }

    public function loadDetails(){
        $this->_data = OrderDetails::model()->getArray($this->_ordser_id);
        $this->save();
    }

    public function saveDetails($new_order_id = false){
        if($this->_ordser_id != "new"){
            $k = OrderDetails::model()->deleteAll("order_id = {$this->_ordser_id}");
        }
        if($this->_data){
            $model = new OrderDetails;
            foreach($this->_data as $item){
                $model->id = false;
                $model->isNewRecord = true;
                $model->attributes = $item;
                if($this->_ordser_id == "new"){
                    $model->order_id = $new_order_id;
                }else{
                    $model->order_id = $this->_ordser_id;
                }
                $model->save();
            }
        }
    }

    public function clear(){
        $this->_data = array();
        $this->save();
    }

    public function add($product){
        $type = $product{0};
        if($type != 'd' and $type != 's')
            return false;
        $product_id = (int)mb_substr($product, 1, mb_strlen($product) - 1);
        $key = $this->orderItemKey($type, $product_id);
        if($this->orderItemKey($type, $product_id) >= 0)
            return false;
        $modelName = $type == "d" ? Disks : Shins;
        $model = $modelName::model()->find("id = {$product_id} and amount > 0");
        if(!$model)
            return false;
        $this->_data[] = array(
            "order_id" => $this->_ordser_id == "new" ? NULL : $this->_ordser_id,
            "product_type" => $type == "d" ? "disk" : "shina",
            "product_id" => $product_id,
            "provider" => $model->getProvider(),
            "storeAmount" => $model->amount,
            "price" => $model->price,
            "amount" => 1
        );
        $this->save();
        return true;
    }

    public function changeAmount($product, $newAmount){
        $type = $product{0};
        if($type != 'd' and $type != 's')
            return false;
        $product_id = (int)mb_substr($product, 1, mb_strlen($product) - 1);
        $modelName = $type == "d" ? Disks : Shins;
        $model = $modelName::model()->find("id = {$product_id} and amount > 0");
        if(!$model)
            return false;
        $newAmount = (int)$newAmount;
        if(!($newAmount >= 1 and $newAmount <= $model->amount)){
            $newAmount = $model->amount;
        }
        $id = $this->orderItemKey($type, $product_id);
        $temp = $this->_data[$id];
        $temp["amount"] = $newAmount;
        $this->_data[$id] = $temp;
        $this->save();
        return $newAmount;
    }

    public function remove($product){
        $type = $product{0};
        if($type != 'd' and $type != 's')
            return false;
        $product_id = (int)mb_substr($product, 1, mb_strlen($product) - 1);
        $id = $this->orderItemKey($type, $product_id);
        if($id >= 0){
            unset($this->_data[$id]);
            $temp = array();
            foreach($this->_data as $item){
                $temp[] = $item;
            }
            $this->_data = $temp;
            $this->save();
            return true;
        }else
            return false;
    }

    public function getTotal(){
        $total = 0;
        if(count($this->_data) > 0){
            foreach($this->_data as $item){
                $total += $item["price"];
            }
        }
        return $total;
    }

    private function orderItemKey($type, $product_id){
        $type = $type == 's' ? 'shina' : 'disk';
        $search = array_filter($this->_data, function($item) use ($type, $product_id){
                                                return $item["product_type"] == $type and $item["product_id"] == $product_id;
                                             });
        if(!$search)
            return -1;
        reset($search);
        return key($search);
    }

    private function load(){
        if(!($details = Yii::app()->session["order_details"])){
            $details = array();
        }
        if(!$this->_data = $details[$this->_ordser_id]){
            $this->_data = array();
        }
    }

    private function save(){
        if(!($details = Yii::app()->session["order_details"])){
            $details = array();
        }
        $details[$this->_ordser_id] = $this->_data;
        Yii::app()->session["order_details"] = $details;
    }

}