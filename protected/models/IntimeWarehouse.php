<?php

/**
 * This is the model class for table "intime_warehouse".
 *
 * The followings are the available columns in table 'intime_warehouse':
 * @property integer $id
 * @property string $name
 * @property string $phone
 * @property string $adress
 * @property integer $lft
 * @property integer $rgt
 * @property integer $level
 */
class IntimeWarehouse extends CExtendedActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'intime_warehouse';
	}

    public function behaviors()
    {
        return array(
            'NestedSetBehavior'=>array(
                'class' => 'application.extensions.nested-set-behavior.NestedSetBehavior',
                'leftAttribute' => 'lft',
                'rightAttribute' => 'rgt',
                'levelAttribute' => 'level',
                'hasManyRoots' => true,
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
			array('name', 'required'),
			array('lft, rgt, level', 'numerical', 'integerOnly'=>true),
			array('name, phone', 'length', 'max'=>100),
			array('adress', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, phone, adress, lft, rgt, level', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'phone' => 'Phone',
			'adress' => 'Adress',
			'lft' => 'Lft',
			'rgt' => 'Rgt',
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
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('adress',$this->adress,true);
		$criteria->compare('lft',$this->lft);
		$criteria->compare('rgt',$this->rgt);
		$criteria->compare('level',$this->level);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return IntimeWarehouse the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function loadXmlFromSite(){
        try{
            $client = new SoapClient("https://ws.intime.ua/test98/ws/integration.1cws?wsdl");
            $cities = $client->GetListCitiesExt();
            $xml = simplexml_load_string($cities->result);
            if($xml instanceof SimpleXMLElement){
                $xml->asXML(Yii::getPathOfAlias("application.runtime").DIRECTORY_SEPARATOR."intimeData.xml");
            }else{
                throw new Exception;
            }
            return true;
        }catch(Exception $e){
            return false;
        }
    }

    public function updateDataFromSite(){
        $fn = Yii::getPathOfAlias("application.runtime").DIRECTORY_SEPARATOR."intimeData.xml";
        if(!file_exists($fn)){
            return false;
        }
        $xml = simplexml_load_string(file_get_contents($fn));
        $regions = array(
            1 => "АР Крым",
            2 => "Винницкая область",
            3 => "Волынская область",
            4 => "Днепропетровская область",
            5 => "Донецкая область",
            6 => "Житомирская область",
            7 => "Закарпатская область",
            8 => "Запорожская область",
            9 => "Ивано-Франковская область",
            10 => "Киевская область",
            //11 => "Киев",
            11 => "Кировоградская область",
            12 => "Луганская область",
            13 => "Львовская область",
            14 => "Николаевская область",
            15 => "Одесская область",
            16 => "Полтавская область",
            17 => "Ровенская область",
            18 => "Сумская область",
            19 => "Тернопольская область",
            20 => "Харьковская область",
            21 => "Херсонская область",
            22 => "Хмельницкая область",
            23 => "Черкасская область",
            24 => "Черниговская область",
            25 => "Черновицкая область",
        );
        $trans = Yii::app()->db->beginTransaction();
        try{
            IntimeWarehouse::model()->truncateTable();
            foreach($regions as $k => $region){
                $root = new IntimeWarehouse();
                $root->id = $k;
                $root->name = $region;
                $root->saveNode();
            }
            foreach($xml->City as $city_xml){
                $cityName = (string)$city_xml->CityName;
                $wareHouses = array();
                foreach($city_xml->Warehouse as $warehouse_xml){
                    $wareHouses[] = array(
                        "name" => (string)$warehouse_xml->Name,
                        "phone" => (string)$warehouse_xml->Phone,
                        "adress" => (string)$warehouse_xml->Adress,
                    );
                    $region = (int)(string)$warehouse_xml->RegionCode;
                    if($region == 11){
                        $region = 10;
                    }elseif($region > 10){
                        $region = $region - 1;
                    }
                }
                if(count($wareHouses) > 0){
                    $region = IntimeWarehouse::model()->findByPk($region);
                    if($region){
                        $city = new IntimeWarehouse;
                        $city->name = $cityName;
                        $city->appendTo($region);
                        foreach($wareHouses as $wareHousesItem){
                            $wareHouse = new IntimeWarehouse;
                            $wareHouse->name = $wareHousesItem["name"];
                            $wareHouse->phone = $wareHousesItem["phone"];
                            $wareHouse->adress = $wareHousesItem["adress"];
                            $wareHouse->appendTo($city);
                        }
                    }
                }
            }
            $trans->commit();
            return true;
        }catch(Exception $e){
            $trans->rollback();
            return $e->getMessage();
        }
        Yii::app()->session["intimeCitisCurrentIndicator"] = 0;
    }

    public function getWareHousesForCity($region_translit, $cityName_translit){
        $criteria = new CDbCriteria();
        $criteria->addCondition("TRIM(UPPER(t.name_translit)) = TRIM(UPPER(:cityName_translit)) AND t.level = 2");
        $criteria->addCondition("t.root = (SELECT id FROM nova_warehouse WHERE name_translit = :region_translit and level = 1)");
        $criteria->params = array(
            ":region_translit" => $region_translit,
            ":cityName_translit" => $cityName_translit
        );
        $city = $this->find($criteria);
        if(!$city){
            return false;
        }
        $criteria = new CDbCriteria();
        $criteria->addCondition("root = :root AND lft > :lft AND rgt < :rgt");
        $criteria->params = array(":root" => $city->root, ":lft" => $city->lft, ":rgt" => $city->rgt);
        $criteria->order = "name ASC";
        return $this->findAll($criteria);
    }

}
