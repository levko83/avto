<?php

/**
 * This is the model class for table "search_shins".
 *
 * The followings are the available columns in table 'search_shins':
 * @property integer $id
 * @property integer $recomended_type
 * @property integer $avto_modification_id
 * @property integer $shins_profile_width
 * @property integer $shins_profile_height
 * @property double $shins_diametr
 */
class SearchShins extends CExtendedActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'search_shins';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('recomended_type, avto_modification_id, shins_profile_width, shins_profile_height', 'numerical', 'integerOnly'=>true),
			array('shins_diametr', 'numerical'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, recomended_type, avto_modification_id, shins_profile_width, shins_profile_height, shins_diametr', 'safe', 'on'=>'search'),
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
			'recomended_type' => 'Recomended Type',
			'avto_modification_id' => 'Avto Modification',
			'shins_profile_width' => 'Shins Profile Width',
			'shins_profile_height' => 'Shins Profile Height',
			'shins_diametr' => 'Shins Diametr',
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
		$criteria->compare('recomended_type',$this->recomended_type);
		$criteria->compare('avto_modification_id',$this->avto_modification_id);
		$criteria->compare('shins_profile_width',$this->shins_profile_width);
		$criteria->compare('shins_profile_height',$this->shins_profile_height);
		$criteria->compare('shins_diametr',$this->shins_diametr);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SearchShins the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
