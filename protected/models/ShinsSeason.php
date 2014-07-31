<?php

/**
 * This is the model class for table "shins_season".
 *
 * The followings are the available columns in table 'shins_season':
 * @property integer $id
 * @property string $value
 * @property string $translit
 *
 * The followings are the available model relations:
 * @property Shins[] $shins
 */
class ShinsSeason extends CExtendedActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'shins_season';
	}

    public function behaviors(){
        return array(
            "StatisticaBehavior" => array(
                "class" => "application.components.StatisticaBehavior",
                "tables" => "pages"
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
			array('value, translit', 'length', 'max'=>50),
			// The following rule is used by search().
            array("title, meta_keywords, meta_description",  'filter', 'filter' => 'strip_tags'),
            array('text', 'filter', 'filter' => array('ModelFilters', 'htmlSecurity')),
            array("title, meta_keywords, meta_description, text",  'filter', 'filter' => 'trim'),
			// @todo Please remove those attributes that should not be searched.
			array('id, value, translit', 'safe', 'on'=>'search'),
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
			'shins' => array(self::HAS_MANY, 'Shins', 'shins_season_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'value' => 'Value',
			'translit' => 'Translit',
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
		$criteria->compare('translit',$this->translit,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ShinsSeason the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function getListForFilter(){
        $list = array(1 => "- все сезоны -");
        foreach(self::model()->findAll('id > 1') as $season){
            $list[$season->id] = $season->value;
        }
        return $list;
    }
}
