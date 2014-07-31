<?php

/**
 * This is the model class for table "podbor_diski".
 *
 * The followings are the available columns in table 'podbor_diski':
 * @property integer $id
 * @property integer $modification_id
 * @property integer $podbor_type
 * @property string $disks_rim_width
 * @property string $disks_rim_diametr
 * @property string $disks_boom
 */
class PodborDiski extends CExtendedActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'podbor_diski';
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
			array('modification_id, podbor_type, disks_fixture_port_count', 'numerical', 'integerOnly'=>true),
			array('disks_rim_width, disks_rim_diametr, disks_boom, disks_port_position, disks_fixture_port_diametr', 'length', 'max'=>11),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, modification_id, podbor_type, disks_rim_width, disks_rim_diametr, disks_boom', 'safe', 'on'=>'search'),
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
			'podbor_type' => 'Podbor Type',
			'disks_rim_width' => 'Disks Rim Width',
			'disks_rim_diametr' => 'Disks Rim Diametr',
			'disks_boom' => 'Disks Boom',
		);
	}

    public function getDisksModifications($modification_id){
        $criteria = new CDbCriteria;
        $criteria->compare("modification_id", $modification_id);
        $criteria->limit = 500000;
        $buff = array();
        $user_empty = function(&$val){
            $val = trim($val);
            return empty($val);
        };
        foreach($this->findAll($criteria) as $row){
            $arr = array();
            if(!$user_empty($row->disks_rim_width))
                $arr["disks_rim_width"] = $row->disks_rim_width;
            if(!$user_empty($row->disks_rim_diametr))
                $arr["disks_rim_diametr"] = $row->disks_rim_diametr;
            if(!$user_empty($row->disks_boom))
                $arr["disks_boom"] = $row->disks_boom;
            if(!$user_empty($row->disks_fixture_port_count))
                $arr["disks_fixture_port_count"] = $row->disks_fixture_port_count;
            if(!$user_empty($row->disks_port_position))
                $arr["disks_port_position"] = $row->disks_port_position;
            if(!$user_empty($row->disks_fixture_port_diametr))
                $arr["disks_fixture_port_diametr"] = $row->disks_fixture_port_diametr;
            if($arr)
                $buff[$row->podbor_type][] = $arr;
        }
        return $buff;
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
		$criteria->compare('podbor_type',$this->podbor_type);
		$criteria->compare('disks_rim_width',$this->disks_rim_width,true);
		$criteria->compare('disks_rim_diametr',$this->disks_rim_diametr,true);
		$criteria->compare('disks_boom',$this->disks_boom,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PodborDiski the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
