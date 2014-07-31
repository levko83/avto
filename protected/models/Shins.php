<?php

/**
 * This is the model class for table "shins".
 *
 * The followings are the available columns in table 'shins':
 * @property integer $id
 * @property integer $vendor_id
 * @property integer $shins_display_id
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
 * @property double $price
 * @property integer $amount
 * @property string $mark
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
class Shins extends CExtendedActiveRecord implements IECartPosition
{

    public $priceMin;
    public $priceMax;
    public $avto_modification;
    public $shinsImages;
    public $delImage;
    public $displayString;



    public function behaviors(){
        return array(
            "StatisticaBehavior" => array(
                "class" => "application.components.StatisticaBehavior",
                "tables" => "shins"
            ),
        );
    }

    /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'shins';
	}

    function getId(){
        return $this->id;
    }

    function getPrice(){
        return $this->price;
    }

    function getClass(){
        return "tire";
    }
	
	function getData(){
	return array();
	}
	
	function getPagination(){
	return 1;
	}
	function getItemCount(){
	return 10;
	}
	function getTotalItemCount(){
	return 1;
	}
	function getSort(){
        return false;
    }
    function getPageCount(){
        return 1;
    }
	
	
	

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('vendor_id, product_name, shins_type_of_avto_id, shins_season_id, shins_speed_index_id, shins_germetic_mode_id, shins_construction_id, shins_run_flat_technology_id, shins_spike_id', 'required'),
			array('vendor_id, shins_type_of_avto_id, shins_season_id, shins_profile_width, shins_profile_height, shins_speed_index_id, shins_germetic_mode_id, shins_construction_id, shins_run_flat_technology_id, shins_spike_id, amount', 'numerical', 'integerOnly'=>true),
            array('product_name', 'productNameValidator'),
			array('shins_diametr, price', 'length', 'max'=>11),
			array('shins_load_index', 'length', 'max'=>35),
            array('delImage', 'safe'),
			array('description', 'safe'),
            array('shinsImages', 'file', 'types'=>'jpg, gif, png',  'allowEmpty' => true, 'maxSize' => 3145728, 'maxFiles' => 3),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, vendor_id, product_name, shins_type_of_avto_id, shins_season_id, shins_profile_width, shins_diametr, shins_profile_height, shins_speed_index_id, shins_load_index, shins_germetic_mode_id, shins_construction_id, shins_run_flat_technology_id, shins_spike_id, description, shins_display_id, price, amount, mark', 'safe', 'on'=>'search'),
            array("id", "safe", "on" => "getTable"),
            array('priceMin, priceMax, avto_modification', 'safe', "on" => "filter"),
		);
	}

    public function productNameValidator($attribute, $params){
        $pattern = "/^(.+)\s+\d+(?:\/\d+)?.+R\d{1,}/";
        if(!preg_match_all($pattern, $this->product_name, $matches) or count($matches) != 2){
            $this->addError("product_name", 'Неверный формат названия шины');
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
			'vendor' => array(self::BELONGS_TO, 'ShinsVendors', 'vendor_id'),
            'shinsDisplay' => array(self::BELONGS_TO, 'ShinsDisplays', 'shins_display_id'),
			'shinsTypeOfAvto' => array(self::BELONGS_TO, 'ShinsTypeOfAvto', 'shins_type_of_avto_id'),
			'shinsSeason' => array(self::BELONGS_TO, 'ShinsSeason', 'shins_season_id'),
			'shinsSpeedIndex' => array(self::BELONGS_TO, 'ShinsSpeedIndex', 'shins_speed_index_id'),
			'shinsGermeticMode' => array(self::BELONGS_TO, 'ShinsGermeticMode', 'shins_germetic_mode_id'),
			'shinsConstruction' => array(self::BELONGS_TO, 'ShinsConstruction', 'shins_construction_id'),
			'shinsRunFlatTechnology' => array(self::BELONGS_TO, 'VocabularyAvailability', 'shins_run_flat_technology_id'),
			'shinsSpike' => array(self::BELONGS_TO, 'VocabularyAvailability', 'shins_spike_id'),
			'images' => array(self::HAS_MANY, 'ShinsImages', 'shins_id'),
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
            'shins_type_of_avto_id' => 'Тип автомобиля',
            'shins_season_id' => 'Сезонность',
            'shins_profile_width' => 'Ширина профиля, мм',
            'shins_diametr' => 'Диаметр, "',
            'disksImages' => 'Изображения',
            'shins_profile_height' => 'Высота профиля, %',
            'shins_speed_index_id' => 'Индекс скорости',
            'shins_load_index' => 'Индекс нагрузки',
            'shins_germetic_mode_id' => 'Способ герметизации',
            'shins_construction_id' => 'Конструкция',
            'shins_run_flat_technology_id' => 'Технология RunFlat',
            'shins_spike_id' => 'Шипы',
            'description' => 'Доп. информация',
            'price' => 'Цена, грн.',
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

    public function getTable()
    {
        $criteria=new CDbCriteria;
        $criteria->compare('t.id',$this->id);
        $criteria->compare('t.vendor_id',$this->vendor_id);
        $criteria->compare('t.product_name',$this->product_name,true);
        $criteria->compare('t.shins_type_of_avto_id',$this->shins_type_of_avto_id);
        $criteria->compare('t.shins_season_id',$this->shins_season_id);
        $criteria->compare('t.shins_profile_width',$this->shins_profile_width);
        $criteria->compare('t.shins_diametr',$this->shins_diametr,true);
        $criteria->compare('t.shins_profile_height',$this->shins_profile_height);
        $criteria->compare('t.shins_speed_index_id',$this->shins_speed_index_id);
        $criteria->compare('t.shins_load_index',$this->shins_load_index,true);
        $criteria->compare('t.shins_germetic_mode_id',$this->shins_germetic_mode_id);
        $criteria->compare('t.shins_construction_id',$this->shins_construction_id);
        $criteria->compare('t.shins_run_flat_technology_id',$this->shins_run_flat_technology_id);
        $criteria->compare('t.shins_spike_id',$this->shins_spike_id);
        $criteria->compare('t.description',$this->description,true);
        $criteria->with = array(
            'images' => array(
                'select' => 'imageName',
                'condition' => 'images.typeImage = 3',
                'limit' => 1
            ),
        );
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

    public function filter(){
        $criteria = new CDbCriteria;
        if($this->isParam("priceMin") and $this->isParam("priceMax")){
            $min = (double)$this->priceMin;
            $max = (double)$this->priceMax;
            $criteria->addCondition("price >= {$min} and price <= {$max}");
        }
        if($this->isParam("shins_profile_width")){
            $v = (double)$this->shins_profile_width;
            $criteria->addCondition("ABS(shins_profile_width - {$v}) <= 0.01");
        }
        $criteria->compare("shins_load_index", $this->shins_load_index);
        if($this->isParam("shins_profile_height")){
            $v = (double)$this->shins_profile_height;
            $criteria->addCondition("ABS(shins_profile_height - {$v}) <= 0.01");
        }
        if($this->isParam("shins_diametr")){
            $v = (double)$this->shins_diametr;
            $criteria->addCondition("ABS(shins_diametr - {$v}) <= 0.01");
        }
        if($this->shins_season_id and is_array($this->shins_season_id)){
            $criteria->addInCondition("shins_season_id", $this->shins_season_id);
        }
        $criteria->compare("shins_type_of_avto_id", $this->shins_type_of_avto_id);
        $criteria->compare("shins_run_flat_technology_id", $this->shins_run_flat_technology_id);
        $criteria->compare("shins_spike_id", $this->shins_spike_id);
        if($this->vendor_id and is_array($this->vendor_id)){
            $criteria->addInCondition("vendor_id", $this->vendor_id);
        }
        $criteria->addCondition("price > 0 and amount > 0");
        return $this;
        /*
        return new CActiveDataProvider(
            $this,
            array(
                'criteria' => $criteria,
                'pagination' => array(
                    'pageSize' => 15,
                ),
            )
        );
        */
    }

    public function subFilter(){
        $criteria = new CDbCriteria;
        $criteria->alias = "sub";
        $criteria->select = "sub.shins_display_id";
        if($this->isParam("priceMin") and $this->isParam("priceMax")){
            $min = (double)$this->priceMin;
            $max = (double)$this->priceMax;
            $criteria->addCondition("sub.price >= {$min} and sub.price <= {$max}");
        }
        if($this->isParam("shins_profile_width")){
            $v = (double)$this->shins_profile_width;
            $criteria->addCondition("ABS(sub.shins_profile_width - {$v}) <= 0.01");
        }
        $criteria->compare("sub.shins_load_index", $this->shins_load_index);
        if($this->isParam("shins_profile_height")){
            $v = (double)$this->shins_profile_height;
            $criteria->addCondition("ABS(sub.shins_profile_height - {$v}) <= 0.01");
        }
        if($this->isParam("shins_diametr")){
            $v = (double)$this->shins_diametr;
            $criteria->addCondition("ABS(sub.shins_diametr - {$v}) <= 0.01");
        }
        if($this->shins_season_id and is_array($this->shins_season_id)){
            $criteria->addInCondition("sub.shins_season_id", $this->shins_season_id);
        }
        $criteria->compare("sub.shins_type_of_avto_id", $this->shins_type_of_avto_id);
        $criteria->compare("sub.shins_run_flat_technology_id", $this->shins_run_flat_technology_id);
        $criteria->compare("sub.shins_spike_id", $this->shins_spike_id);
        if($this->vendor_id and is_array($this->vendor_id)){
            $criteria->addInCondition("sub.vendor_id", $this->vendor_id);
        }
        $criteria->addCondition("sub.price > 0 and sub.amount > 0");
        return (object) array(
                            "params" => $criteria->params,
                            "sql" => $this->getCommandBuilder()->createFindCommand($this->getTableSchema(),$criteria)->getText(),
                        );
    }

    public function subSphinxFilter(){
        $conn = Yii::app()->sphinx;
        $comm = $conn->createCommand()
                    ->select("shins_display_id")
                    ->from("shinsIndex");
        if($this->isParam("priceMin") and $this->isParam("priceMax")){
            $min = (int)$this->priceMin;
            $max = (int)$this->priceMax;
            $comm->andWhere("price >= {$min} and price <= {$max}");
        }
        if($this->isParam("shins_profile_width")){
            $v = (double)$this->shins_profile_width;
            $comm->andWhere("ABS(shins_profile_width - {$v}) <= 0.01");
        }
        if($this->isParam("shins_load_index")){
            $comm->andWhere("shins_load_index = '$this->shins_load_index'");
        }
        if($this->isParam("shins_profile_height")){
            $v = (double)$this->shins_profile_height;
            $comm->andWhere("ABS(shins_profile_height - {$v}) <= 0.01");
        }
        if($this->isParam("shins_diametr")){
            $v = (double)$this->shins_diametr;
            $comm->andWhere("ABS(shins_diametr - {$v}) <= 0.01");
        }
        if($this->shins_season_id and is_array($this->shins_season_id)){
            $str = join(", ", array_map(function($v){ return (int)$v; }, $this->shins_season_id));
            $comm->andWhere("shins_season_id IN [{$str}]");
        }
        if($this->isParam("shins_type_of_avto_id")){
            $this->shins_type_of_avto_id = (int)$this->shins_type_of_avto_id;
            $comm->andWhere("shins_type_of_avto_id = {$this->shins_type_of_avto_id}");
        }
        if($this->isParam("shins_type_of_avto_id")){
            $this->shins_run_flat_technology_id = (int)$this->shins_run_flat_technology_id;
            $comm->andWhere("shins_run_flat_technology_id = {$this->shins_run_flat_technology_id}");
        }
        if($this->isParam("shins_spike_id")){
            $this->shins_spike_id = (int)$this->shins_spike_id;
            $comm->andWhere("shins_spike_id = {$this->shins_spike_id}");
        }
        if($this->vendor_id and is_array($this->vendor_id)){
            $str = join(", ", array_map(function($v){ return (int)$v; }, $this->vendor_id));
            $comm->andWhere("vendor_id IN [{$str}]");
        }
        $sql = $comm->getText();
        return $sql;
    }

    public function getProvider(){
        $criteria = new CDbCriteria;
        $criteria->compare("product_id", $this->id);
        $criteria->compare("product_type", "shina");
        return ParsedProducts::model()->find($criteria)->company_rel->company;
    }

    public function getRangePrice(){
        $sql = "SELECT MIN(price) AS min_price, MAX(price) AS max_price
                FROM shinsIndex
                WHERE amount > 0";
        $rec = Yii::app()->sphinx->createCommand($sql)->queryRow();
        return (object)array(
                          "min" => (int)$rec["min_price"],
                          "max" => (int)$rec["max_price"],
                       );
    }

    public function getImage(){
        $sql = "SELECT imageName FROM shins_images WHERE shins_id = {$this->id} AND typeImage = 3 LIMIT 1";
        return Yii::app()->db->createCommand($sql)->queryScalar();
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
