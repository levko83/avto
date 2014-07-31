<?php

/**
 * This is the model class for table "podbor_shini".
 *
 * The followings are the available columns in table 'podbor_shini':
 * @property integer $id
 * @property integer $modification_id
 * @property integer $podbor_type
 * @property integer $shins_profile_width
 * @property integer $shins_profile_height
 * @property string $shins_diametr
 */
class PodborShini extends CExtendedActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'podbor_shini';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('modification_id, podbor_type', 'required'),
			array('modification_id, podbor_type, shins_profile_width, shins_profile_height', 'numerical', 'integerOnly'=>true),
			array('shins_diametr', 'length', 'max'=>11),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, modification_id, podbor_type, shins_profile_width, shins_profile_height, shins_diametr', 'safe', 'on'=>'search'),
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
			'modification_id' => 'Modification',
			'podbor_type' => 'Pobdor Type',
			'shins_profile_width' => 'Shins Profile Width',
			'shins_profile_height' => 'Shins Profile Height',
			'shins_diametr' => 'Shins Diametr',
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
		$criteria->compare('modification_id',$this->modification_id);
		$criteria->compare('podbor_type',$this->pobdor_type);
		$criteria->compare('shins_profile_width',$this->shins_profile_width);
		$criteria->compare('shins_profile_height',$this->shins_profile_height);
		$criteria->compare('shins_diametr',$this->shins_diametr,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function getShinsVariants($avto_modification_id){
        $avto_modification_id = (int)$avto_modification_id;
        $res = Yii::app()->db->createCommand()
                ->select("podbor_type, shins_profile_width, shins_profile_height, shins_diametr")
                ->from("podbor_shini")
                ->where("modification_id = {$avto_modification_id}")
                ->queryAll();
        if(count($res) == 0) return NULL;
        $get_modification = function($item){
            return $item["shins_profile_width"]."/".$item["shins_profile_height"]." R".(int)$item["shins_diametr"];
        };
        $get_link = function($item)use($get_modification, $avto_modification_id){
            $href = Yii::app()->createUrl(
                "tires/index",
                array(
                   "v" => $avto_modification_id,
                   "v3" => array((int)$item["shins_diametr"]),
                   "v5" => array((int)$item["shins_profile_height"]),
                   "v6" => array((int)$item["shins_profile_width"]),
                )
            );
            return "<a href='{$href}'>".$get_modification($item)."</a>";
        };
        $result = array();
        $variant = array_filter($res, function($v){ return $v["podbor_type"] == 1; });
        if(count($variant) > 0){
            $str = "Завод:";
            foreach($variant as $item){
               $str .= " ".$get_link($item);
            }
            $result[] = "<li style='padding-top: 10px;'>{$str}</li>";
        }
        $variant = array_filter($res, function($v){ return $v["podbor_type"] == 2; });
        if(count($variant) > 0){
            $str = "Замен:";
            foreach($variant as $item){
                $str .= " ".$get_link($item);
            }
            $result[] = "<li style='padding-top: 10px;'>{$str}</li>";
        }
        $variant = array_filter($res, function($v){ return $v["podbor_type"] == 3; });
        if(count($variant) > 0){
            $str = "Тонинг:";
            foreach($variant as $item){
                $str .= " ".$get_link($item);
            }
            $result[] = "<li style='padding-top: 10px;'>{$str}</li>";
        }
        return "<ul style='padding-top: 10px;'>".join("", $result)."</ul>";
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PodborShini the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
