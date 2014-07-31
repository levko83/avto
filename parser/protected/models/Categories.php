<?php

/**
 * This is the model class for table "{{categories}}".
 *
 * The followings are the available columns in table '{{categories}}':
 * @property integer $categoryID
 * @property integer $parent
 * @property integer $products_count
 * @property string $picture
 * @property integer $products_count_admin
 * @property integer $sort_order
 * @property integer $viewed_times
 * @property integer $allow_products_comparison
 * @property integer $allow_products_search
 * @property integer $show_subcategories_products
 * @property string $slug
 * @property string $name_ru
 * @property string $description_ru
 * @property string $meta_title_ru
 * @property string $meta_description_ru
 * @property string $meta_keywords_ru
 * @property integer $vkontakte_type
 * @property string $id_1c
 */
class Categories extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Categories the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{categories}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('parent, products_count, products_count_admin, sort_order, viewed_times, allow_products_comparison, allow_products_search, show_subcategories_products, vkontakte_type', 'numerical', 'integerOnly'=>true),
			array('picture', 'length', 'max'=>30),
			array('slug, name_ru, meta_title_ru, meta_description_ru, meta_keywords_ru', 'length', 'max'=>255),
			array('id_1c', 'length', 'max'=>36),
			array('description_ru', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('categoryID, parent, products_count, picture, products_count_admin, sort_order, viewed_times, allow_products_comparison, allow_products_search, show_subcategories_products, slug, name_ru, description_ru, meta_title_ru, meta_description_ru, meta_keywords_ru, vkontakte_type, id_1c', 'safe', 'on'=>'search'),
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
			'categoryID' => 'Category',
			'parent' => 'Parent',
			'products_count' => 'Products Count',
			'picture' => 'Picture',
			'products_count_admin' => 'Products Count Admin',
			'sort_order' => 'Sort Order',
			'viewed_times' => 'Viewed Times',
			'allow_products_comparison' => 'Allow Products Comparison',
			'allow_products_search' => 'Allow Products Search',
			'show_subcategories_products' => 'Show Subcategories Products',
			'slug' => 'Slug',
			'name_ru' => 'Категория',
			'description_ru' => 'Description Ru',
			'meta_title_ru' => 'Meta Title Ru',
			'meta_description_ru' => 'Meta Description Ru',
			'meta_keywords_ru' => 'Meta Keywords Ru',
			'vkontakte_type' => 'Vkontakte Type',
			'id_1c' => 'Id 1c',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('categoryID',$this->categoryID);
		$criteria->compare('parent',$this->parent);
		$criteria->compare('products_count',$this->products_count);
		$criteria->compare('picture',$this->picture,true);
		$criteria->compare('products_count_admin',$this->products_count_admin);
		$criteria->compare('sort_order',$this->sort_order);
		$criteria->compare('viewed_times',$this->viewed_times);
		$criteria->compare('allow_products_comparison',$this->allow_products_comparison);
		$criteria->compare('allow_products_search',$this->allow_products_search);
		$criteria->compare('show_subcategories_products',$this->show_subcategories_products);
		$criteria->compare('slug',$this->slug,true);
		$criteria->compare('name_ru',$this->name_ru,true);
		$criteria->compare('description_ru',$this->description_ru,true);
		$criteria->compare('meta_title_ru',$this->meta_title_ru,true);
		$criteria->compare('meta_description_ru',$this->meta_description_ru,true);
		$criteria->compare('meta_keywords_ru',$this->meta_keywords_ru,true);
		$criteria->compare('vkontakte_type',$this->vkontakte_type);
		$criteria->compare('id_1c',$this->id_1c,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}