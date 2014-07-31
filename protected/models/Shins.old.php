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
 *
 * The followings are the available model relations:
 * @property ShinsConstruction $shinsConstruction
 * @property ShinsGermeticMode $shinsGermeticMode
 * @property VocabularyAvailability $shinsRunFlatTechnology
 * @property ShinsSeason $shinsSeason
 * @property ShinsSpeedIndex $shinsSpeedIndex
 * @property VocabularyAvailability $shinsSpike
 * @property ShinsTypeOfAvto $shinsTypeOfAvto
 * @property ShinsVendors $vendor0
 */
class Shins extends CExtendedActiveRecord
{
    
       //public $images;
    
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
			array('vendor_id, shins_type_of_avto_id, shins_season_id, shins_profile_width, shins_profile_height, shins_speed_index_id, shins_germetic_mode_id, shins_construction_id, shins_run_flat_technology_id, shins_spike_id', 'numerical', 'integerOnly'=>true),
			array('shins_diametr', 'length', 'max'=>11),
			array('shins_load_index', 'length', 'max'=>35),
			array('description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, vendor_id, product_name, shins_type_of_avto_id, shins_season_id, shins_profile_width, shins_diametr, shins_profile_height, shins_speed_index_id, shins_load_index, shins_germetic_mode_id, shins_construction_id, shins_run_flat_technology_id, shins_spike_id, description', 'safe', 'on'=>'search'),
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
			'shinsConstruction' => array(self::BELONGS_TO, 'ShinsConstruction', 'shins_construction_id'),
			'shinsGermeticMode' => array(self::BELONGS_TO, 'ShinsGermeticMode', 'shins_germetic_mode_id'),
			'shinsRunFlatTechnology' => array(self::BELONGS_TO, 'VocabularyAvailability', 'shins_run_flat_technology_id'),
			'shinsSeason' => array(self::BELONGS_TO, 'ShinsSeason', 'shins_season_id'),
			'shinsSpeedIndex' => array(self::BELONGS_TO, 'ShinsSpeedIndex', 'shins_speed_index_id'),
			'shinsSpike' => array(self::BELONGS_TO, 'VocabularyAvailability', 'shins_spike_id'),
			'shinsTypeOfAvto' => array(self::BELONGS_TO, 'ShinsTypeOfAvto', 'shins_type_of_avto_id'),
			'vendor0' => array(self::BELONGS_TO, 'ShinsVendors', 'vendor_id'),
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
			'shins_profile_height' => 'Высота профиля, %',
			'shins_speed_index_id' => 'Индекс скорости',
			'shins_load_index' => 'Индекс нагрузки',
			'shins_germetic_mode_id' => 'Способ герметизации',
			'shins_construction_id' => 'Конструкция',
			'shins_run_flat_technology_id' => 'Технология RunFlat',
			'shins_spike_id' => 'Шипы',
			'description' => 'Доп. информация',
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
                'condition' => 'images.typeImage = 1',
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
        
    public function getShins($season = 1){
        $criteria = new CDbCriteria;
        if(in_array($season, array(2, 3, 4))){
            $criteria->compare('shins_season_id', $season);
        }
        return new CActiveDataProvider(
                        $this,
                        array(
                            'criteria' => $criteria,
                            'pagination' => array(
                                'pageSize' => 10,
                            ),
                   ));
    }

    public function getShinsByAvto($avto_modification_id, $recomended_type, $limit = -1){
        $search_shins = SearchShins::model()->findAll(
            "avto_modification_id = :avto_modification_id AND recomended_type = :recomended_type",
            array(
                ":avto_modification_id" => (int)$avto_modification_id,
                ":recomended_type" => $recomended_type
            )
        );
        $criteria = new CDbCriteria;
        $cnt = 0;
        foreach($search_shins as $search_shin){
            $tmp = array(
                "(abs(t.shins_profile_width - {$search_shin->shins_profile_width}) <= 0.001)",
                "(abs(t.shins_profile_height - {$search_shin->shins_profile_height}) <= 0.001)",
                "(abs(t.shins_diametr - {$search_shin->shins_diametr}) <= 0.001)"
            );
            $criteria->addCondition(implode(" AND ", $tmp), "OR");
            $cnt++;
        }
        $result = new stdClass;
        $result->count = $cnt > 0 ? $this::model()->count($criteria): 0;
        if($limit > 0){
            $criteria->limit = $limit;
        }
        $result->dataProvider = $cnt > 0
                                ?
                                new CActiveDataProvider(
                                    $this,
                                    array(
                                        'criteria' => $criteria,
                                        'pagination' => false
                                    )
                                )
                                :
                                NULL;
        return $result;
    }

    public function getImages(){
        $arr = array();
        $imgs = trim($this->imgs);
        if(trim($imgs) == "")
            return $arr;
        foreach(explode("|", $imgs) as $img){
           $arr[] = $img;
        }
        return $arr;
    }

    public function getImagesPath(){
        $s = DIRECTORY_SEPARATOR;
        return Yii::getPathOfAlias("webroot.images.products.shins")."{$s}/{$this->vendor0->translit}{$s}{$this->shinsSeason->translit}";
    }

    public function getImagesUrl(){
        return Yii::app()->baseUrl."/{$this->vendor0->translit}/{$this->shinsSeason->translit}";
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
