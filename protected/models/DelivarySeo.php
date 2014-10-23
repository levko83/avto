<?php

/**
 * This is the model class for table "delivary_seo".
 *
 * The followings are the available columns in table 'delivary_seo':
 * @property integer $region_id
 * @property string $city
 * @property string $city_translit
 * @property string $text
 */
class DelivarySeo extends CExtendedActiveRecord
{
	/**
	 * @return string the associated database table name
	 */

    public function primaryKey()
    {
        return array("region_id", "city_translit");
    }

    public function tableName()
	{
		return 'delivary_seo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
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
			'region_id' => 'Region',
			'city' => 'City',
			'city_translit' => 'City Translit',
			'text' => 'Text',
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

		$criteria->compare('region_id',$this->region_id);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('city_translit',$this->city_translit,true);
		$criteria->compare('text',$this->text,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DelivarySeo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function getCitysForRegion($region_id){
        $criteria = new CDbCriteria;
        $criteria->compare("region_id", (int)$region_id);
        $criteria->order("city");
        return DelivarySeo::model()->findAll($criteria);
    }

    public function getDeliverySeoTextForCity($city_translit, $region_translit){
        return Yii::app()->db->createCommand()
            ->select("t.text")
            ->from("delivary_seo t")
            ->join("nova_warehouse r", "(t.region_id = r.id AND r.level= 1)")
            ->where(
                "t.city_translit = :city_translit AND r.name_translit = :region_translit",
                array(":city_translit" => $city_translit, ":region_translit" => $region_translit)
            )
            ->limit(1)
            ->queryScalar();
    }

}
