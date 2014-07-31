<?php

/**
 * This is the model class for table "products".
 *
 * The followings are the available columns in table 'products':
 * @property integer $id
 * @property string $type
 * @property string $product_name
 */
class SiteProducts extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */

    public function getDbConnection(){
        return Yii::app()->db1;
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
			'type' => 'Тип товара',
			'product_name' => 'Название',
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

    public static function checkPrice($record_id, $product_type, $company_id)
    {
        if ($company_id==false) {$company_id='*';}
        if ($record_id!==false)
        {
            $productModel = $product_type == "shina" ? Shins : Disks;
            $current_record = $productModel::model()->findByPk($record_id);
            $current_record_id = $current_record->id;
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
//                    $current_record->diller_name=$parsed_product_result->company_rel->company;
                    $current_record->price = ceil($temp_price);
                    if ($current_record->save()) return true;
                }
                else
                {
                    $current_record->amount = 0;
                    if ($current_record->save()) return true;
                }
            }

        }
        else
        {
            $parsed_product=new ParsedProducts;
            $criteriaForParsedProducts=new CDbCriteria();
            $criteriaForParsedProducts->select='product_id';
            $condition = '`company_id`="'.$company_id.'"';
            if($company_id != '*'){
                $condition .= " AND `product_id` IS NOT NULL";
            }
            $criteriaForParsedProducts->condition = $condition;
            $parsed_product_result=$parsed_product->findAll($criteriaForParsedProducts);
            foreach ($parsed_product_result as $record)
            {
                if(!$product_type){
                    self::checkPrice($record->product_id, 'shina', false);
                    self::checkPrice($record->product_id, 'disk', false);
                }else{
                    self::checkPrice($record->product_id, $record->$product_type, false);
                }
            }
            return true;
        }
        return false;
    }


    /**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SiteProducts the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}