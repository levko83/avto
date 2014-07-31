<?php

/**
 * This is the model class for table "{{parsed_products}}".
 *
 * The followings are the available columns in table '{{parsed_products}}':
 * @property integer $id
 * @property integer $product_id
 * @property string $product_type
 * @property integer $company_id
 * @property string $com_prod_ident
 * @property string $prod_name
 * @property string $price
 * @property integer $charge_auto
 * @property integer $charge_hand
 * @property string $amount
 * @property integer $money_flag
 * @property string $final_price
 * @property integer $flag_upd
 * @property string $file_hash
 */
class ParsedProducts extends CExtendedActiveRecord
{

    public function getDbConnection(){
        return Yii::app()->db1;
    }

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{parsed_products}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('company_id, com_prod_ident, prod_name, price, money_flag, final_price', 'required'),
			array('product_id, company_id, charge_auto, charge_hand, money_flag, flag_upd', 'numerical', 'integerOnly'=>true),
			array('product_type', 'length', 'max'=>20),
			array('com_prod_ident, prod_name', 'length', 'max'=>255),
			array('price', 'length', 'max'=>8),
			array('amount', 'length', 'max'=>6),
			array('final_price', 'length', 'max'=>10),
			array('file_hash', 'length', 'max'=>32),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, product_id, product_type, company_id, com_prod_ident, prod_name, price, charge_auto, charge_hand, amount, money_flag, final_price, flag_upd, file_hash', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
        return array(
            'company_rel' => array(self::BELONGS_TO, 'Pricelist', 'company_id'),
        );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'product_id' => 'Product',
			'product_type' => 'Product Type',
			'company_id' => 'Company',
			'com_prod_ident' => 'Com Prod Ident',
			'prod_name' => 'Prod Name',
			'price' => 'Price',
			'charge_auto' => 'Charge Auto',
			'charge_hand' => 'Charge Hand',
			'amount' => 'Amount',
			'money_flag' => 'Money Flag',
			'final_price' => 'Final Price',
			'flag_upd' => 'Flag Upd',
			'file_hash' => 'File Hash',
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
		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('product_type',$this->product_type,true);
		$criteria->compare('company_id',$this->company_id);
		$criteria->compare('com_prod_ident',$this->com_prod_ident,true);
		$criteria->compare('prod_name',$this->prod_name,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('charge_auto',$this->charge_auto);
		$criteria->compare('charge_hand',$this->charge_hand);
		$criteria->compare('amount',$this->amount,true);
		$criteria->compare('money_flag',$this->money_flag);
		$criteria->compare('final_price',$this->final_price,true);
		$criteria->compare('flag_upd',$this->flag_upd);
		$criteria->compare('file_hash',$this->file_hash,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ParsedProducts the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
