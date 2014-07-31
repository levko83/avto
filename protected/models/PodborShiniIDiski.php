<?php

/**
 * This is the model class for table "podbor_shini_i_diski".
 *
 * The followings are the available columns in table 'podbor_shini_i_diski':
 * @property integer $id
 * @property string $vendor
 * @property string $car
 * @property string $year
 * @property string $modification
 * @property string $pcd
 * @property string $diametr
 * @property string $gaika
 * @property string $zavod_shini
 * @property string $zamen_shini
 * @property string $tuning_shini
 * @property string $zavod_diskov
 * @property string $zamen_diskov
 * @property string $tuning_diski
 * @property integer $model_id
     * @property integer $modification_id
 */
class PodborShiniIDiski extends CExtendedActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'podbor_shini_i_diski';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('vendor, car, year, modification, pcd, diametr, gaika, zavod_shini, zamen_shini, tuning_shini, zavod_diskov, zamen_diskov, tuning_diski', 'required'),
			array('model_id, modification_id', 'numerical', 'integerOnly'=>true),
			array('vendor, car, year, modification, pcd, diametr, gaika, zavod_shini, zamen_shini, tuning_shini, zavod_diskov, zamen_diskov, tuning_diski', 'length', 'max'=>300),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, vendor, car, year, modification, pcd, diametr, gaika, zavod_shini, zamen_shini, tuning_shini, zavod_diskov, zamen_diskov, tuning_diski, model_id, modification_id', 'safe', 'on'=>'search'),
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
			'vendor' => 'Vendor',
			'car' => 'Car',
			'year' => 'Year',
			'modification' => 'Modification',
			'pcd' => 'Pcd',
			'diametr' => 'Diametr',
			'gaika' => 'Gaika',
			'zavod_shini' => 'Zavod Shini',
			'zamen_shini' => 'Zamen Shini',
			'tuning_shini' => 'Tuning Shini',
			'zavod_diskov' => 'Zavod Diskov',
			'zamen_diskov' => 'Zamen Diskov',
			'tuning_diski' => 'Tuning Diski',
			'model_id' => 'Model',
			'modification_id' => 'Modification',
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
		$criteria->compare('vendor',$this->vendor,true);
		$criteria->compare('car',$this->car,true);
		$criteria->compare('year',$this->year,true);
		$criteria->compare('modification',$this->modification,true);
		$criteria->compare('pcd',$this->pcd,true);
		$criteria->compare('diametr',$this->diametr,true);
		$criteria->compare('gaika',$this->gaika,true);
		$criteria->compare('zavod_shini',$this->zavod_shini,true);
		$criteria->compare('zamen_shini',$this->zamen_shini,true);
		$criteria->compare('tuning_shini',$this->tuning_shini,true);
		$criteria->compare('zavod_diskov',$this->zavod_diskov,true);
		$criteria->compare('zamen_diskov',$this->zamen_diskov,true);
		$criteria->compare('tuning_diski',$this->tuning_diski,true);
		$criteria->compare('model_id',$this->model_id);
		$criteria->compare('modification_id',$this->modification_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function getShinsArray($avto_modisication_id){
        $arr = array();
        $criteria = new CDbCriteria();
        $criteria->compare("modification_id", (int)$avto_modisication_id);
        $item = $this->find($criteria);
        if($item){
           $str = trim($item->zavod_shini);
           $zavod = str_replace("#", "|", $str);
           $arr = explode("|", $zavod);
           $str = trim($item->zamen_shini);
           $zamen = str_replace("#", "|", $str);
           $arr = CMap::mergeArray($arr, explode("|", $zamen));
           $str = trim($item->tuning_shini);
           $tuning = str_replace("#", "|", $str);
           $arr = CMap::mergeArray($arr, explode("|", $tuning));
        }
        foreach($arr as $i => $item){
            if($item == "")
                unset($arr[$i]);
        }
        return $arr;
    }

    public function getDisksArray(){
        PodborDiski::model()->deleteAll();
        $criteria = new CDbCriteria();
//        $criteria->limit = 30;
        foreach($this->findAll($criteria) as $item){
            $arr = array();
            $str = trim($item->zavod_diskov);
            $zavod = str_replace("#", "|", $str);
            $arr[1] = explode("|", $zavod);
            $str = trim($item->zamen_diskov);
            $zamen = str_replace("#", "|", $str);
            $arr[2] = explode("|", $zamen);
            $str = trim($item->tuning_diski);
            $tuning = str_replace("#", "|", $str);
            $arr[3] = explode("|", $tuning);
            $reg = "/^(\d+[,\.]?\d*)x(\d+[,\.]?\d*)\sET(\d+[,\.]?\d*)$/";
            $model = new PodborDiski();
            $modif_id = $item->modification_id;
            foreach($arr as $i => &$types){
                foreach($types as $j => $item){
                    if($item == "")
                        unset($types[$j]);
                    else{
                        $item = str_replace(",", ".", $item);
                        $item = str_replace(" х ", "x", $item);
                        $item = str_replace(" x ", "x", $item);
                        preg_match($reg, $item, $matches);
                        if(count($matches) == 4){
                            $model->unsetAttributes();
                            $model->setIsNewRecord(true);
                            $model->modification_id = $modif_id;
                            $model->podbor_type = $i;
                            $model->disks_rim_width = $matches[1];
                            $model->disks_rim_diametr = $matches[2];
                            $model->disks_boom = $matches[3];
                            $model->save();
                        }
                        //$types[$j] = $item;
                    }
                }
            }
        }
        echo "Suxx...";
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PodborShiniIDiski the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
