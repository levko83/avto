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
 *
 * The followings are the available model relations:
 * @property Pricelist $company
 */
class ParsedProducts extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ParsedProducts the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
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
			array('com_prod_ident, prod_name', 'length', 'max'=>255),
			array('product_type', 'length', 'max'=>60),
			array('price', 'length', 'max'=>8),
			array('amount', 'length', 'max'=>6),
			array('final_price', 'length', 'max'=>10),
			array('file_hash', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, product_id, product_type, company_id, com_prod_ident, charge_auto, charge_hand, prod_name, price, amount, money_flag, final_price, flag_upd, file_hash', 'safe', 'on'=>'search'),
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
			'product_id' => 'Артикул',
			'product_type' => 'Тип продукта',
			'company_id' => 'Company',
            'company_rel.company'=>'Поставщик',
			'com_prod_ident' => 'Код поставщика',
			'prod_name' => 'Название продукта',
			'price' => 'Цена поставщика',
            'charge_auto' => 'Автоматическая наценка, %',
            'charge_hand' => 'Ручная наценка, %',
			'amount' => 'Количество',
			'money_flag' => 'Код валюты',
			'final_price' => 'Цена (входная)',
			'flag_upd' => 'Статус товара (0-помечен на удаление, 1-обновлен, 2-новый)',
			'file_hash' => 'File Hash',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

        $criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('product_type' ,$this->product_type, true);
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
        if($this->company_rel){
            $criteria->compare('company_rel.company',$this->company_rel->company, true);
        }
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'pagination'=>array(
                'pageSize'=>50,
            ),
		));
	}

    static function updateRecord($record_id)
    {
        $record=ParsedProducts::model()->findByPk($record_id);
        $currency_value=1;
        if ($record->money_flag=='980')
        {
            $currency_value=1;
        }
        elseif ($record->money_flag=='840')
        {
            $curr_con=Yii::app()->db->createCommand('SELECT currency_value FROM SC_currency_types WHERE CID=11');
            $currency=$curr_con->queryScalar();
            $currency_value=1/$currency;
        }
        $final_price=ceil($record->price*$currency_value);
        $record->final_price=$final_price;
        $record->save();
    }
}