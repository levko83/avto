<?php

/**
 * This is the model class for table "pages_view".
 *
 * The followings are the available columns in table 'pages_view':
 * @property string $id
 * @property string $parent_id
 * @property integer $table_id
 * @property string $model_name
 * @property string $page_key
 * @property string $label
 * @property string $hasText
 * @property string $text
 * @property string $title
 * @property string $meta_keywords
 * @property string $meta_description
 * @property string $path
 * @property string $level
 */
class PagesView extends CExtendedActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pages_view';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('table_id', 'numerical', 'integerOnly'=>true),
			array('id, parent_id, hasText, level', 'length', 'max'=>20),
			array('model_name', 'length', 'max'=>11),
			array('page_key, label', 'length', 'max'=>56),
			array('title', 'length', 'max'=>50),
			array('path', 'length', 'max'=>24),
			array('text, meta_keywords, meta_description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, parent_id, table_id, model_name, page_key, label, hasText, text, title, meta_keywords, meta_description, path, level', 'safe', 'on'=>'search'),
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
			'parent_id' => 'Parent',
			'table_id' => 'Table',
			'model_name' => 'Model Name',
			'page_key' => 'Page Key',
			'label' => 'Label',
			'hasText' => 'Has Text',
			'text' => 'Text',
			'title' => 'Title',
			'meta_keywords' => 'Meta Keywords',
			'meta_description' => 'Meta Description',
			'path' => 'Path',
			'level' => 'Level',
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
		$criteria=new CDbCriteria;
        $criteria->order = "path ASC";
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'pagination'=>array(
                'pageSize' => 50
            )
		));
	}

    public function getPageInfoByPageKey($page_key){
        $criteria=new CDbCriteria;
        $criteria->compare("page_key", $page_key);
        return $this->find($criteria);
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PagesView the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
