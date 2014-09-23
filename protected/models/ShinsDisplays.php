<?php

/**
 * This is the model class for table "shins_displays".
 *
 * The followings are the available columns in table 'shins_displays':
 * @property integer $id
 * @property string $display_name
 * @property integer $actionPrice
 * @property string $translit
 * @property string $title
 * @property string $display_description
 * @property string $search_keywords
 * @property string $search_description
 * @property integer $editing
 * @property integer $edited
 *
 * The followings are the available model relations:
 * @property Shins[] $shins
 */
class ShinsDisplays extends CExtendedActiveRecord
{

	/**
	 * @return string the associated database table name
	 */

    public $sort;
    public $shinsFilter;
    public $minPrice;
    public $inStock;

	public function tableName()
	{
		return 'shins_displays';
	}

    public function behaviors(){
        return array(
            "StatisticaBehavior" => array(
                "class" => "application.components.StatisticaBehavior",
                "tables" => "shins_displays"
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
        SphinxManager::reindex("shinsIndexDelta");
    }
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('display_name, actionPrice, meta_keywords, meta_description', 'filter', 'filter' => 'strip_tags'),
            array('display_name, actionPrice, meta_keywords, meta_description, display_description', 'filter', 'filter' => 'trim'),
            array('actionPrice', 'actionPriceValidator'),
            array('display_description', 'filter', 'filter' => array('ModelFilters', 'htmlSecurity')),
            array('display_name, display_description', 'required'),
			array('editing', 'numerical', 'integerOnly'=>true),
			array('display_name, translit, title', 'length', 'max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, display_name, actionPrice, translit, title, display_description, meta_keywords, meta_description, editing', 'safe', 'on'=>'search'),
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
			'shins' => array(self::HAS_MANY, 'Shins', 'shins_display_id'),
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

		$criteria->compare('id', $this->id);
		$criteria->compare('display_name',$this->display_name,true);
        $criteria->compare('actionPrice',$this->actionPrice);
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

    /*
    public function searchForSite($pageSize = null)
    {
        $criteria = new CDbCriteria;
        $sqlFieldSeason = "(
                              SELECT shins_season.value
                              FROM shins_season
                              WHERE shins_season.id IN (
                                        SELECT shins.shins_season_id
                                        FROM shins
                                        WHERE shins.shins_display_id = t.id
                                    )
                              LIMIT 1
                           )";
        $sqlFieldSmallImage = "(
                                  SELECT shins_images.imageName
                                  FROM shins_images
                                  WHERE shins_images.shins_id IN (
                                            SELECT shins.id
                                            FROM shins
                                            WHERE shins.shins_display_id = t.id
                                        )
                                        AND
                                        shins_images.typeImage = 1
                                  LIMIT 1
                               )";
        $sqlFieldMediumImage = "(
                                  SELECT shins_images.imageName
                                  FROM shins_images
                                  WHERE shins_images.shins_id IN (
                                            SELECT shins.id
                                            FROM shins
                                            WHERE shins.shins_display_id = t.id
                                        )
                                        AND
                                        shins_images.typeImage = 2
                                  LIMIT 1
                               )";
        $criteria->select = array(
            "t.id",
            "t.display_name",
            "t.translit",
            "t.title",
            "t.display_description",
            "t.search_keywords",
            "t.search_description",
            "{$sqlFieldSeason} as season",
            "{$sqlFieldSmallImage} as smallImage",
            "{$sqlFieldMediumImage} as mediumImage",
            "ROUND(MIN(shins.price)) as min_price"
        );
        $criteria->together = true;
        $criteria->with = array(
            'shins'=>array(
                'condition' => 'shins.price > 0 and shins.amount > 0',
            ),
        );
        if($this->shinsFilter){
            $shins = new Shins('filter');
            $shins->attributes = $this->shinsFilter;
            $subQuery = $shins->subFilter();
            $criteria->addCondition("t.id IN ({$subQuery->sql})");
            $criteria->params = $subQuery->params;
        }
        $group = array(
            "t.id",
            "t.display_name",
            "t.translit",
            "t.title",
            "t.display_description",
            "t.search_keywords",
            "t.search_description"
        );
        $criteria->group = join(", ", $group);
        $sort = new CSort();
        $sort->sortVar = 'sort';
        $sort->defaultOrder = 'ROUND(MIN(shins.price)) ASC';
        $sort->attributes = array(
            'title'=>array(
                'asc'=>'t.display_name ASC',
            ),
            'price'=>array(
                'asc'=>'ROUND(MIN(shins.price)) ASC',
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
        return new CActiveDataProvider($this, array(
                'criteria' => $criteria,
                'sort' => $sort,
                'pagination' =>  $pagination,
            )
        );
    }
    */

    public function isParam($param_name){
        return  $this->shinsFilter["$param_name"] and ($this->shinsFilter["$param_name"] = trim(strip_tags($this->shinsFilter["$param_name"]))) != "";
    }


    public function filterByParams($display_id, $filter = null, $avto_product_arr = null){
        if(!$filter) return array();
        $conn = Yii::app()->sphinx;
        $cols = "shins_profile_width, shins_profile_height, shins_diametr";
        $sql = "SELECT {$cols} FROM shinsIndex";
        $where = array("shins_display_id = ".(int)$display_id);
        if($filter["shins_profile_width"]){
            $where[] = "shins_profile_width = ".(int)$filter["shins_profile_width"];
        }
        if($filter["shins_profile_height"]){
            $where[] = "shins_profile_height = ".(int)$filter["shins_profile_height"];
        }
        if($filter["shins_diametr"]){
            //$filter["shins_diametr"] = (int)$filter["shins_diametr"];
            $where[] = "shins_diametr = ".(int)$filter["shins_diametr"].".0";
        }
        $matches = array();
        if($avto_product_arr){
            $t = array();
            foreach($avto_product_arr as $item){
                $item = str_replace("/", '\\\\\/', $item);
                $t[] = "@product_name \"{$item}\" ";
            }
            $matches[] = join(" | ", $t);
        }
        if($matches){
            if(count($matches) == 1){
                $where[] = "MATCH('{$matches[0]}')";
            }else{
                $where[] = "MATCH('({$matches[0]}) & ({$matches[1]})')";
            }
        }
        $comm = $conn->createCommand();
        $sql .= " WHERE ".join(" AND ", $where)." GROUP BY shins_param LIMIT 500000";
        $comm->setText($sql);
        $res = $comm->queryAll();
        if(count($res) > 0){
            $get_modification = function($item){
                return $item["shins_profile_width"]."/".$item["shins_profile_height"]." R".(int)$item["shins_diametr"];
            };
            $result = array();
            foreach($res as $item){
                $result[] = $get_modification($item);
            }
            return $result;
        }else{
            return array();
        }
    }

    public function searchSphinxForSite($pageSize = null, $limit = 5000000){
        $conn = Yii::app()->sphinx;
        $cols = array(
                    "shins_display_id",
                    //"shins_profile_width",
                    "shins_display_name",
                    "shins_season",
                    "shins_display_translit",
                    "shins_rating",
                    "image_name",
                    "MIN(min_display_price_fixture) AS min_price"
               );
        $conditions = array();
        $joinToIntStr = function($arr){
            return join(", ", array_map(function($v){ return (int)$v; }, $arr));
        };
        if($this->shinsFilter){
            $matches = array();
            if($this->shinsFilter["avto_modification"]){
                $idents = join(
                    ", ",
                    array_map(
                        function($v){
                            return (int)$v["shina_id"];
                        },
                        Yii::app()->db->createCommand("SELECT shina_id FROM view_shins_avto_modifications WHERE modif_id=".(int)$this->shinsFilter["avto_modification"])->queryAll()
                    )
                );
                $conditions[] = "ident IN ({$idents})";
            }
            if($this->isParam("priceMin") and $this->isParam("priceMax")){
                $min = (int)$this->shinsFilter["priceMin"];
                $max = (int)$this->shinsFilter["priceMax"];
                $conditions[] = "price >= {$min} AND price <= {$max}";
               // пока привязано мало шин, отключает поиск по диапазону цен
            }
            if($this->isParam("inStock")){
                $conditions[] = "amount > 0";
                // пока привязано мало шин, отключает поиск по диапазону цен
            }
            if($this->shinsFilter["shins_profile_width"]){
                $v = $joinToIntStr($this->shinsFilter["shins_profile_width"]);
                $conditions[] = "shins_profile_width IN ({$v})";
            }
            if($this->shinsFilter["shins_load_index"]){
                //$matches[] = "@shins_load_index_translit \"{$this->shinsFilter["shins_load_index"]}\"";
                $matches[] = SphinxHelper::SetStringFilter("shins_load_index_translit", $this->shinsFilter["shins_load_index"]);
            }
            if($this->shinsFilter["shins_profile_height"]){
                $v = $joinToIntStr($this->shinsFilter["shins_profile_height"]);
                $conditions[] = "shins_profile_height IN({$v})";
            }
            if($this->shinsFilter["shins_diametr"]){
                $v = SphinxHelper::SetFloatFilter("shins_diametr", $this->shinsFilter["shins_diametr"]);
                $cols[] = "IF({$v}, 1 , 0) AS w1";
                $conditions[] = "w1 = 1";
            }
            if($this->shinsFilter["shins_season_id"]){
                if(is_array($this->shinsFilter["shins_season_id"])){
                    $str = join(", ", array_map(function($v){ return (int)$v; }, $this->shinsFilter["shins_season_id"]));
                    $conditions[] = "shins_season_id IN ({$str})";
                }else{
                    $v = (int)$this->shinsFilter["shins_season_id"];
                    $conditions[] = "shins_season_id = {$v}";
                }
            }
            if($this->shinsFilter["shins_type_of_avto_id"]){
                $v = $joinToIntStr($this->shinsFilter["shins_type_of_avto_id"]);
                $conditions[] = "shins_type_of_avto_id IN ({$v})";
            }
            if($this->shinsFilter["shins_run_flat_technology_id"]){
                $v = $joinToIntStr($this->shinsFilter["shins_run_flat_technology_id"]);
                $conditions[] = "shins_run_flat_technology_id IN ({$v})";
            }
            if($this->shinsFilter["shins_spike_id"]){
                $v = $joinToIntStr($this->shinsFilter["shins_spike_id"]);
                $conditions[] = "shins_spike_id IN ({$v})";
            }
            if($this->shinsFilter["vendor_id"] and is_array($this->shinsFilter["vendor_id"])){
                $str = join(", ", array_map(function($v){ return (int)$v; }, $this->shinsFilter["vendor_id"]));
                $conditions[] = "vendor_id IN ({$str})";
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
            ->group("shins_display_id")
            ->from("shinsIndex")
            ->limit($limit);
        $sort = new CSort();
        $sort->sortVar = 'sort';
        $sort->defaultOrder = 'min_price ASC';
        $sort->attributes = array(
            'rating'=>array(
                'asc'=>'shins_rating DESC',
            ),
            'title'=>array(
                'asc'=>'shins_display_translit ASC',
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
        if(count($conditions) > 0){
            $comm->setWhere(join(" AND ", $conditions));
        }
        $comm->setText("{$comm->getText()} OPTION max_matches=500000, ranker=none");
        $res = $comm->queryAll();
        return new CArrayDataProvider($comm->queryAll(), array(
                'sort' => $sort,
                'pagination' => $pagination,
            )
        );
    }

    public function getRating(){
        $sql = "SELECT AVG(rating) AS val, COUNT(id) as cnt FROM feedbacks WHERE product_id={$this->id} AND product_type = 1 AND rating > 0";
        $row = Yii::app()->db->createCommand($sql)->queryRow();
        return (object)array(
            "val" => $row["val"],
            "votes" => $row["cnt"],
        );
    }

    public function returnMinPrice($id){
        $sql = "SELECT MIN(price) AS min_price FROM shins WHERE shins_display_id = {$id}";
        return (int)Yii::app()->db->createCommand($sql)->queryScalar();
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ShinsDisplays the static model class
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
            $cl->SetFilter("shins_display_id", array($display_id));
            $cl->SetGroupBy($templateKeyWord["index_field_name"], SPH_GROUPBY_ATTR);
            $cl->AddQuery("", "shinsIndex");
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
