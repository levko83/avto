<?php

/**
 * This is the model class for table "avto_modification".
 *
 * The followings are the available columns in table 'avto_modification':
 * @property integer $id
 * @property integer $avto_models_id
 * @property integer $year
 * @property string $engine
 *
 * The followings are the available model relations:
 * @property AvtoModels $avtoModels
 * @property SearchDisks[] $searchDisks
 * @property SearchShins[] $searchShins
 */
class AvtoModification extends CExtendedActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'avto_modification';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('avto_models_id, year', 'numerical', 'integerOnly'=>true),
			array('engine', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, avto_models_id, year, engine', 'safe', 'on'=>'search'),
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
			'avtoModels' => array(self::BELONGS_TO, 'AvtoModels', 'avto_models_id'),
			'searchDisks' => array(self::HAS_MANY, 'SearchDisks', 'avto_modification_id'),
			'searchShins' => array(self::HAS_MANY, 'SearchShins', 'avto_modification_id'),
		);
	}

    public function fullAvto($avto_modification_id){
        $avto_modification = $this->findByPk((int)$avto_modification_id);
        if($avto_modification){
           return "{$avto_modification->avtoModels->avtoMarks->value} {$avto_modification->avtoModels->value} {$avto_modification->year}-{$avto_modification->engine}";
        }else
            return NULL;
    }

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'avto_models_id' => 'Avto Models',
			'year' => 'Year',
			'engine' => 'Engine',
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
		$criteria->compare('avto_models_id',$this->avto_models_id);
		$criteria->compare('year',$this->year);
		$criteria->compare('engine',$this->engine,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AvtoModification the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function getFullAvtoName($avto_modification_id){
        $modification = $this::model()->findByPk($avto_modification_id);
        if($modification){
            $model = $modification->avtoModels->value;
            $mark = $modification->avtoModels->avtoMarks->value;
            return "{$mark} {$model} {$modification->year}-{$modification->engine}";
        }else{
            return NULL;
        }
    }
}
