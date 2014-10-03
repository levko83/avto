<?php

/**
 * This is the model class for table "nova_warehouse".
 *
 * The followings are the available columns in table 'nova_warehouse':
 * @property integer $id
 * @property integer $xml_id
 * @property string $name
 * @property string $address
 * @property string $phone
 * @property string $weekday_work_hours
 * @property string $working_saturday
 * @property string $working_sunday
 * @property integer $root
 * @property integer $lft
 * @property integer $rgt
 * @property integer $level
 */
class NovaWarehouse extends CExtendedActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'nova_warehouse';
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
			array('xml_id, root, lft, rgt, level', 'numerical', 'integerOnly'=>true),
			array('name, address', 'length', 'max'=>100),
			array('phone, weekday_work_hours, working_saturday, working_sunday', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, xml_id, name, address, phone, weekday_work_hours, working_saturday, working_sunday, root, lft, rgt, level', 'safe', 'on'=>'search'),
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
			'xml_id' => 'Xml',
			'name' => 'Name',
			'address' => 'Address',
			'phone' => 'Phone',
			'weekday_work_hours' => 'Weekday Work Hours',
			'working_saturday' => 'Working Saturday',
			'working_sunday' => 'Working Sunday',
			'root' => 'Root',
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
		$criteria->compare('xml_id',$this->xml_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('weekday_work_hours',$this->weekday_work_hours,true);
		$criteria->compare('working_saturday',$this->working_saturday,true);
		$criteria->compare('working_sunday',$this->working_sunday,true);
		$criteria->compare('root',$this->root);
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
	 * @return NovaWarehouse the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function loadXmlFromSite(){
        try{
            $api_key = '4e8493d19f920fff7271ab42591da801';
            $postData = "<?xml version=\"1.0\" encoding=\"utf-8\"?>
                            <file>
                                <auth>{$api_key}</auth>
                                <city/>
                            </file>";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'http://orders.novaposhta.ua/xml.php');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, Array("Content-Type: text/xml"));
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            $result = curl_exec($ch);
            $xml = simplexml_load_string($result);
            if($xml instanceof SimpleXMLElement){
                $xml->asXML(Yii::getPathOfAlias("application.runtime").DIRECTORY_SEPARATOR."novaCitis.xml");
            }else{
                throw new Exception;
            }
            curl_close($ch);
            $postData = "<?xml version=\"1.0\" encoding=\"utf-8\"?>
                            <file>
                                <auth>{$api_key}</auth>
                                <warenhouse/>
                            </file>";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'http://orders.novaposhta.ua/xml.php');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, Array("Content-Type: text/xml"));
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            $result = curl_exec($ch);
            $xml = simplexml_load_string($result);
            if($xml instanceof SimpleXMLElement){
                $xml->asXML(Yii::getPathOfAlias("application.runtime").DIRECTORY_SEPARATOR."novaData.xml");
            }else{
                throw new Exception;
            }
            curl_close($ch);
            return true;
        }catch(Exception $e){
            return false;
        }
    }

    public function updateDataFromSite(){
        $fn_citis = Yii::getPathOfAlias("application.runtime").DIRECTORY_SEPARATOR."novaCitis.xml";
        $fn_data = Yii::getPathOfAlias("application.runtime").DIRECTORY_SEPARATOR."novaData.xml";
        if(!file_exists($fn_citis) or !file_exists($fn_data)){
            return false;
        }
        $regions = array(
            1 => array("rus" => "АР Крым", "ukr" => "АРК"),
            2 => array("rus" => "Винницкая область", "ukr" => "Вінницька"),
            3 => array("rus" => "Волынская область", "ukr" => "Волинська"),
            4 => array("rus" => "Днепропетровская область", "ukr" => "Дніпропетровська"),
            5 => array("rus" => "Донецкая область", "ukr" => "Донецька"),
            6 => array("rus" => "Житомирская область", "ukr" => "Житомирська"),
            7 => array("rus" => "Закарпатская область", "ukr" => "Закарпатська"),
            8 => array("rus" => "Запорожская область", "ukr" => "Запорізька"),
            9 => array("rus" => "Ивано-Франковская область", "ukr" => "Івано-Франківська"),
            10 => array("rus" => "Киевская область", "ukr" => "Київська"),
            11 => array("rus" => "Кировоградская область", "ukr" => "Кіровоградська"),
            12 => array("rus" => "Луганская область", "ukr" => "Луганська"),
            13 => array("rus" => "Львовская область", "ukr" => "Львівська"),
            14 => array("rus" => "Николаевская область", "ukr" => "Миколаївська"),
            15 => array("rus" => "Одесская область", "ukr" => "Одеська"),
            16 => array("rus" => "Полтавская область", "ukr" => "Полтавська"),
            17 => array("rus" => "Ровенская область", "ukr" => "Рівненська"),
            18 => array("rus" => "Сумская область", "ukr" => "Сумська"),
            19 => array("rus" => "Тернопольская область", "ukr" => "Тернопільська"),
            20 => array("rus" => "Харьковская область", "ukr" => "Харківська"),
            21 => array("rus" => "Херсонская область", "ukr" => "Херсонська"),
            22 => array("rus" => "Хмельницкая область", "ukr" => "Хмельницька"),
            23 => array("rus" => "Черкасская область", "ukr" => "Черкаська"),
            24 => array("rus" => "Черниговская область", "ukr" => "Чернігівська"),
            25 => array("rus" => "Черновицкая область", "ukr" => "Чернівецька"),
        );
        $searchUkrRegion = function($ukr) use ($regions){
            $searched = array_filter(
                $regions,
                function($v)use($ukr){
                    return $v["ukr"] == $ukr;
                }
            );
            reset($searched);
            return key($searched);
        };
        $trans = Yii::app()->db->beginTransaction();
        try{
            NovaWarehouse::model()->truncateTable();
            $xml_citis = simplexml_load_string(file_get_contents($fn_citis));
            $citys = array();
            $regionKeys = array();
            foreach($xml_citis->result->cities->city as $city){
                $buff = array(
                    "id" => (int)(string)$city->id,
                    "name" => (string)$city->nameRu,
                );
                $regionKey = $searchUkrRegion((string)$city->areaNameUkr);
                if($regionKey){
                    if(!array_key_exists($regionKey, $regionKeys)){
                        $area = new NovaWarehouse();
                        $area->id = $regionKey;
                        $area->name = $regions[$regionKey]["rus"];
                        $area->name_translit = HtmlHelper::transliterate($regions[$regionKey]["rus"]);
                        $area->saveNode();
                        $buff["region_object"] = $area;
                        $regionKeys[$regionKey] = $area;
                    }else{
                        $buff["region_object"] = $regionKeys[$regionKey];
                    }
                    $citys[] = $buff;
                }
            }
            if($citys){
                foreach($citys as $city_item){
                    $city = new NovaWarehouse();
                    $city->xml_id = $city_item["id"];
                    $city->name = $city_item["name"];
                    $city->name_translit = HtmlHelper::transliterate($city_item["name"]);
                    $city->appendTo($city_item["region_object"]);
                }
                $xml_data = simplexml_load_string(file_get_contents($fn_data));
                $citysKeys = array();
                foreach($xml_data->result->whs->warenhouse as $warenhouse_item){
                    list($name, $address) = explode(":", (string)$warenhouse_item->addressRu);
                    if($name and $address){
                        $city_id = (int)(string)$warenhouse_item->city_id;
                        if($city_id){
                            $city = null;
                            if(!array_key_exists($city_id, $citysKeys)){
                                $city = NovaWarehouse::model()->find("xml_id = {$city_id}");
                                if($city){
                                    $citysKeys[$city_id] = $city;
                                }
                            }else{
                                $city = $citysKeys[$city_id];
                            }
                            if($city){
                                $warenhouse = new NovaWarehouse();
                                $warenhouse->name = $name;
                                $warenhouse->address = $address;
                                $warenhouse->phone = (string)$warenhouse_item->phone;
                                $warenhouse->weekday_work_hours = (string)$warenhouse_item->weekday_work_hours;
                                $warenhouse->working_saturday = (string)$warenhouse_item->working_saturday;
                                $warenhouse->working_sunday = (string)$warenhouse_item->working_sunday;
                                $warenhouse->appendTo($city);
                            }
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
