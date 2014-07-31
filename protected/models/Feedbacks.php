<?php

/**
 * This is the model class for table "feedbacks".
 *
 * The followings are the available columns in table 'feedbacks':
 * @property integer $id
 * @property integer $pid
 * @property integer $product_type
 * @property integer $product_id
 * @property string $user_name
 * @property string $feedback_text
 * @property string $created
 * @property integer $show
 * @property double $rating
 */
class Feedbacks extends CExtendedActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'feedbacks';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('product_type, product_id, show', 'numerical', 'integerOnly'=>true),
            array('user_name, feedback_text', 'filter', 'filter' => array('ModelFilters', 'htmlSecurity')),
            array('user_name, feedback_text', 'filter', 'filter' => 'strip_tags'),
			array('rating', 'numerical'),
			array('user_name', 'length', 'max'=>50),
			array('created', 'length', 'max'=>20),
            array('user_name, feedback_text, created', 'required'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, product_type, product_id, user_name, feedback_text, created, show, rating', 'safe', 'on'=>'search'),
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
			'product_type' => 'Product Type',
			'product_id' => 'Product',
			'user_name' => 'Ваше имя',
			'feedback_text' => 'Текст отзыва',
			'created' => 'Created',
			'show' => 'Show',
			'rating' => 'Rating',
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
		$criteria->compare('product_type',$this->product_type);
		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('user_name',$this->user_name,true);
		$criteria->compare('feedback_text',$this->feedback_text,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('show',$this->show);
		$criteria->compare('rating',$this->rating);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Feedbacks the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
