<?php

/**
 * This is the model class for table "shins_vendors".
 *
 * The followings are the available columns in table 'shins_vendors':
 * @property integer $id
 * @property string $vendor_name
 * @property string $translit
 *
 * The followings are the available model relations:
 * @property Shins[] $shins
 */
class ShinsVendors extends CExtendedActiveRecord
{

    public $type = 'tires';
    public $delImg = 0;

    public function behaviors(){
        return array(
            "StatisticaBehavior" => array(
                "class" => "application.components.StatisticaBehavior",
                "tables" => "shins_vendors"
            ),
        );
    }

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'shins_vendors';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array("vendor_name, translit, title, meta_keywords, meta_description, image",  'filter', 'filter' => 'strip_tags'),
            array('description', 'filter', 'filter' => array('ModelFilters', 'htmlSecurity')),
            array("vendor_name, translit, title, meta_keywords, meta_description, image, description",  'filter', 'filter' => 'trim'),
            array("vendor_name", "required"),
            array("delImg", 'numerical'),
			array('vendor_name, translit, title', 'length', 'max'=>500),
            array('image', 'file', 'types' => 'jpg', 'allowEmpty' => true),
            array('vendor_name', 'safe', 'on'=>'search'),
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
			'shins' => array(self::HAS_MANY, 'Shins', 'vendor_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'vendor_name' => 'Производитель',
            'title' => 'Title',
            'meta_keywords' => 'meta keywords',
            'meta_description' => 'meta description',
            'description' => 'Описание',
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
	public function search(){
		$criteria=new CDbCriteria;
		$criteria->compare('vendor_name',$this->vendor_name,true);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>array(
                'defaultOrder'=>'vendor_name ASC',
            ),
            'pagination' => array(
                'pageSize' => 25,
            ),
		));
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
	 * @return ShinsVendors the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
    }
}
