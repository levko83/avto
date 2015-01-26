<?php

/**
 * This is the model class for table "disks_displays".
 *
 * The followings are the available columns in table 'disks_displays':
 * @property integer $id
 * @property string $display_name
 * @property integer $actionPrice
 * @property string $translit
 * @property string $title
 * @property string $display_description
 * @property string $meta_keywords
 * @property string $meta_description
 * @property integer $editing
 * @property integer $edited
 *
 * The followings are the available model relations:
 * @property Disks[] $disks
 */
class DisksDisplays extends CExtendedActiveRecord
{

    public $sort;
    public $disksFilter;
    public $inStock;
    public $minPrice;

    /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'disks_displays';
	}

    public function behaviors(){
        return array(
            "StatisticaBehavior" => array(
                "class" => "application.components.StatisticaBehavior",
                "tables" => "disks_displays"
            ),
        );
    }

    protected function beforeSave()
    {
        if(parent::beforeSave() === false){
            return false;
        }
        $this->edited = time();
        return true;
    }


    protected function afterSave()
    {
        if(parent::afterSave() === false){
            return false;
        }
        SphinxManager::reindex("disksIndexDelta");
    }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('display_name, meta_keywords, meta_description', 'filter', 'filter' => 'strip_tags'),
            array('display_description', 'filter', 'filter' => array('ModelFilters', 'htmlSecurity')),
            array('display_name, actionPrice, meta_keywords, meta_description, display_description', 'filter', 'filter' => 'trim'),
            array('actionPrice', 'actionPriceValidator'),
            array('display_name', 'required'),
			array('editing', 'numerical', 'integerOnly'=>true),
			array('display_name, translit, title', 'length', 'max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, display_name, translit, title, display_description, meta_keywords, meta_description, editing', 'safe', 'on'=>'search'),
		);
	}

    public function actionPriceValidator($attribute,$params)
    {
        $actionPrice = $this->$attribute;
        if($this->$attribute != ""){
            $actionPrice = (int)$this->$attribute;
            if($actionPrice <= 0){
                $this->addError($attribute, 'Акционная цена должна быть больше 0');
                return;
            }
            $minPrice = self::model()->returnMinPrice($this->id);
            if($actionPrice >= $minPrice){
                $this->addError($attribute, 'Акционная цена должна быть меньше минимальной цены');
            }
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
			'disks' => array(self::HAS_MANY, 'Disks', 'disks_display_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'display_name' => 'Название',
            'minPrice' => 'Минимальная цена, грн',
            'actionPrice' => 'Акционная цена, грн',
            'translit' => 'Translit',
            'title' => 'Title',
			'display_description' => 'Описание на сайте',
			'meta_keywords' => 'Ключевые слова для поисковика (keywords)',
			'meta_description' => 'Описание для поисковика (description)',
			'editing' => 'Editing',
		);
	}

	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('display_name',$this->display_name,true);
        $criteria->compare('translit',$this->translit,true);
        $criteria->compare('title',$this->title,true);
		$criteria->compare('display_description',$this->display_description,true);
		$criteria->compare('meta_keywords',$this->meta_keywords,true);
		$criteria->compare('meta_description',$this->meta_description,true);
		$criteria->compare('editing',$this->editing);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'pagination' => array(
                'pageSize' => 15,
            ),
		));
	}

    public function isParam($param_name){
        return $this->disksFilter["$param_name"] and ($this->disksFilter["$param_name"] = trim(strip_tags($this->disksFilter["$param_name"]))) != "";
    }

    public function filterByParams($display_id, $filter = null, $avto_product_arr = null){
        if(!$filter) return array();
        $conn = Yii::app()->sphinx;
        $cols = array(
            "disks_rim_width",
            "disks_rim_diametr",
            "disks_boom",
        );
        $conditions = array("disks_display_id = {$display_id}");
        if($avto_product_arr and is_array($avto_product_arr)){
            $ORs = array();
            foreach($avto_product_arr as $avto_modification_arr_line_item){
                foreach($avto_modification_arr_line_item as $param_value){
                    $ANDs = array();
                    if($param_value["disks_rim_width"]) $ANDs[] = SphinxHelper::SetFloatFilter("disks_rim_width", $param_value["disks_rim_width"]);
                    if($param_value["disks_rim_diametr"]) $ANDs[] = SphinxHelper::SetFloatFilter("disks_rim_diametr", $param_value["disks_rim_diametr"]);
                    if($param_value["disks_boom"]) $ANDs[] = SphinxHelper::SetFloatFilter("disks_boom", $param_value["disks_boom"]);
                    if($param_value["disks_port_position"]) $ANDs[] = SphinxHelper::SetFloatFilter("disks_port_position", $param_value["disks_port_position"]);
                    if($param_value["disks_fixture_port_count"]) $ANDs[] = SphinxHelper::SetIntFilter("disks_fixture_port_count", $param_value["disks_fixture_port_count"]);
                    if($param_value["disks_fixture_port_diametr"]) $ANDs[] = SphinxHelper::SetFloatFilter("disks_fixture_port_diametr", $param_value["disks_fixture_port_diametr"]);
                    $ORs[] = SphinxHelper::AND_Conditions($ANDs);
                }
            }
            $if_condition = SphinxHelper::OR_Conditions($ORs);
            $cols[] = "IF({$if_condition}, 1, 0) AS modifs";
            $conditions[] = "modifs = 1";
        }
        if($filter["disks_rim_width"]){
            $conditions[] = SphinxHelper::SetFloatFilter("disks_rim_width", $filter["disks_rim_width"]);
            $conditions[] = "disks_rim_width > 0.0";
        }
        if($filter["disks_rim_diametr"]){
            $conditions[] = SphinxHelper::SetFloatFilter("disks_rim_diametr", $filter["disks_rim_diametr"]);
            $conditions[] = "disks_rim_diametr > 0.0";
        }
        if($filter["disks_boom"]){
            $conditions[] = SphinxHelper::SetFloatFilter("disks_boom", $filter["disks_boom"]);
            $conditions[] = "disks_boom > 0.0";
        }
        $comm = $conn->createCommand()
                     ->select($cols)
                     ->group("disks_param")
                     ->from("disksIndex")
                     ->limit(500000);
        if($conditions){
            $comm->setWhere(join(" AND ", $conditions));
        }
        $res = $comm->queryAll();
        if(count($res) > 0){
            return $res;
        }else{
            return array();
        }
    }


    public function searchSphinxForSite($pageSize = null, $limit = 5000000){
        $data = SphinxQueryCache::getDisksDisplays($this->disksFilter, $limit);
        if($data === false){
            $conn = Yii::app()->sphinx;
            $cols = array(
                "disks_display_id",
                "disks_display_name",
                "disks_type",
                "disks_display_translit",
                "disks_rating",
                "image_name",
                "MIN(min_display_price_fixture) AS min_price"
            );
            $if_column_int_condition = function($fieldName, $condArray, $columnAlias){
                $condWhere = SphinxHelper::SetIntFilter($fieldName, $condArray);
                return "IF({$condWhere}, 1, 0) AS {$columnAlias}";
            };
            $if_column_float_condition = function($fieldName, $condArray, $columnAlias){
                $condWhere = SphinxHelper::SetFloatFilter($fieldName, $condArray);
                return "IF({$condWhere}, 1, 0) AS {$columnAlias}";
            };
            $conditions = array();
            if($this->disksFilter){
                $matches = array();
                if($this->disksFilter["avto_modification"] and is_array($this->disksFilter["avto_modification"])){
                    $ORs = array();
                    foreach($this->disksFilter["avto_modification"] as $avto_modification_arr_line_item){
                        foreach($avto_modification_arr_line_item as $param_value){
                            $ANDs = array();
                            if($param_value["disks_rim_width"]) $ANDs[] = SphinxHelper::SetFloatFilter("disks_rim_width", $param_value["disks_rim_width"]);
                            if($param_value["disks_rim_diametr"]) $ANDs[] = SphinxHelper::SetFloatFilter("disks_rim_diametr", $param_value["disks_rim_diametr"]);
                            if($param_value["disks_boom"]) $ANDs[] = SphinxHelper::SetFloatFilter("disks_boom", $param_value["disks_boom"]);
                            if($param_value["disks_port_position"]) $ANDs[] = SphinxHelper::SetFloatFilter("disks_port_position", $param_value["disks_port_position"]);
                            if($param_value["disks_fixture_port_count"]) $ANDs[] = SphinxHelper::SetIntFilter("disks_fixture_port_count", $param_value["disks_fixture_port_count"]);
                            if($param_value["disks_fixture_port_diametr"]) $ANDs[] = SphinxHelper::SetFloatFilter("disks_fixture_port_diametr", $param_value["disks_fixture_port_diametr"]);
                            $ORs[] = SphinxHelper::AND_Conditions($ANDs);
                        }
                    }
                    $if_condition = SphinxHelper::OR_Conditions($ORs);
                    $cols[] = "IF({$if_condition}, 1, 0) AS modifs";
                    $conditions[] = "modifs = 1";
                }
                if($this->isParam("priceMin") and $this->isParam("priceMax")){
                    $min = (int)$this->disksFilter["priceMin"];
                    $max = (int)$this->disksFilter["priceMax"];
                    $conditions[] = "price >= {$min} AND price <= {$max}";
                    // пока привязано мало шин, отключает поиск по диапазону цен
                }
                if($this->isParam("inStock")){
                    $conditions[] = "amount > 0";
                    // пока привязано мало шин, отключает поиск по диапазону цен
                }
                if($this->disksFilter["disks_rim_diametr"]){
                    $cols[] = $if_column_float_condition("disks_rim_diametr", $this->disksFilter["disks_rim_diametr"], "w1");
                    $conditions[] = "w1 = 1";
                }
                if($this->disksFilter["disks_type_id"]){
                    if(is_array($this->disksFilter["disks_type_id"])){
                        $str = join(", ", array_map(function($v){ return (int)$v; }, $this->disksFilter["disks_type_id"]));
                        $conditions[] = "disks_type_id IN ({$str})";
                    }else{
                        $v = (int)$this->disksFilter["disks_type_id"];
                        $conditions[] = "disks_type_id = {$v}";
                    }
                }
                if($this->isParam("disks_rim_width")){
                    $cols[] = $if_column_float_condition("disks_rim_width", $this->disksFilter["disks_rim_width"], "w2");
                    $conditions[] = "w2 = 1";
                }
                if($this->isParam("disks_port_position")){
                    $cols[] = $if_column_float_condition("disks_port_position", $this->disksFilter["disks_port_position"], "w3");
                    $conditions[] = "w3 = 1";
                }
                if($this->isParam("disks_fixture_port_count")){
                    $cols[] = $if_column_int_condition("disks_fixture_port_count", $this->disksFilter["disks_fixture_port_count"], "w4");
                    $conditions[] = "w4 = 1";
                }
                if($this->isParam("disks_boom")){
                    $cols[] = $if_column_float_condition("disks_boom", $this->disksFilter["disks_boom"], "w5");
                    $conditions[] = "w5 = 1";
                }
                if($this->isParam("disks_fixture_port_diametr")){
                    $cols[] = $if_column_float_condition("disks_fixture_port_diametr", $this->disksFilter["disks_fixture_port_diametr"], "w6");
                    $conditions[] = "w6 = 1";
                }
                if($this->disksFilter["disks_color"] and is_array($this->disksFilter["disks_color"])){
                    $matches[] = SphinxHelper::SetStringFilter("disks_color_translit", $this->disksFilter["disks_color"]);
                }
                if($this->disksFilter["vendor_id"]){
                    $cols[] = $if_column_int_condition("vendor_id", $this->disksFilter["vendor_id"], "w7");
                    $conditions[] = "w7 = 1";
                }
                if($matches){
                    if(count($matches) == 1){
                        $conditions[] = "MATCH('{$matches[0]}')";
                    }else{
                        $conditions[] = "MATCH('({$matches[0]}) & ({$matches[1]})')";
                    }
                }
            }
            $comm = $conn->createCommand()
                ->select($cols)
                ->group("disks_display_id")
                ->from("disksIndex");
            if(count($conditions) > 0){
                $comm->setWhere(join(" AND ", $conditions));
            }
            $comm->setText("{$comm->getText()} LIMIT 0, {$limit} OPTION max_matches=500000");
            $data = $comm->queryAll();
            SphinxQueryCache::setDisksDisplays($this->disksFilter, $data, $limit);
        }
        $sort = new CSort();
        $sort->sortVar = 'sort';
        $sort->defaultOrder = 'title ASC';
        $sort->attributes = array(
            'rating'=>array(
                'asc'=>'disks_rating ASC',
            ),
            'title'=>array(
                'asc'=>'disks_display_translit ASC',
            ),
            'price'=>array(
                'asc'=>'min_price ASC',
            ),
        );
        if($pageSize){
            $pagination = array(
                'pageSize' => $pageSize,
                'pageVar' => 'page',
            );
        }else{
            $pagination = false;
        }
        return new CArrayDataProvider($data, array(
                'sort' => $sort,
                'pagination' => $pagination,
            )
        );
    }

    public function getRating(){
        $sql = "SELECT AVG(rating) AS val, COUNT(id) as cnt FROM feedbacks WHERE product_id={$this->id} AND product_type = 2 AND rating > 0";
        $row = Yii::app()->db->createCommand($sql)->queryRow();
        return (object)array(
            "val" => $row["val"],
            "votes" => $row["cnt"],
        );
    }

    public function getRatingById($id){
        $sql = "SELECT AVG(rating) AS val, COUNT(id) as cnt FROM feedbacks WHERE product_id={$id} AND product_type = 2 AND rating > 0";
        $row = Yii::app()->db->createCommand($sql)->queryRow();
        return (object)array(
            "val" => $row["val"],
            "votes" => $row["cnt"],
        );
    }

    public function returnMinPrice($id){
        $sql = "SELECT MIN(price) AS min_price FROM disks WHERE disks_display_id = {$id}";
        return (int)Yii::app()->db->createCommand($sql)->queryScalar();
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DisksDisplays the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function getSeoTemplateSubstitutionData($display_id, $templateKeyWords){
        require_once(Yii::getPathOfAlias("application.components")."/sphinxapi.php");
        $cl = new SphinxClient();
        $cl->SetServer('127.0.0.1', 9312);
        foreach($templateKeyWords as $templateKeyWord){
            $cl->ResetFilters();
            $cl->ResetGroupBy();
            $select = array("id", $templateKeyWord["index_field_name"]);
            if($templateKeyWord["condition"]){
                $select[] = "IF(".$templateKeyWord["condition"].", 1, 0) AS c1";
                $cl->SetFilter("c1", array(1));
            }
            $cl->SetSelect(join(", ", $select));
            $cl->SetFilter("disks_display_id", array($display_id));
            $cl->SetGroupBy($templateKeyWord["index_field_name"], SPH_GROUPBY_ATTR);
            $cl->AddQuery("", "disksIndex");
        }
        $queryData = $cl->RunQueries();
        $result = array();
        foreach($queryData as $k => $queryDataItem){
            if($queryDataItem["matches"]){
                $result[$templateKeyWords[$k]["keyword"]] = array();
                foreach($queryDataItem["matches"] as $item){
                    $result[$templateKeyWords[$k]["keyword"]][] = $item["attrs"][$templateKeyWords[$k]["index_field_name"]];
                }
                $result[$templateKeyWords[$k]["keyword"]] = join(", ", $result[$templateKeyWords[$k]["keyword"]]);
            }
        }
        return $result;
    }

}
