<?php

/**
 * This is the model class for table "products".
 *
 * The followings are the available columns in table 'products':
 * @property integer $id
 * @property string $type
 * @property string $product_name
 */
class Products extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
    public function getDbConnection()
    {
        return Yii::app()->db_main;
    }


    public function tableName()
	{
		return 'products';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('product_name', 'required'),
			array('id', 'numerical', 'integerOnly'=>true),
			array('type', 'length', 'max'=>5),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, type, product_name', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'type' => 'Тип изделия',
			'product_name' => 'Название изделия',
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
		$criteria->compare('type',$this->type,true);
		$criteria->compare('product_name',$this->product_name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Products1 the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public static function checkPrice($record_id, $product_type, $company_id)
    {
        if ($company_id==false) {$company_id='*';}
        if ($record_id!==false and $product_type)
        {
            if($product_type == "shina"){
                $current_record = Shins::model()->findByPk($record_id);
            }else{
                $current_record = Disks::model()->findByPk($record_id);
            }
            $current_record_id=$current_record->id;
            if ($current_record) {
                $parsed_product=new ParsedProducts;
                $criteriaForParsedProducts=new CDbCriteria();
                $criteriaForParsedProducts->select='price,charge_auto,charge_hand,amount,money_flag';
                $criteriaForParsedProducts->condition='`product_id`="'.$current_record_id.'" AND `flag_upd`<> 0 AND `amount`>3 AND `final_price`>1';
                $criteriaForParsedProducts->order='final_price ASC';
                $criteriaForParsedProducts->limit='1';
                $criteriaForParsedProducts->with='company_rel';
                $parsed_product_result=$parsed_product->find($criteriaForParsedProducts);
                if ($parsed_product_result!=null)
                {
                    $temp_price = 0;
                    if ($parsed_product_result->charge_hand>0)
                    {
                        $temp_price=$parsed_product_result->price*(1+$parsed_product_result->charge_hand*0.01);
                    }
                    else
                    {
                        $temp_price=$parsed_product_result->price*(1+$parsed_product_result->charge_auto*0.01);
                    }
                    if($parsed_product_result->money_flag=='840')
                    {
                        $curr_con=Yii::app()->db->createCommand('SELECT currency_value FROM SC_currency_types WHERE CID=11');
                        $currency=$curr_con->queryScalar();
                        $currency_value=1/$currency;
                        $temp_price=$temp_price*$currency_value;
                    }
                    $current_record->amount = $parsed_product_result->amount;
                    $current_record->diller_name=$parsed_product_result->company_rel->company;
                    $current_record->price = ceil($temp_price);
                    if ($current_record->save())
                        return true;
                }
                else
                {
                    $current_record->amount = null;
                    if ($current_record->save())
                        return true;
                }
            }

        }
        else
        {
            $parsed_product=new ParsedProducts;
            $criteriaForParsedProducts=new CDbCriteria();
            $criteriaForParsedProducts->select='product_id, product_type';
            //$criteriaForParsedProducts->condition='`company_id`="'.$company_id.'" AND `product_id` IS NOT NULL AND `flag_upd` <> "0" AND `amount`>3 AND `final_price`>0';
            $criteriaForParsedProducts->condition='`company_id`="'.$company_id.'" AND `product_id` IS NOT NULL';
            //$criteriaForParsedProducts->group='product_id';
            //$parsed_product_result=$parsed_product->with('company_rel')->findAll($criteriaForParsedProducts);
            $parsed_product_result=$parsed_product->findAll($criteriaForParsedProducts);
            //$currency=Yii::app()->db->createCommand('SELECT currency_value FROM SC_currency_types WHERE CID=11');
            //$temp_price='0';
            //print_r($parsed_product_result);
            foreach ($parsed_product_result as $record)
            {
                self::checkPrice($record->product_id, $record->product_type, false);
            }
            return true;
        }
        return false;
    }

    public static function cartProcessing($goods)
    {
        if (is_array($goods))
        {
            //var_dump($goods);
            foreach ($goods as $good)
            {
                $prodId=$good['productID'];
                $parsedProduct=new ParsedProducts();
                $criteriaForParsedProduct=new CDbCriteria();
                $criteriaForParsedProduct->select='id,amount,company_id';
                $criteriaForParsedProduct->condition='`product_id`="'.$prodId.'" AND `flag_upd` <> 0 AND `amount`>3';
                $criteriaForParsedProduct->order='final_price ASC';
                $criteriaForParsedProduct->limit='1';
                $parsedResult=$parsedProduct->find($criteriaForParsedProduct);
                $model=ParsedProducts::model()->findByPk($parsedResult->id);
                $model->amount=$parsedResult->amount-$good['quantity'];
                echo $parsedProduct->amount;
                if ($model->save())
                {
                    Products::checkPrice($prodId,$parsedResult->company_id);
                }
            }
        }
    }


}
