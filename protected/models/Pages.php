<?php

/**
 * This is the model class for table "pages".
 *
 * The followings are the available columns in table 'pages':
 * @property integer $id
 * @property string $page_key
 * @property string $label
 * @property integer $hasText
 * @property string $text
 * @property string $title
 * @property string $meta_keywords
 * @property string $meta_description
 */
class Pages extends CExtendedActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pages';
	}

    public function behaviors(){
        return array(
            "StatisticaBehavior" => array(
                "class" => "application.components.StatisticaBehavior"
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
			//array('hasText', 'numerical', 'integerOnly'=>true),
            array('title, meta_keywords, meta_description', 'filter', 'filter' => 'strip_tags'),
            array('text', 'filter', 'filter' => array('ModelFilters', 'htmlSecurity')),
            array('text, title, meta_keywords, meta_description', 'filter', 'filter' => 'trim'),
            array('text', 'textValidator'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('label', 'safe', 'on'=>'search'),
		);
	}

    public function textValidator($attributes, $params)
    {
        if($this->hasText == 1 and empty($this->text)){
            $this->addError('text','Заполните текст страницы');
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'label' => 'Название',
			'hasText' => 'Has Text',
			'text' => 'Текст страницы',
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
		$criteria->compare('label',$this->label,true);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function findByPageKey($page_key){
        $criteria = new CDbCriteria;
        $criteria->compare("page_key", $page_key);
        return Pages::model()->find($criteria);
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pages the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
