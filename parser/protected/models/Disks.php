<?php

/**
 * This is the model class for table "disks".
 *
 * The followings are the available columns in table 'disks':
 * @property integer $id
 * @property integer $vendor_id
 * @property string $product_name
 * @property integer $disks_fixture_port_count
 * @property string $disks_fixture_port_diametr
 * @property string $disks_boom
 * @property string $disks_port_position
 * @property string $disks_weight
 * @property string $disks_rim_width
 * @property string $disks_rim_diametr
 * @property integer $disks_type_id
 * @property integer $disks_material_id
 * @property string $disks_color
 * @property string $description
 * @property double $price
 * @property integer $amount
 *
 * The followings are the available model relations:
 * @property DisksVendors $vendor
 * @property DisksType $disksType
 * @property DisksMaterial $disksMaterial
 * @property DisksImages[] $disksImages
 */
class Disks extends CActiveRecord
{

    public function getDbConnection(){
        return Yii::app()->db1;
    }

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'disks';
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
			array('vendor_id, disks_fixture_port_count, disks_type_id, disks_material_id, amount', 'numerical', 'integerOnly'=>true),
			array('price', 'numerical'),
			array('disks_fixture_port_diametr, disks_boom, disks_port_position, disks_weight, disks_rim_width, disks_rim_diametr', 'length', 'max'=>11),
			array('disks_color', 'length', 'max'=>50),
			array('description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, vendor_id, product_name, disks_fixture_port_count, disks_fixture_port_diametr, disks_boom, disks_port_position, disks_weight, disks_rim_width, disks_rim_diametr, disks_type_id, disks_material_id, disks_color, description, price, amount', 'safe', 'on'=>'search'),
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
			'vendor' => array(self::BELONGS_TO, 'DisksVendors', 'vendor_id'),
			'disksType' => array(self::BELONGS_TO, 'DisksType', 'disks_type_id'),
			'disksMaterial' => array(self::BELONGS_TO, 'DisksMaterial', 'disks_material_id'),
			'disksImages' => array(self::HAS_MANY, 'DisksImages', 'disks_id'),
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
			'disks_fixture_port_count' => 'Disks Fixture Port Count',
			'disks_fixture_port_diametr' => 'Disks Fixture Port Diametr',
			'disks_boom' => 'Disks Boom',
			'disks_port_position' => 'Disks Port Position',
			'disks_weight' => 'Disks Weight',
			'disks_rim_width' => 'Disks Rim Width',
			'disks_rim_diametr' => 'Disks Rim Diametr',
			'disks_type_id' => 'Disks Type',
			'disks_material_id' => 'Disks Material',
			'disks_color' => 'Disks Color',
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
		$criteria->compare('disks_fixture_port_count',$this->disks_fixture_port_count);
		$criteria->compare('disks_fixture_port_diametr',$this->disks_fixture_port_diametr,true);
		$criteria->compare('disks_boom',$this->disks_boom,true);
		$criteria->compare('disks_port_position',$this->disks_port_position,true);
		$criteria->compare('disks_weight',$this->disks_weight,true);
		$criteria->compare('disks_rim_width',$this->disks_rim_width,true);
		$criteria->compare('disks_rim_diametr',$this->disks_rim_diametr,true);
		$criteria->compare('disks_type_id',$this->disks_type_id);
		$criteria->compare('disks_material_id',$this->disks_material_id);
		$criteria->compare('disks_color',$this->disks_color,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('amount',$this->amount);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Disks the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
