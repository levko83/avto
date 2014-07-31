<?php

/**
 * This is the model class for table "shins".
 *
 * The followings are the available columns in table 'shins':
 * @property integer $id
 * @property integer $vendor_id
 * @property string $product_name
 * @property integer $shins_type_of_avto_id
 * @property integer $shins_season_id
 * @property integer $shins_profile_width
 * @property string $shins_diametr
 * @property integer $shins_profile_height
 * @property integer $shins_speed_index_id
 * @property string $shins_load_index
 * @property integer $shins_germetic_mode_id
 * @property integer $shins_construction_id
 * @property integer $shins_run_flat_technology_id
 * @property integer $shins_spike_id
 * @property string $description
 * @property string $price
 * @property integer $amount
 *
 * The followings are the available model relations:
 * @property ShinsVendors $vendor
 * @property ShinsTypeOfAvto $shinsTypeOfAvto
 * @property ShinsSeason $shinsSeason
 * @property ShinsSpeedIndex $shinsSpeedIndex
 * @property ShinsGermeticMode $shinsGermeticMode
 * @property ShinsConstruction $shinsConstruction
 * @property VocabularyAvailability $shinsRunFlatTechnology
 * @property VocabularyAvailability $shinsSpike
 * @property ShinsImages[] $shinsImages
 */
class Shins extends CActiveRecord
{

    public function getDbConnection(){
        return Yii::app()->db1;
    }

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'shins';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('vendor_id, product_name', 'required'),
			array('vendor_id, shins_type_of_avto_id, shins_season_id, shins_profile_width, shins_profile_height, shins_speed_index_id, shins_germetic_mode_id, shins_construction_id, shins_run_flat_technology_id, shins_spike_id, amount', 'numerical', 'integerOnly'=>true),
			array('shins_diametr, price', 'length', 'max'=>11),
			array('shins_load_index', 'length', 'max'=>35),
			array('description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, vendor_id, product_name, shins_type_of_avto_id, shins_season_id, shins_profile_width, shins_diametr, shins_profile_height, shins_speed_index_id, shins_load_index, shins_germetic_mode_id, shins_construction_id, shins_run_flat_technology_id, shins_spike_id, description, price, amount', 'safe', 'on'=>'search'),
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
			'vendor' => array(self::BELONGS_TO, 'ShinsVendors', 'vendor_id'),
			'shinsTypeOfAvto' => array(self::BELONGS_TO, 'ShinsTypeOfAvto', 'shins_type_of_avto_id'),
			'shinsSeason' => array(self::BELONGS_TO, 'ShinsSeason', 'shins_season_id'),
			'shinsSpeedIndex' => array(self::BELONGS_TO, 'ShinsSpeedIndex', 'shins_speed_index_id'),
			'shinsGermeticMode' => array(self::BELONGS_TO, 'ShinsGermeticMode', 'shins_germetic_mode_id'),
			'shinsConstruction' => array(self::BELONGS_TO, 'ShinsConstruction', 'shins_construction_id'),
			'shinsRunFlatTechnology' => array(self::BELONGS_TO, 'VocabularyAvailability', 'shins_run_flat_technology_id'),
			'shinsSpike' => array(self::BELONGS_TO, 'VocabularyAvailability', 'shins_spike_id'),
			'shinsImages' => array(self::HAS_MANY, 'ShinsImages', 'shins_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'vendor_id' => 'Vendor',
			'product_name' => 'Product Name',
			'shins_type_of_avto_id' => 'Shins Type Of Avto',
			'shins_season_id' => 'Shins Season',
			'shins_profile_width' => 'Shins Profile Width',
			'shins_diametr' => 'Shins Diametr',
			'shins_profile_height' => 'Shins Profile Height',
			'shins_speed_index_id' => 'Shins Speed Index',
			'shins_load_index' => 'Shins Load Index',
			'shins_germetic_mode_id' => 'Shins Germetic Mode',
			'shins_construction_id' => 'Shins Construction',
			'shins_run_flat_technology_id' => 'Shins Run Flat Technology',
			'shins_spike_id' => 'Shins Spike',
			'description' => 'Description',
			'price' => 'Price',
			'amount' => 'Amount',
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
		$criteria->compare('vendor_id',$this->vendor_id);
		$criteria->compare('product_name',$this->product_name,true);
		$criteria->compare('shins_type_of_avto_id',$this->shins_type_of_avto_id);
		$criteria->compare('shins_season_id',$this->shins_season_id);
		$criteria->compare('shins_profile_width',$this->shins_profile_width);
		$criteria->compare('shins_diametr',$this->shins_diametr,true);
		$criteria->compare('shins_profile_height',$this->shins_profile_height);
		$criteria->compare('shins_speed_index_id',$this->shins_speed_index_id);
		$criteria->compare('shins_load_index',$this->shins_load_index,true);
		$criteria->compare('shins_germetic_mode_id',$this->shins_germetic_mode_id);
		$criteria->compare('shins_construction_id',$this->shins_construction_id);
		$criteria->compare('shins_run_flat_technology_id',$this->shins_run_flat_technology_id);
		$criteria->compare('shins_spike_id',$this->shins_spike_id);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('amount',$this->amount);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Shins the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
