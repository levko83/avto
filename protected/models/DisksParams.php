<?php

/**
 * This is the model class for table "disks_params".
 *
 * The followings are the available columns in table 'disks_params':
 * @property integer $id
 * @property string $param_name
 * @property string $param_text
 * @property string $filter_widget
 * @property string $ref
 */
class DisksParams extends CExtendedActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'disks_params';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('param_text, ref', 'required'),
			array('id', 'numerical', 'integerOnly'=>true),
			array('param_name', 'length', 'max'=>50),
			array('param_text', 'length', 'max'=>300),
			array('filter_widget', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, param_name, param_text, filter_widget, ref', 'safe', 'on'=>'search'),
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
			'param_name' => 'Param Name',
			'param_text' => 'Param Text',
			'filter_widget' => 'Filter Widget',
			'ref' => 'Ref',
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
		$criteria->compare('param_name',$this->param_name,true);
		$criteria->compare('param_text',$this->param_text,true);
		$criteria->compare('filter_widget',$this->filter_widget,true);
		$criteria->compare('ref',$this->ref,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DisksParams the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
