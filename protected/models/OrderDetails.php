<?php

/**
 * This is the model class for table "order_details".
 *
 * The followings are the available columns in table 'order_details':
 * @property integer $id
 * @property integer $order_id
 * @property string $product_type
 * @property string $provider
 * @property integer $product_id
 * @property integer $amount
 * @property string $price
 *
 * The followings are the available model relations:
 * @property Orders $order
 */
class OrderDetails extends CExtendedActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'order_details';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('order_id, product_id, amount', 'numerical', 'integerOnly'=>true),
			array('product_type', 'length', 'max'=>10),
			array('provider', 'length', 'max'=>100),
			array('price', 'length', 'max'=>11),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, order_id, product_type, provider, product_id, amount, price', 'safe', 'on'=>'search'),
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
			'order' => array(self::BELONGS_TO, 'Orders', 'order_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'order_id' => 'Order',
			'product_type' => 'Product Type',
			'provider' => 'Provider',
			'product_id' => 'Product',
			'amount' => 'Amount',
			'price' => 'Price',
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
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('order_id',$this->order_id);
		$criteria->compare('product_type',$this->product_type,true);
		$criteria->compare('provider',$this->provider,true);
		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('price',$this->price,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function getArray($order_id){
        $sql = "SELECT order_id, product_type, product_id, provider, price, amount FROM order_details WHERE order_id = :order_id";
        $command = Yii::app()->db->createCommand($sql);
        $command->params[":order_id"] = $order_id;
        return $command->queryAll();
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return OrderDetails the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
