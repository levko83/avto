<?php

/**
 * This is the model class for table "{{pricelist}}".
 *
 * The followings are the available columns in table '{{pricelist}}':
 * @property integer $id
 * @property string $company
 * @property string $upd_date
 * @property string $parse_class
 */
class Pricelist extends CActiveRecord
{

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Pricelist the static model class
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
		return '{{pricelist}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('company, upd_date, parse_class', 'required'),
			array('company', 'length', 'max'=>255),
			array('parse_class', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, company, upd_date, parse_class', 'safe', 'on'=>'search'),
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
			'company' => 'Поставщик',
			'upd_date' => 'Дата обновления',
			'parse_class' => 'Parse Class',
            'excel_file' => 'Выберите файл'
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

		$criteria->compare('id',$this->id);
		$criteria->compare('company',$this->company,true);
		$criteria->compare('upd_date',$this->upd_date,true);
		$criteria->compare('parse_class',$this->parse_class,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'pagination'=>array(
                'pageSize'=>50,
            ),
		));
	}

    public function beforeSave()
    {
        $return=parent::beforeSave();
        if(!$return) return $return;

        $file=CUploadedFile::getInstance($this, "excel_file");
        if ($file->type == 'application/vnd.ms-excel')
        {
            $file_directory=$_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'int_comp'.DIRECTORY_SEPARATOR.'protected'.DIRECTORY_SEPARATOR.'prices'.DIRECTORY_SEPARATOR.$this->parse_class.DIRECTORY_SEPARATOR;
            $filename=date("Y_m_d").'.xls';
            self::clear_dir($file_directory);
            $file->saveAs($file_directory.$filename);
            if ($this->parsingFile($filename,$this->parse_class))
            {
                $this->upd_date=new CDbExpression("NOW()");

            }
            else
            {
                unlink($file_directory.$filename);
                throw new CHttpException("Processing error");
            }
        }
        else
        {
            throw new CHttpException("Invalid file type");
            $return=false;
        };

        return $return;

    }

    protected function myscandir($dir)
    {
        $list = scandir($dir);
        unset($list[0],$list[1]);
        return array_values($list);
    }

    protected function clear_dir($dir)
    {
        $list = self::myscandir($dir);
        foreach($list as $file)
        {
          if($file != ".gitignore"){
            unlink($dir.$file);
          }
        }
    }

    public function parsingFile($file,$parse_class)
    {

        require_once($_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'int_comp'.DIRECTORY_SEPARATOR.'protected'.DIRECTORY_SEPARATOR.'parsers'.DIRECTORY_SEPARATOR.$parse_class.'.php');
        $parseObj=new $parse_class($file);
        return $parseObj->result;
    }
}