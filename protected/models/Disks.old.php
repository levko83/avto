<?php

/**
 * This is the model class for table "disks".
 *
 * The followings are the available columns in table 'disks':
 * @property integer $id
 * @property integer $cat_id
 * @property integer $vendor_id
 * @property string $vendor
 * @property string $name
 * @property string $name_short
 * @property string $product_name
 * @property integer $img_50x100
 * @property integer $img_100x200
 * @property string $imgs
 * @property string $imgs_small
 * @property string $p_8
 * @property string $p_9
 * @property string $p_10
 * @property string $p_1
 * @property string $p_2
 * @property string $p_3
 * @property string $p_4
 * @property string $p_5
 * @property string $p_6
 * @property string $p_7
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
 *
 * The followings are the available model relations:
 * @property DisksVendors $vendor0
 * @property DisksType $disksType
 * @property DisksMaterial $disksMaterial
 */
class Disks extends CExtendedActiveRecord
{
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
			array('vendor_id, name, name_short, product_name, imgs, imgs_small', 'required'),
			array('cat_id, vendor_id, img_50x100, img_100x200, disks_fixture_port_count, disks_type_id, disks_material_id', 'numerical', 'integerOnly'=>true),
			array('imgs, imgs_small', 'length', 'max'=>200),
			array('disks_fixture_port_diametr, disks_boom, disks_port_position, disks_weight, disks_rim_width, disks_rim_diametr', 'length', 'max'=>11),
			array('disks_color', 'length', 'max'=>50),
			array('vendor, p_8, p_9, p_10, p_1, p_2, p_3, p_4, p_5, p_6, p_7', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, cat_id, vendor_id, vendor, name, name_short, product_name, img_50x100, img_100x200, imgs, imgs_small, p_8, p_9, p_10, p_1, p_2, p_3, p_4, p_5, p_6, p_7, disks_fixture_port_count, disks_fixture_port_diametr, disks_boom, disks_port_position, disks_weight, disks_rim_width, disks_rim_diametr, disks_type_id, disks_material_id, disks_color', 'safe', 'on'=>'search'),
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
			'vendor0' => array(self::BELONGS_TO, 'DisksVendors', 'vendor_id'),
			'disksType' => array(self::BELONGS_TO, 'DisksType', 'disks_type_id'),
			'disksMaterial' => array(self::BELONGS_TO, 'DisksMaterial', 'disks_material_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'cat_id' => 'Cat',
			'vendor_id' => 'Vendor',
			'vendor' => 'Vendor',
			'name' => 'Name',
			'name_short' => 'Name Short',
			'product_name' => 'Product Name',
			'img_50x100' => 'Img 50x100',
			'img_100x200' => 'Img 100x200',
			'imgs' => 'Imgs',
			'imgs_small' => 'Imgs Small',
			'p_8' => 'P 8',
			'p_9' => 'P 9',
			'p_10' => 'P 10',
			'p_1' => 'P 1',
			'p_2' => 'P 2',
			'p_3' => 'P 3',
			'p_4' => 'P 4',
			'p_5' => 'P 5',
			'p_6' => 'P 6',
			'p_7' => 'P 7',
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
		$criteria->compare('cat_id',$this->cat_id);
		$criteria->compare('vendor_id',$this->vendor_id);
		$criteria->compare('vendor',$this->vendor,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('name_short',$this->name_short,true);
		$criteria->compare('product_name',$this->product_name,true);
		$criteria->compare('img_50x100',$this->img_50x100);
		$criteria->compare('img_100x200',$this->img_100x200);
		$criteria->compare('imgs',$this->imgs,true);
		$criteria->compare('imgs_small',$this->imgs_small,true);
		$criteria->compare('p_8',$this->p_8,true);
		$criteria->compare('p_9',$this->p_9,true);
		$criteria->compare('p_10',$this->p_10,true);
		$criteria->compare('p_1',$this->p_1,true);
		$criteria->compare('p_2',$this->p_2,true);
		$criteria->compare('p_3',$this->p_3,true);
		$criteria->compare('p_4',$this->p_4,true);
		$criteria->compare('p_5',$this->p_5,true);
		$criteria->compare('p_6',$this->p_6,true);
		$criteria->compare('p_7',$this->p_7,true);
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
