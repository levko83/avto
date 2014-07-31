<?php

/**
 * This is the model class for table "news".
 *
 * The followings are the available columns in table 'news':
 * @property integer $id
 * @property string $title
 * @property string $translit
 * @property string $short
 * @property string $body
 * @property string $search_keywords
 * @property string $search_description
 * @property integer $published
 * @property string $created
 * @property string $edited
 */
class News extends CExtendedActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'news';
	}

    public function behaviors(){
        return array(
            "StatisticaBehavior" => array(
                "class" => "application.components.StatisticaBehavior",
                "tables" => "news"
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
			array('title, short, body', 'required'),
            array('short, body', 'filter', 'filter' => array('ModelFilters', 'htmlSecurity')),
            array('title, search_keywords, search_description', 'filter', 'filter' => 'strip_tags'),
			array('published', 'numerical', 'integerOnly'=>true),
			array('title, translit', 'length', 'max'=>200),
			array('created, edited', 'length', 'max'=>20),
			array('search_keywords, search_description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, short, body, search_keywords, search_description, published, created, edited', 'safe', 'on'=>'search'),
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
			'title' => 'Заголовок',
			'short' => 'Короткий текст новости',
			'body' => 'Полный текст новости',
			'search_keywords' => 'Ключевые слова для поисковика (keywords)',
			'search_description' => 'Описание для поисковика (description)',
			'published' => 'Опубликовано',
			'created' => 'Создано',
			'edited' => 'Изменено',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('short',$this->short,true);
		$criteria->compare('body',$this->body,true);
		$criteria->compare('search_keywords',$this->search_keywords,true);
		$criteria->compare('search_description',$this->search_description,true);
		$criteria->compare('published',$this->published);
        if($created = CDateTimeParser::parse($this->created,'dd/MM/yyyy')){
            $criteria->addCondition("FROM_UNIXTIME({$created}, '%d-%m-%Y') = FROM_UNIXTIME(created, '%d-%m-%Y')");
        }
        if($edited = CDateTimeParser::parse($this->edited,'dd/MM/yyyy')){
            $criteria->addCondition("FROM_UNIXTIME({$edited}, '%d-%m-%Y') = FROM_UNIXTIME(edited, '%d-%m-%Y')");
        }
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return News the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
