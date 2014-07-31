<?php

/**
 * This is the model class for table "avto_marks".
 *
 * The followings are the available columns in table 'avto_marks':
 * @property integer $id
 * @property string $value
 *
 * The followings are the available model relations:
 * @property AvtoModels[] $avtoModels
 */
class AvtoMarks extends CExtendedActiveRecord
{

    public $delImg = 0;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'avto_marks';
	}

    public function behaviors(){
        return array(
            "StatisticaBehavior" => array(
                "class" => "application.components.StatisticaBehavior",
                "tables" => "avto_marks"
            ),
        );
    }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('value, translit, title, meta_keywords, meta_description, image', 'filter', 'filter' => 'strip_tags'),
            array('description', 'filter', 'filter' => array('ModelFilters', 'htmlSecurity')),
            array("value, translit, title, meta_keywords, meta_description, image, description",  'filter', 'filter' => 'trim'),
            array("value", "required"),
            array("delImg", 'numerical'),
            array('value, translit, title', 'length', 'max'=>500),
            array('image', 'file', 'types' => 'jpg', 'allowEmpty' => true),
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
			'avtoModels' => array(self::HAS_MANY, 'AvtoModels', 'avto_marks_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
            'image' => 'Логотип',
			'value' => 'Производитель',
            'description' => 'Описание',
            'title' => 'Title',
            'meta_keywords' => 'Meta (keywords)',
            'meta_description' => 'Meta (description)',
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
		$criteria->compare('value',$this->value,true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 25,
            ),
		));
	}

    public function getData(){
        $dependency = new CDbCacheDependency('SELECT MAX(edittime) FROM avto_marks');
        return AvtoMarks::model()->cache(1000, $dependency)->findAll(array('order'=>'value'));
    }

    public function getIconImg(){
        if(!empty($this->image)){
           list($name, $ext) = explode(".", $this->image);
           return "{$name}_75_75.{$ext}";
        }
        return null;
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AvtoMarks the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
