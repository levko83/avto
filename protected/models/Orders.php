<?php

/**
 * This is the model class for table "orders".
 *
 * The followings are the available columns in table 'orders':
 * @property integer $id
 * @property string $fio
 * @property string $phone
 * @property string $region
 * @property integer $currStatus
 * @property string $city
 * @property string $district
 * @property string $street
 * @property string $house_flat
 * @property integer $delivary_id
 * @property string $declaration
 * @property integer $discount
 *
 * The followings are the available model relations:
 * @property OrderComments[] $orderComments
 * @property OrderDetails[] $orderDetails
 * @property OrderHistorys[] $orderHistorys
 * @property OrderDeliverys $delivary
 */
class Orders extends CExtendedActiveRecord
{
	/**
	 * @return string the associated database table name
	 */



    private $_currStatus;

    public $status_id;

    public $comment;

    public $sum;

    public $amount;

    public $addtime;

    public $detailsCount;

	public function tableName()
	{
		return 'orders';
	}

    public function behaviors(){
        return array(
            "StatisticaBehavior" => array(
                "class" => "application.components.StatisticaBehavior",
                "tables" => "orders"
            ),
        );
    }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fio, phone, city, street, house_flat, status_id, declaration', 'required'),
            array('fio, phone, city, street, house_flat, declaration, comment', 'filter', 'filter' => 'strip_tags'),
            array('status_id', 'statusValidator'),
            array('detailsCount', 'detailsCountValidator'),
			array('delivary_id, discount, status_id', 'numerical', 'integerOnly'=>true),
            array('delivary_id', 'exist',
                  'skipOnError' => true,
                  'className' => 'OrderDeliverys',
                  'attributeName' => 'id',
                  'message' => 'Выберите способ доставки',
            ),
			array('fio, region, city, district, street', 'length', 'max'=>200),
			array('phone, house_flat', 'length', 'max'=>15),
			array('declaration', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, status_id, fio, phone, region, city, district, street, house_flat, delivary_id, declaration, discount, sum, amount, addtime', 'safe', 'on'=>'search'),
		);
	}

    public function getStatusIds(){
        switch($this->currStatus){
            case 1:
                return array(2, 5);
            case 2:
                return array(3, 4);
            case 3:
                return array(2, 4, 5);
            case 4:
                return array(6);
            case 6:
                return array(7);
        }
    }

    public function accessEdit(){
        $role = Yii::app()->user->role;
        if($role == "root" OR $role == "administrator")
            return true;
        switch($this->currStatus){
            // если 'Новый'
            case 1: if($role == "callCenter")
                        return true;
                    break;
            // если 'Принят'
            case 2: if($role == "manager")
                        return true;
                    break;
            // если 'Перекомплектация'
            case 3: if($role == "callCenter")
                        return true;
                    break;
            // если 'Готов к завершению'
            case 4: if($role == "manager")
                        return true;
                    break;
            // если 'Отменен'
            case 5: return false;
            // если 'Отправлено'
            case 6: if($role == "callCenter")
                        return true;
                    break;
        }
        return false;
    }

    // return $this->currStatus
    public function getCurrStatus(){
        if(!$this->_currStatus){
            if($this->id){
                $criteria = new CDbCriteria;
                $criteria->select = "status_id as id";
                $criteria->order = "addtime DESC";
                $criteria->compare("order_id", $this->id);
                $this->_currStatus = OrderHistorys::model()->find($criteria)->id;
            }else{
                $this->_currStatus = 1;
            }
        }
        return $this->_currStatus;
    }

    public function statusValidator($attribute, $params){
        $arr = $this->getStatusIds();
        if(!in_array($this->status_id, $arr)){
            $this->addError("status_id", 'Вы не можете выбрать данный статус заказа');
        }
    }

    public function detailsCountValidator($attribute, $params){
        if(count(SessOrderDetails::getInstance($this->id)->getData()) == 0){
            $this->addError("detailsCount", 'Заполните список товаров в заказе');
        }
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'fio' => 'ФИО',
            'phone' => 'Телефон',
            'region' => 'Область',
            'city' => 'Город',
            'district' => 'Район',
            'street' => 'Улица',
            'house_flat' => 'Дом/кв',
            'status_id' => 'Статус заказа',
            'delivary_id' => 'Способ доставки',
            'declaration' => 'Номер декларации',
            'discount' => 'Скидка, %',
        );
    }


    /**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'orderComments' => array(self::HAS_MANY, 'OrderComments', 'order_id'),
			'orderDetails' => array(self::HAS_MANY, 'OrderDetails', 'order_id'),
			'orderHistorys' => array(self::HAS_MANY, 'OrderHistorys', 'order_id'),
			'delivary' => array(self::BELONGS_TO, 'OrderDeliverys', 'delivary_id'),
//            'detailsSum'=>array(self::STAT,  'OrderDetails', 'order_id', 'select' => 'SUM(price)'),
//            'detailsAmount'=>array(self::STAT,  'OrderDetails', 'order_id', 'select' => 'SUM(amount)'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		$criteria=new CDbCriteria;
        $criteria->select = "t.*,
                            order_historys.status_id as status_id,
                            (SELECT sum(price) FROM order_details WHERE order_id = t.id) AS sum,
                            (SELECT sum(amount) FROM order_details WHERE order_id = t.id) AS amount,
                            order_historys.addtime as addtime";
        $criteria->join = "LEFT JOIN order_historys
                                     ON order_historys.id = (SELECT id FROM order_historys WHERE order_id = t.id ORDER BY addtime DESC LIMIT 1)";
        $criteria->compare('t.id',$this->id);
        $criteria->compare('status_id',$this->status_id);
		$criteria->compare('t.fio',$this->fio,true);
		$criteria->compare('t.phone',$this->phone,true);
		$criteria->compare('t.region',$this->region,true);
		$criteria->compare('t.city',$this->city,true);
		$criteria->compare('t.district',$this->district,true);
        $criteria->compare('t.street',$this->street,true);
		$criteria->compare('t.house_flat',$this->house_flat,true);
		$criteria->compare('t.delivary_id',$this->delivary_id);
		$criteria->compare('t.declaration',$this->declaration,true);
		$criteria->compare('t.discount',$this->discount);
        if($addtime = CDateTimeParser::parse($this->addtime,'dd/MM/yyyy')){
            $criteria->addCondition("FROM_UNIXTIME({$addtime}, '%d-%m-%Y') = FROM_UNIXTIME(addtime, '%d-%m-%Y')");
        }
		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 25,
            ),
            'sort'=>array(
                'defaultOrder'=>'status_id DESC, addtime DESC',
                'attributes'=>array(
                    'status_id'=>array(
                        'asc'=>'status_id',
                        'desc'=>'status_id DESC',
                    ),
                    'sum'=>array(
                        'asc'=>'sum',
                        'desc'=>'sum DESC',
                    ),
                    'amount'=>array(
                        'asc'=>'amount',
                        'desc'=>'amount DESC',
                    ),
                    'addtime'=>array(
                        'asc'=>'addtime',
                        'desc'=>'addtime DESC',
                    ),
                    '*',
                ),
            ),
		));
	}

    /**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Orders the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
