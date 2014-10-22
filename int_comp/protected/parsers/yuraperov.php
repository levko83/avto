<?php

class yuraperov
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

    public function __construct($filename)
    {
        self::$data=null;
        self::$data['company_id']=40;
        $this->filename=$_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'int_comp'.DIRECTORY_SEPARATOR.'protected'.DIRECTORY_SEPARATOR.'prices'.DIRECTORY_SEPARATOR.'yuraperov'.DIRECTORY_SEPARATOR.$filename;
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
        $this->price_identity=trim($this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(0,2)->getValue());
        // $this->price_identity.=($this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(1,10)->getValue());
        $this->price_identity=md5($this->price_identity);
        $file_hash=md5_file($this->filename);
        $curr_con=Yii::app()->db->createCommand('SELECT currency_value FROM SC_currency_types WHERE CID=11');
        $currency=$curr_con->queryScalar();
        $currency_value=1/$currency;
        //var_dump($this->price_identity);
        if ($this->price_identity=="acddfa5bf77e19b9dfe7f426bc2fa168")
        {
            for ($r=2; $r <= $this->lastRow; $r++)
            {
                $charge_auto=Yii::app()->settings->get('system','charge_shina');
                $com_prod_ident=trim($this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(1,$r)->getValue());
                $prod_name=$com_prod_ident;
                $price_t=$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(2,$r)->getValue();
                $price=ceil($price_t);
                $was=$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(3,$r)->getValue();
                $amount_temp=array();
                preg_match_all ('/(\d+)/',$was,$amount_temp);
                $amount=$amount_temp[0][0];
                $money_flag=980;
                $final_price=$price;
                //$final_price=ceil($final_price);
                if ((strlen($com_prod_ident)>20)&&(strlen($price_t)>1)&&round($price)!=0)
                {
                    $attr=array('company_id'=>40,'com_prod_ident'=>$com_prod_ident);
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
                        $model->company_id=40;
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

            //Пропускаем второй лист и читаем третий
            $this->objPHPExcel->setActiveSheetIndex(2);
            $this->lastRow=$this->objPHPExcel->getActiveSheet()->getHighestRow();
            for ($r=2; $r <= $this->lastRow; $r++)
            {
                $charge_auto=Yii::app()->settings->get('system','charge_shina');
                $com_prod_ident=trim($this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(1,$r)->getValue());
                $prod_name=$com_prod_ident;
                $price_t=$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(2,$r)->getValue();
                $price=ceil($price_t);
                $was=$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(3,$r)->getValue();
                $amount_temp=array();
                preg_match_all ('/(\d+)/',$was,$amount_temp);
                $amount=$amount_temp[0][0];
                $money_flag=980;
                $final_price=$price;
                //$final_price=ceil($final_price);
                if ((strlen($com_prod_ident)>20)&&(strlen($price_t)>1)&&round($price)!=0)
                {
                    $attr=array('company_id'=>40,'com_prod_ident'=>$com_prod_ident);
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
                        $model->company_id=40;
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

            //Пропускаем четвертый лист и читаем пятый
            $this->objPHPExcel->setActiveSheetIndex(4);
            $this->lastRow=$this->objPHPExcel->getActiveSheet()->getHighestRow();
            for ($r=2; $r <= $this->lastRow; $r++)
            {
                $charge_auto=Yii::app()->settings->get('system','charge_disk');
                $com_prod_ident=trim($this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(1,$r)->getValue());
                $prod_name=$com_prod_ident;
                $price_t=$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(2,$r)->getValue();
                $price=ceil($price_t);
                $was=$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(3,$r)->getValue();
                $amount_temp=array();
                preg_match_all ('/(\d+)/',$was,$amount_temp);
                $amount=$amount_temp[0][0];
                $money_flag=980;
                $final_price=$price;
                //$final_price=ceil($final_price);
                if ((strlen($com_prod_ident)>20)&&(strlen($price_t)>1)&&round($price)!=0)
                {
                    $attr=array('company_id'=>40,'com_prod_ident'=>$com_prod_ident);
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
                        $model->company_id=40;
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

            //Читаем шестой лист
            $this->objPHPExcel->setActiveSheetIndex(5);
            $this->lastRow=$this->objPHPExcel->getActiveSheet()->getHighestRow();
            for ($r=2; $r <= $this->lastRow; $r++)
            {
                $charge_auto=Yii::app()->settings->get('system','charge_disk');
                $com_prod_ident=trim($this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(1,$r)->getValue());
                $prod_name=$com_prod_ident;
                $price_t=$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(2,$r)->getValue();
                $price=ceil($price_t);
                $was=$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(3,$r)->getValue();
                $amount_temp=array();
                preg_match_all ('/(\d+)/',$was,$amount_temp);
                $amount=$amount_temp[0][0];
                $money_flag=840;
                $final_price=$price_t*$currency_value;
                $final_price=ceil($final_price);
                if ((strlen($com_prod_ident)>26)&&(strlen($price_t)>1)&&round($price)!=0)
                {
                    $attr=array('company_id'=>40,'com_prod_ident'=>$com_prod_ident);
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
                        $model->company_id=40;
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

            //Читаем седьмой лист
            $this->objPHPExcel->setActiveSheetIndex(6);
            $this->lastRow=$this->objPHPExcel->getActiveSheet()->getHighestRow();
            for ($r=2; $r <= $this->lastRow; $r++)
            {
                $charge_auto=Yii::app()->settings->get('system','charge_disk');
                $com_prod_ident=trim($this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(10,$r)->getValue().' '.$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(2,$r)->getValue().' '.$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(3,$r)->getValue().' '.$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(4,$r)->getValue().' '.$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(5,$r)->getValue().' '.$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(6,$r)->getValue());
                $prod_name=$com_prod_ident;
                $price_t=$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(8,$r)->getValue();
                $price=ceil($price_t);
                $was=$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(7,$r)->getValue();
                $amount_temp=array();
                preg_match_all ('/(\d+)/',$was,$amount_temp);
                $amount=$amount_temp[0][0];
                $money_flag=840;
                $final_price=$price_t*$currency_value;
                $final_price=ceil($final_price);
                if ((strlen($com_prod_ident)>26)&&(strlen($price_t)>1)&&round($price)!=0)
                {
                    $attr=array('company_id'=>40,'com_prod_ident'=>$com_prod_ident);
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
                        $model->company_id=40;
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

            //Читаем восьмой лист
          /*  $this->objPHPExcel->setActiveSheetIndex(7);
            $this->lastRow=$this->objPHPExcel->getActiveSheet()->getHighestRow();
            for ($r=2; $r <= $this->lastRow; $r++)
            {
                $charge_auto=16;
                $com_prod_ident=trim('Verde '.$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(2,$r)->getValue().' '.$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(3,$r)->getValue().' '.$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(4,$r)->getValue().' '.$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(5,$r)->getValue().' '.$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(6,$r)->getValue());
                $prod_name=$com_prod_ident;
                $price_t=$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(7,$r)->getValue();
                $price=round($price_t,2);
                $was=$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(7,$r)->getValue();
                $amount_temp=array();
                preg_match_all ('/(\d+)/',$was,$amount_temp);
                $amount=$amount_temp[0][0];
                //Нет поля количества
                $amount=0;
                $money_flag=840;
                $final_price=$price*$currency_value;
                $final_price=ceil($final_price);
                if ((strlen($com_prod_ident)>20)&&strlen($price_t)>1)
                {
                    $attr=array('company_id'=>40,'com_prod_ident'=>$com_prod_ident);
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
                        $model->company_id=40;
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
            } */

            //Читаем девятый лист
            $this->objPHPExcel->setActiveSheetIndex(8);
            $this->lastRow=$this->objPHPExcel->getActiveSheet()->getHighestRow();
            for ($r=2; $r <= $this->lastRow; $r++)
            {
                $charge_auto=Yii::app()->settings->get('system','charge_disk');
                $com_prod_ident=trim('Replica '.$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(2,$r)->getValue().' '.$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(3,$r)->getValue().' '.$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(4,$r)->getValue().' '.$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(5,$r)->getValue().' '.$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(6,$r)->getValue());
                $prod_name=$com_prod_ident;
                $price_t=$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(8,$r)->getValue();
                $price=ceil($price_t);
                $was=$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(7,$r)->getValue();
                $amount_temp=array();
                preg_match_all ('/(\d+)/',$was,$amount_temp);
                $amount=$amount_temp[0][0];
                $money_flag=840;
                $final_price=$price_t*$currency_value;
                $final_price=ceil($final_price);
                if ((strlen($com_prod_ident)>26)&&(strlen($price_t)>1)&&round($price)!=0)
                {
                    $attr=array('company_id'=>40,'com_prod_ident'=>$com_prod_ident);
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
                        $model->company_id=40;
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
            $attr=array('company_id'=>40);
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