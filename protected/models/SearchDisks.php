<?php

/**
 * This is the model class for table "search_disks".
 *
 * The followings are the available columns in table 'search_disks':
 * @property integer $id
 * @property integer $recomended_type
 * @property integer $avto_modification_id
 * @property string $disks_rim_width
 * @property string $disks_rim_diametr
 * @property string $disks_jack
 *
 * The followings are the available model relations:
 * @property AvtoModification $avtoModification
 */
class SearchDisks extends CExtendedActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'search_disks';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('recomended_type, avto_modification_id', 'numerical', 'integerOnly'=>true),
			array('disks_rim_width, disks_rim_diametr', 'length', 'max'=>11),
			array('disks_jack', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, recomended_type, avto_modification_id, disks_rim_width, disks_rim_diametr, disks_jack', 'safe', 'on'=>'search'),
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
			'avtoModification' => array(self::BELONGS_TO, 'AvtoModification', 'avto_modification_id'),
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
			'disks_rim_width' => 'Disks Rim Width',
			'disks_rim_diametr' => 'Disks Rim Diametr',
			'disks_jack' => 'Disks Jack',
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
		$criteria->compare('disks_rim_width',$this->disks_rim_width,true);
		$criteria->compare('disks_rim_diametr',$this->disks_rim_diametr,true);
		$criteria->compare('disks_jack',$this->disks_jack,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SearchDisks the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
