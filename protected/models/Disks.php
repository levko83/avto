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
 * @property integer $disks_display_id
 * @property string $disks_color
 * @property string $description
 * @property double $price
 * @property double $priceMin
 * @property double $priceMax
 * @property integer $amount
 * @property integer $edited
 * @property string $mark
 *
 * The followings are the available model relations:
 * @property DisksVendors $vendor
 * @property DisksType $disksType
 * @property DisksDisplays $disksDisplay
 * @property DisksMaterial $disksMaterial
 * @property DisksImages[] $disksImages
 */
class Disks extends CExtendedActiveRecord implements IECartPosition
{

    public $priceMin;
    public $priceMax;
    public $avto_modification;
    public $disksImages;
    public $delImage;
    public $displayString;


    public function behaviors(){
        return array(
            "StatisticaBehavior" => array(
                "class" => "application.components.StatisticaBehavior",
                "tables" => "disks"
            ),
        );
    }

    protected function beforeSave()
    {
        if(parent::beforeSave() === false){
            return false;
        }
        $this->edited = time();
        return true;
    }


    protected function afterSave()
    {
        if(parent::afterSave() === false){
            return false;
        }
        SphinxManager::reindex("disksIndexDelta");
    }

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'disks';
	}

    function getId(){
        return $this->id;
    }

    function getPrice(){
        return $this->price;
    }

    function getClass(){
        return "drive";
    }

    function getTranslit(){
        return $this->translit;
    }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('vendor_id, product_name, disks_type_id, disks_material_id', 'required'),
			array('vendor_id, disks_fixture_port_count, disks_type_id, disks_material_id, disks_display_id, amount', 'numerical', 'integerOnly'=>true),
			array('disks_fixture_port_diametr, disks_boom, disks_port_position, disks_weight, disks_rim_width, disks_rim_diametr, price', 'length', 'max'=>11),
            array('disks_fixture_port_diametr, disks_boom, disks_port_position, disks_weight, disks_rim_width, disks_rim_diametr, price', 'numerical'),
            array('product_name', 'productNameValidator'),
			array('disks_color', 'length', 'max'=>50),
			array('description', 'safe'),
            array('delImage', 'safe'),
            array('disksImages', 'file', 'types'=>'jpg, gif, png',  'allowEmpty' => true, 'maxSize' => 3145728, 'maxFiles' => 5),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
            array("id", "safe", "on" => "getTable"),
			array('id, vendor_id, product_name, disks_fixture_port_count, disks_fixture_port_diametr, disks_boom, disks_port_position, disks_weight, disks_rim_width, disks_rim_diametr, disks_type_id, disks_material_id, disks_color, description, price, amount, mark, disks_display_id', 'safe', 'on'=>'search'),
            array('priceMin, priceMax, avto_modification', 'safe', "on" => "filter"),
		);
	}

    public function productNameValidator($attribute, $params){
        $pattern = "/^(.*)\s+\d+(?:[,\.]{1}\d+)?[xXхХ]{1}/";
        if(!preg_match_all($pattern, $this->product_name, $matches) or count($matches) != 2){
            $this->addError("product_name", 'Неверный формат названия диска');
        }else{
            $this->displayString = trim($matches[1][0]);
        }
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
            'disksDisplay' => array(self::BELONGS_TO, 'DisksDisplays', 'disks_display_id'),
			'disksMaterial' => array(self::BELONGS_TO, 'DisksMaterial', 'disks_material_id'),
			'images' => array(self::HAS_MANY, 'DisksImages', 'disks_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'vendor_id' => 'Производитель',
			'product_name' => 'Название',
			'disks_fixture_port_count' => 'Количество крепежных отверстий',
			'disks_fixture_port_diametr' => 'Диаметр центрального отверстия, мм',
            'disksImages' => 'Изображения',
			'disks_boom' => 'Вылет (ET),мм',
			'disks_port_position' => 'Диаметр расположения отверстий (PCD), мм',
			'disks_weight' => 'Вес, кг',
			'disks_rim_width' => 'Ширина обода, "',
			'disks_rim_diametr' => 'Диаметр обода, "',
			'disks_type_id' => 'Тип',
			'disks_material_id' => 'Материал',
			'disks_color' => 'Цвет',
			'description' => 'Описание',
			'price' => 'Цена, грн',
			'amount' => 'Остаток',
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
        $criteria->compare('disks_display_id',$this->disks_display_id);
		$criteria->compare('disks_color',$this->disks_color,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('amount',$this->amount);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function filter(){
        $criteria=new CDbCriteria;
        if($this->isParam("disks_rim_diametr")){
            $v = (double)$this->disks_rim_diametr;
            $criteria->addCondition("ABS(disks_rim_diametr - {$v}) <= 0.01");
        }
        $criteria->compare("disks_type_id", $this->disks_type_id);
        if($this->isParam("disks_rim_width")){
            $v = (double)$this->disks_rim_width;
            $criteria->addCondition("ABS(disks_rim_width - {$v}) <= 0.01");
        }
        if($this->isParam("disks_port_position")){
            $v = (double)$this->disks_port_position;
            $criteria->addCondition("ABS(disks_port_position - {$v}) <= 0.01");
        }
        if($this->isParam("disks_boom")){
            $v = (double)$this->disks_boom;
            $criteria->addCondition("ABS(disks_boom - {$v}) <= 0.01");
        }
        if($this->isParam("disks_fixture_port_diametr")){
            $v = (double)$this->disks_fixture_port_diametr;
            $criteria->addCondition("ABS(disks_fixture_port_diametr - {$v}) <= 0.01");
        }
        if($this->disks_color and is_array($this->disks_color)){
            $criteria->addInCondition("disks_color", $this->disks_color);
        }
        if($this->vendor_id and is_array($this->vendor_id)){
            $criteria->addInCondition("vendor_id", $this->vendor_id);
        }
        $criteria->addCondition("price > 0 and amount > 0");
        return new CActiveDataProvider(
            $this,
            array(
                'criteria' => $criteria,
                'pagination' => array(
                    'pageSize' => 15,
                ),
            )
        );
    }

    public function getProvider(){
        $criteria = new CDbCriteria;
        $criteria->compare("product_id", $this->id);
        $criteria->compare("product_type", "disk");
        return ParsedProducts::model()->find($criteria)->company_rel->company;
    }

    public function getRangePrice(){
        $sql = "SELECT min(price) as v1, max(price) as v2
                FROM disks
                WHERE amount > 0";
        $rec = Yii::app()->db->createCommand($sql)->queryRow();
        return (object)array(
            "min" => (int)$rec["v1"],
            "max" => (int)$rec["v2"],
        );
    }

    public function getImage(){
        $sql = "SELECT imageName FROM disks_images WHERE disks_id = {$this->id} AND typeImage = 3 LIMIT 1";
        return Yii::app()->db->createCommand($sql)->queryScalar();
    }

    public function getTable()
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

        return new CActiveDataProvider(
            $this,
            array(
                'criteria' => $criteria,
                'pagination' => array(
                    'pageSize' => 15,
                ),
            )
        );
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
