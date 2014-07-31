<?php

/**
 * This is the model class for table "{{products}}".
 *
 * The followings are the available columns in table '{{products}}':
 * @property integer $productID
 * @property integer $categoryID
 * @property double $customers_rating
 * @property double $Price
 * @property integer $in_stock
 * @property integer $customer_votes
 * @property integer $items_sold
 * @property integer $enabled
 * @property double $list_price
 * @property string $product_code
 * @property integer $sort_order
 * @property integer $default_picture
 * @property string $date_added
 * @property string $date_modified
 * @property integer $viewed_times
 * @property string $add2cart_counter
 * @property string $eproduct_filename
 * @property integer $eproduct_available_days
 * @property integer $eproduct_download_times
 * @property double $weight
 * @property integer $free_shipping
 * @property integer $min_order_amount
 * @property double $shipping_freight
 * @property integer $classID
 * @property integer $ordering_available
 * @property string $slug
 * @property string $name_ru
 * @property string $brief_description_ru
 * @property string $description_ru
 * @property string $meta_title_ru
 * @property string $meta_description_ru
 * @property string $meta_keywords_ru
 * @property integer $vkontakte_update_timestamp
 * @property string $id_1c
 * @property string $diller_name
 */
class Products extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Products the static model class
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
		return '{{products}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('categoryID, in_stock, customer_votes, items_sold, enabled, sort_order, default_picture, viewed_times, eproduct_available_days, eproduct_download_times, free_shipping, min_order_amount, classID, ordering_available, vkontakte_update_timestamp', 'numerical', 'integerOnly'=>true),
			array('customers_rating, Price, list_price, weight, shipping_freight', 'numerical'),
			array('product_code', 'length', 'max'=>25),
			array('add2cart_counter', 'length', 'max'=>10),
			array('eproduct_filename, slug, name_ru, meta_title_ru, meta_description_ru, meta_keywords_ru', 'length', 'max'=>255),
			array('id_1c', 'length', 'max'=>74),
            array('diller_name', 'length', 'max'=>100),
			array('date_added, date_modified, brief_description_ru, description_ru', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('productID, categoryID, customers_rating, Price, in_stock, customer_votes, items_sold, enabled, list_price, product_code, sort_order, default_picture, date_added, date_modified, viewed_times, add2cart_counter, eproduct_filename, eproduct_available_days, eproduct_download_times, weight, free_shipping, min_order_amount, shipping_freight, classID, ordering_available, slug, name_ru, brief_description_ru, description_ru, meta_title_ru, meta_description_ru, meta_keywords_ru, vkontakte_update_timestamp, id_1c,diller_name', 'safe', 'on'=>'search'),
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
            'category_rel' => array(self::BELONGS_TO, 'Categories', 'categoryID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'productID' => 'Product',
			'categoryID' => 'Категория',
			'customers_rating' => 'Customers Rating',
			'Price' => 'Price',
			'in_stock' => 'In Stock',
			'customer_votes' => 'Customer Votes',
			'items_sold' => 'Items Sold',
			'enabled' => 'Enabled',
			'list_price' => 'List Price',
			'product_code' => 'Product Code',
			'sort_order' => 'Sort Order',
			'default_picture' => 'Default Picture',
			'date_added' => 'Date Added',
			'date_modified' => 'Date Modified',
			'viewed_times' => 'Viewed Times',
			'add2cart_counter' => 'Add2cart Counter',
			'eproduct_filename' => 'Eproduct Filename',
			'eproduct_available_days' => 'Eproduct Available Days',
			'eproduct_download_times' => 'Eproduct Download Times',
			'weight' => 'Weight',
			'free_shipping' => 'Free Shipping',
			'min_order_amount' => 'Min Order Amount',
			'shipping_freight' => 'Shipping Freight',
			'classID' => 'Class',
			'ordering_available' => 'Ordering Available',
			'slug' => 'Slug',
			'name_ru' => 'Название',
			'brief_description_ru' => 'Brief Description Ru',
			'description_ru' => 'Description Ru',
			'meta_title_ru' => 'Meta Title Ru',
			'meta_description_ru' => 'Meta Description Ru',
			'meta_keywords_ru' => 'Meta Keywords Ru',
			'vkontakte_update_timestamp' => 'Vkontakte Update Timestamp',
			'id_1c' => 'Id 1c',
            'diller_name' => 'Diller Name',
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

		$criteria->compare('productID',$this->productID);
		$criteria->compare('categoryID',$this->categoryID);
		$criteria->compare('customers_rating',$this->customers_rating);
		$criteria->compare('Price',$this->Price);
		$criteria->compare('in_stock',$this->in_stock);
		$criteria->compare('customer_votes',$this->customer_votes);
		$criteria->compare('items_sold',$this->items_sold);
		$criteria->compare('enabled',$this->enabled);
		$criteria->compare('list_price',$this->list_price);
		$criteria->compare('product_code',$this->product_code,true);
		$criteria->compare('sort_order',$this->sort_order);
		$criteria->compare('default_picture',$this->default_picture);
		$criteria->compare('date_added',$this->date_added,true);
		$criteria->compare('date_modified',$this->date_modified,true);
		$criteria->compare('viewed_times',$this->viewed_times);
		$criteria->compare('add2cart_counter',$this->add2cart_counter,true);
		$criteria->compare('eproduct_filename',$this->eproduct_filename,true);
		$criteria->compare('eproduct_available_days',$this->eproduct_available_days);
		$criteria->compare('eproduct_download_times',$this->eproduct_download_times);
		$criteria->compare('weight',$this->weight);
		$criteria->compare('free_shipping',$this->free_shipping);
		$criteria->compare('min_order_amount',$this->min_order_amount);
		$criteria->compare('shipping_freight',$this->shipping_freight);
		$criteria->compare('classID',$this->classID);
		$criteria->compare('ordering_available',$this->ordering_available);
		$criteria->compare('slug',$this->slug,true);
		$criteria->compare('name_ru',$this->name_ru,true);
		$criteria->compare('brief_description_ru',$this->brief_description_ru,true);
		$criteria->compare('description_ru',$this->description_ru,true);
		$criteria->compare('meta_title_ru',$this->meta_title_ru,true);
		$criteria->compare('meta_description_ru',$this->meta_description_ru,true);
		$criteria->compare('meta_keywords_ru',$this->meta_keywords_ru,true);
		$criteria->compare('vkontakte_update_timestamp',$this->vkontakte_update_timestamp);
		$criteria->compare('id_1c',$this->id_1c,true);
        $criteria->compare('diller_name',$this->diller_name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public static function checkPrice($record_id,$company_id)
    {
        if ($company_id==false) {$company_id='*';}
        if ($record_id!==false)
        {
            $current_record=Products::model()->findByPk($record_id);
            $current_record_id=$current_record->productID;
			if ($current_record) {
				$parsed_product=new ParsedProducts;
				$criteriaForParsedProducts=new CDbCriteria();
				$criteriaForParsedProducts->select='price,charge_auto,charge_hand,amount,money_flag';
				$criteriaForParsedProducts->condition='`product_id`="'.$current_record_id.'" AND `flag_upd`<> 0 AND `amount`>3 AND `final_price`>1';
				$criteriaForParsedProducts->order='final_price ASC';
				$criteriaForParsedProducts->limit='1';
				$criteriaForParsedProducts->with='company_rel';
				$parsed_product_result=$parsed_product->find($criteriaForParsedProducts);
				if ($parsed_product_result!=null)
				{
					$temp_price='0';
					if ($parsed_product_result->charge_hand>0)
						{
							$temp_price=$parsed_product_result->price*(1+$parsed_product_result->charge_hand*0.01);
						}
					else
						{
							$temp_price=$parsed_product_result->price*(1+$parsed_product_result->charge_auto*0.01);
						}
					if($parsed_product_result->money_flag=='840')
						{
							$curr_con=Yii::app()->db->createCommand('SELECT currency_value FROM SC_currency_types WHERE CID=11');
							$currency=$curr_con->queryScalar();
							$currency_value=1/$currency;
							$temp_price=$temp_price*$currency_value;
						}
					$current_record->in_stock=$parsed_product_result->amount;
					$current_record->diller_name=$parsed_product_result->company_rel->company;
					$current_record->Price=ceil($temp_price);
					if ($current_record->save()) return true;
				}
				else
				{
					$current_record->in_stock=0;
					if ($current_record->save()) return true;
				}
			}

        }
        else
        {
            $parsed_product=new ParsedProducts;
            $criteriaForParsedProducts=new CDbCriteria();
            $criteriaForParsedProducts->select='product_id';
            //$criteriaForParsedProducts->condition='`company_id`="'.$company_id.'" AND `product_id` IS NOT NULL AND `flag_upd` <> "0" AND `amount`>3 AND `final_price`>0';
            $criteriaForParsedProducts->condition='`company_id`="'.$company_id.'" AND `product_id` IS NOT NULL';
            //$criteriaForParsedProducts->group='product_id';
            //$parsed_product_result=$parsed_product->with('company_rel')->findAll($criteriaForParsedProducts);
            $parsed_product_result=$parsed_product->findAll($criteriaForParsedProducts);
            //$currency=Yii::app()->db->createCommand('SELECT currency_value FROM SC_currency_types WHERE CID=11');
            //$temp_price='0';
            //print_r($parsed_product_result);
            foreach ($parsed_product_result as $record)
            {
                self::checkPrice($record->product_id,false);
                //echo $record->product_id.'  '.$record->amount.'  '.$record->price."<br>";
                /*$shop_product= Products::model()->findByPk($record->product_id);
                if ($record->charge_hand>0)
                {
                    $temp_price=$record->price*(1+$record->charge_hand*0.01);
                }
                else
                {
                    $temp_price=$record->price*(1+$record->charge_auto*0.01);
                }
                if($record->money_flag=='840')
                {
                    $curr_con=Yii::app()->db->createCommand('SELECT currency_value FROM SC_currency_types WHERE CID=11');
                    $currency=$curr_con->queryScalar();
                    $currency_value=1/$currency;
                    $temp_price=$temp_price*$currency_value;
                }
                //if ($shop_product->Price!==$temp_price || $shop_product->in_stock!==$record->amount)
                if ($shop_product->Price > ceil($temp_price))
                {
                    $shop_product->Price=ceil($temp_price);
                    $shop_product->in_stock=$record->amount;
                    $shop_product->diller_name=$record->company_rel->company;
                    $shop_product->save();
                }*/
            }


            return true;
        }

        return false;
    }

    public static function cartProcessing($goods)
    {
        if (is_array($goods))
        {
            //var_dump($goods);
            foreach ($goods as $good)
            {
                $prodId=$good['productID'];
                $parsedProduct=new ParsedProducts();
                $criteriaForParsedProduct=new CDbCriteria();
                $criteriaForParsedProduct->select='id,amount,company_id';
                $criteriaForParsedProduct->condition='`product_id`="'.$prodId.'" AND `flag_upd` <> 0 AND `amount`>3';
                $criteriaForParsedProduct->order='final_price ASC';
                $criteriaForParsedProduct->limit='1';
                $parsedResult=$parsedProduct->find($criteriaForParsedProduct);
                $model=ParsedProducts::model()->findByPk($parsedResult->id);
                $model->amount=$parsedResult->amount-$good['quantity'];
                echo $parsedProduct->amount;
                if ($model->save())
                {
                    Products::checkPrice($prodId,$parsedResult->company_id);
                }
            }
        }
    }

}