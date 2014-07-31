<?php

class autodel
{
    protected static $data;

    static function getInfo(){
        return self::$data;
    }

    private $filename;
    public $result;
    private $inputFileType;
    private $objReader;
    private $objPHPExcel;
    public $lastRow;
    public $lastColumn;
    public $price_identity;
    public $EUR;

    public function __construct($filename)
    {
        self::$data=null;
        self::$data['company_id']=20;
        $this->filename=$_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'parser'.DIRECTORY_SEPARATOR.'protected'.DIRECTORY_SEPARATOR.'prices'.DIRECTORY_SEPARATOR.'autodel'.DIRECTORY_SEPARATOR.$filename;
        return $this->startParse();
    }


    private function startParse()
    {
        Yii::import('application.vendors.PHPExcel',true);
        $this->inputFileType = PHPExcel_IOFactory::identify($this->filename);
        $this->objReader = PHPExcel_IOFactory::createReader($this->inputFileType);
        $this->objReader->setReadDataOnly(true);
        $this->objPHPExcel = $this->objReader->load($this->filename);
        $this->objPHPExcel->setActiveSheetIndex(0);
        $this->lastRow=$this->objPHPExcel->getActiveSheet()->getHighestRow();
        $this->lastRow=$this->objPHPExcel->getActiveSheet()->getHighestRow();
        $this->price_identity=false;
        for ($i=0;$i<5;$i++)
        {
            if (strlen(trim($this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(0,$i)->getValue()))>1)
            {
                $t_identity=trim($this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(0,$i)->getValue());
                $t_identity.=trim($this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(1,$i)->getValue());
                $t_identity=md5($t_identity);
                if ($t_identity=='ff1377e3b560542a4e99c000df0e89b3')
                {
                    $this->price_identity=true;
                }
            }
        }
        //$this->price_identity=trim($this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(0,7)->getValue());
        //$this->price_identity.=($this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(1,2)->getValue());
        //$this->price_identity=md5($this->price_identity);
        $file_hash=md5_file($this->filename);
        //$curr_con=Yii::app()->db->createCommand('SELECT currency_value FROM SC_currency_types WHERE CID=11');
        // $currency=$curr_con->queryScalar();
        //$currency_value=1/$currency;
        $z=0;
        if ($this->price_identity==true)
        {
            for ($r=5; $r <= $this->lastRow; $r++)
            {
                $com_prod_ident=$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(1,$r)->getValue();
                $prod_name=$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(0,$r)->getValue().' '.$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(2,$r)->getValue();
                $price_t=$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(5,$r)->getCalculatedValue();
				$price=ceil($price_t);
                $was=$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(3,$r)->getValue();
                $amount_temp=array();
                preg_match_all ('/(\d+)/',$was,$amount_temp);
                $amount=$amount_temp[0][0];
                $money_flag=980;
                //$final_price=$price*$currency_value;
                $final_price=$price;
                //$final_price=ceil($price);
                $charge_auto=Yii::app()->settings->get('system','charge_shina');
                if ((strlen($prod_name)>20)&&(strlen($price_t)>1))
                {
                    if ($z==0)
                    {
                        $this->EUR=trim(substr(trim($this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(5,3)->getValue()),9));
                    }
                    $z++;
                    $attr=array('company_id'=>20,'com_prod_ident'=>$com_prod_ident);
                    $DBmodel=ParsedProducts::model()->findByAttributes($attr);
                    if ($DBmodel)
                    {

                        if ($DBmodel->file_hash!==$file_hash)
                        {
                            $DBmodel->file_hash=$file_hash;
                            $DBmodel->flag_upd=1;
                            self::$data['upd_records']++;
                            if($DBmodel->amount!==$amount)
                            {
                                $DBmodel->amount=$amount;
                            }
                            if($DBmodel->price!==$price)
                            {
                                $DBmodel->price=$price;
                            }
                            if($DBmodel->charge_auto!==$charge_auto)
                            {
                                $DBmodel->charge_auto=$charge_auto;
                            }
                            if($DBmodel->final_price!==$final_price)
                            {
                                $DBmodel->final_price=$final_price;
                            }
                            $DBmodel->save();

                        }

                    }
                    else
                    {
                        //Делаем новые записи
                        $model=new ParsedProducts;
                        $model->product_id='';
                        $model->com_prod_ident=$com_prod_ident;
                        $model->company_id=20;
                        $model->prod_name=$prod_name;
                        $model->price=$price;
                        $model->final_price=$final_price;
                        $model->money_flag=$money_flag;
                        $model->flag_upd=2;
                        $model->charge_auto=$charge_auto;
                        $model->amount=$amount;
                        $model->file_hash=$file_hash;
                        if ($model->save()) self::$data['new_records']++;
                    }

                }
            }

            //Читаем второй лист
            $this->objPHPExcel->setActiveSheetIndex(1);
            $this->lastRow=$this->objPHPExcel->getActiveSheet()->getHighestRow();
            for ($r=5; $r <= $this->lastRow; $r++)
            {
                $com_prod_ident=$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(1,$r)->getValue();
                $prod_name=$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(0,$r)->getValue().' '.$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(2,$r)->getValue();
                $price_t=$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(5,$r)->getCalculatedValue();
				$price=ceil($price_t);
                $was=$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(3,$r)->getValue();
                $amount_temp=array();
                preg_match_all ('/(\d+)/',$was,$amount_temp);
                $amount=$amount_temp[0][0];
                $money_flag=980;
                //$final_price=$price*$currency_value;
                $final_price=$price;
                $charge_auto=Yii::app()->settings->get('system','charge_shina');
                if ((strlen($prod_name)>20)&&(strlen($price)>1))
                {
                    $attr=array('company_id'=>20,'com_prod_ident'=>$com_prod_ident);
                    $DBmodel=ParsedProducts::model()->findByAttributes($attr);
                    if ($DBmodel)
                    {

                        if ($DBmodel->file_hash!==$file_hash)
                        {
                            $DBmodel->file_hash=$file_hash;
                            $DBmodel->flag_upd=1;
                            self::$data['upd_records']++;
                            if($DBmodel->amount!==$amount)
                            {
                                $DBmodel->amount=$amount;
                            }
                            if($DBmodel->price!==$price)
                            {
                                $DBmodel->price=$price;
                            }
                            if($DBmodel->charge_auto!==$charge_auto)
                            {
                                $DBmodel->charge_auto=$charge_auto;
                            }
                            if($DBmodel->final_price!==$final_price)
                            {
                                $DBmodel->final_price=$final_price;
                            }
                            $DBmodel->save();

                        }

                    }
                    else
                    {
                        //Делаем новые записи
                        $model=new ParsedProducts;
                        $model->product_id='';
                        $model->com_prod_ident=$com_prod_ident;
                        $model->company_id=20;
                        $model->prod_name=$prod_name;
                        $model->price=$price;
                        $model->final_price=$final_price;
                        $model->money_flag=$money_flag;
                        $model->flag_upd=2;
                        $model->charge_auto=$charge_auto;
                        $model->amount=$amount;
                        $model->file_hash=$file_hash;
                        if ($model->save()) self::$data['new_records']++;
                    }

                }
            }

            //Читаем третий лист
            $this->objPHPExcel->setActiveSheetIndex(2);
            $this->lastRow=$this->objPHPExcel->getActiveSheet()->getHighestRow();
            for ($r=5; $r <= $this->lastRow; $r++)
            {
                $com_prod_ident=$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(0,$r)->getValue();
                //$com_prod_ident=trim(substr(trim($com_prod_ident_t),8));
                $prod_name=$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(1,$r)->getValue().' '.$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(2,$r)->getValue();
                $price_t=$this->EUR*$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(4,$r)->getValue();
                $price=ceil($price_t);
                $was=$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(3,$r)->getValue();
                $amount_temp=array();
                preg_match_all ('/(\d+)/',$was,$amount_temp);
                $amount=$amount_temp[0][0];
                $money_flag=980;
                //$final_price=$price*$currency_value;
                $final_price=$price;
                $charge_auto=Yii::app()->settings->get('system','charge_disk');
                if ((strlen($prod_name)>14)&&(strlen($price)>1))
                {
                    $attr=array('company_id'=>20,'com_prod_ident'=>$com_prod_ident);
                    $DBmodel=ParsedProducts::model()->findByAttributes($attr);
                    if ($DBmodel)
                    {

                        if ($DBmodel->file_hash!==$file_hash)
                        {
                            $DBmodel->file_hash=$file_hash;
                            $DBmodel->flag_upd=1;
                            self::$data['upd_records']++;
                            if($DBmodel->amount!==$amount)
                            {
                                $DBmodel->amount=$amount;
                            }
                            if($DBmodel->price!==$price)
                            {
                                $DBmodel->price=$price;
                            }
                            if($DBmodel->charge_auto!==$charge_auto)
                            {
                                $DBmodel->charge_auto=$charge_auto;
                            }
                            if($DBmodel->final_price!==$final_price)
                            {
                                $DBmodel->final_price=$final_price;
                            }
                            $DBmodel->save();

                        }

                    }
                    else
                    {
                        //Делаем новые записи
                        $model=new ParsedProducts;
                        $model->product_id='';
                        $model->com_prod_ident=$com_prod_ident;
                        $model->company_id=20;
                        $model->prod_name=$prod_name;
                        $model->price=$price;
                        $model->final_price=$final_price;
                        $model->money_flag=$money_flag;
                        $model->flag_upd=2;
                        $model->charge_auto=$charge_auto;
                        $model->amount=$amount;
                        $model->file_hash=$file_hash;
                        if ($model->save()) self::$data['new_records']++;
                    }

                }
            }

            //Читаем четвертый лист
            $this->objPHPExcel->setActiveSheetIndex(3);
            $this->lastRow=$this->objPHPExcel->getActiveSheet()->getHighestRow();
            for ($r=5; $r <= $this->lastRow; $r++)
            {
                $com_prod_ident=$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(1,$r)->getValue();
                //$com_prod_ident=trim(substr(trim($com_prod_ident_t),8));
                $prod_name=$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(2,$r)->getValue();
                $price_t=$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(5,$r)->getCalculatedValue();
                $price=ceil($price_t);
                $was=$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(3,$r)->getValue();
                $amount_temp=array();
                preg_match_all ('/(\d+)/',$was,$amount_temp);
                $amount=$amount_temp[0][0];
                $money_flag=980;
                //$final_price=$price*$currency_value;
                $final_price=ceil($price);
                $charge_auto=Yii::app()->settings->get('system','charge_disk');
                if ((strlen($prod_name)>14)&&(strlen($price)>1))
                {
                    $attr=array('company_id'=>20,'com_prod_ident'=>$com_prod_ident);
                    $DBmodel=ParsedProducts::model()->findByAttributes($attr);
                    if ($DBmodel)
                    {

                        if ($DBmodel->file_hash!==$file_hash)
                        {
                            $DBmodel->file_hash=$file_hash;
                            $DBmodel->flag_upd=1;
                            self::$data['upd_records']++;
                            if($DBmodel->amount!==$amount)
                            {
                                $DBmodel->amount=$amount;
                            }
                            if($DBmodel->price!==$price)
                            {
                                $DBmodel->price=$price;
                            }
                            if($DBmodel->charge_auto!==$charge_auto)
                            {
                                $DBmodel->charge_auto=$charge_auto;
                            }
                            if($DBmodel->final_price!==$final_price)
                            {
                                $DBmodel->final_price=$final_price;
                            }
                            $DBmodel->save();

                        }

                    }
                    else
                    {
                        //Делаем новые записи
                        $model=new ParsedProducts;
                        $model->product_id='';
                        $model->com_prod_ident=$com_prod_ident;
                        $model->company_id=20;
                        $model->prod_name=$prod_name;
                        $model->price=$price;
                        $model->final_price=$final_price;
                        $model->money_flag=$money_flag;
                        $model->flag_upd=2;
                        $model->charge_auto=$charge_auto;
                        $model->amount=$amount;
                        $model->file_hash=$file_hash;
                        if ($model->save()) self::$data['new_records']++;
                    }

                }
            }
            //Помечаем старые записи
            $attr=array('company_id'=>20);
            $criteria=new CDbCriteria();
            $criteria->condition='file_hash <>"'.$file_hash.'" AND flag_upd <> 0';
            $criteria->limit=-1;
            //$criteria->condition='flag_upd !=0';
            $DBmodel=ParsedProducts::model()->findAllByAttributes($attr,$criteria);
            foreach($DBmodel as $record)
            {
                $record->flag_upd=0;
                if ($record->save()) self::$data['del_records']++;
            };

            //Конец проверки старых записей
            return $this->result=true;
        }
        else
            return $this->result=false;

    }
}

?>