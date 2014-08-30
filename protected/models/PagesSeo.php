<?php

/**
 * This is the model class for table "pages_seo".
 *
 * The followings are the available columns in table 'pages_seo':
 * @property integer $id
 * @property string $page_key
 * @property integer $order_no
 * @property string $label
 * @property integer $hasText
 * @property string $text
 * @property integer $hasHeader
 * @property string $header
 * @property string $title
 * @property string $meta_keywords
 * @property string $meta_description
 * @property integer $hasTemplate
 * @property string $template_keywords
 */
class PagesSeo extends CExtendedActiveRecord{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pages_seo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
            array('title, header, meta_keywords, meta_description', 'filter', 'filter' => 'strip_tags'),
            array('title, header, meta_keywords, meta_description', 'filter', 'filter' => 'trim'),
            array('text', 'filter', 'filter' => array('ModelFilters', 'htmlSecurity')),
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
			'page_key' => 'Page Key',
			'order_no' => 'Order No',
			'label' => 'Название страницы',
			'hasText' => 'Has Text',
			'hasHeader' => 'Has Header',
            'header' => 'Заголовок',
			'text' => 'Текст',
			'title' => 'Title',
			'meta_keywords' => 'Meta Keywords',
			'meta_description' => 'Meta Description',
			'hasTemplate' => 'Has Template',
			'template_keywords' => 'Template Keywords',
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
        $criteria->order = "order_no ASC";
		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
            'pagination'=> array(
                'pageSize' => 100
            )
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PagesSeo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function getTemplateKeywords($page_key){
        $criteria = new CDbCriteria();
        $criteria->select = "template_keywords";
        $criteria->compare("page_key", $page_key);
        $criteria->compare("hasTemplate", 1);
        $model = PagesSeo::model()->find($criteria);
        if($model){
            return unserialize($model->template_keywords);
        }else{
            return array();
        }

    }

}
