<?php

/**
 * This is the model class for table "avto_models".
 *
 * The followings are the available columns in table 'avto_models':
 * @property integer $id
 * @property integer $avto_marks_id
 * @property string $value
 *
 * The followings are the available model relations:
 * @property AvtoMarks $avtoMarks
 * @property AvtoModification[] $avtoModifications
 */
class AvtoModels extends CExtendedActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'avto_models';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('avto_marks_id', 'numerical', 'integerOnly'=>true),
			array('value', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, avto_marks_id, value', 'safe', 'on'=>'search'),
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
			'avtoMarks' => array(self::BELONGS_TO, 'AvtoMarks', 'avto_marks_id'),
			'avtoModifications' => array(self::HAS_MANY, 'AvtoModification', 'avto_models_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'avto_marks_id' => 'Avto Marks',
			'value' => 'Value',
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
		$criteria->compare('avto_marks_id',$this->avto_marks_id);
		$criteria->compare('value',$this->value,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    /**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AvtoModels the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
