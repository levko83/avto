<?php

class master
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
        self::$data['company_id']=36;
        $this->filename=$_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'int_comp'.DIRECTORY_SEPARATOR.'protected'.DIRECTORY_SEPARATOR.'prices'.DIRECTORY_SEPARATOR.'master'.DIRECTORY_SEPARATOR.$filename;
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
        $this->price_identity=trim($this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(1,1)->getValue());
        $this->price_identity.=($this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(2,1)->getValue());
        $this->price_identity=md5($this->price_identity);
        $file_hash=md5_file($this->filename);
        $curr_con=Yii::app()->db->createCommand('SELECT currency_value FROM SC_currency_types WHERE CID=11');
        $currency=$curr_con->queryScalar();
        $currency_value=1/$currency;
        if ($this->price_identity=="9ae7771ee05644ea7c1a2616cab98944")
        {
            for ($r=2; $r <= $this->lastRow; $r++)
            {
                $com_prod_ident=$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(18,$r)->getValue();
                $prod_name=$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(1,$r)->getValue().' '.$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(4,$r)->getValue().' '.$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(3,$r)->getValue().' '.$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(12,$r)->getValue();
                $price_temp=$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(13,$r)->getValue();
                $was1=$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(16,$r)->getValue();
                $amount_temp1=array();
                preg_match_all ('/(\d+)/',$was1,$amount_temp1);
                $was2=$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(17,$r)->getValue();
                $amount_temp2=array();
                preg_match_all ('/(\d+)/',$was2,$amount_temp2);
                if ($amount_temp2[0][0]=='') $amount_temp2[0][0]==0;
                if ($amount_temp1[0][0]=='') $amount_temp1[0][0]==0;
                $amount=$amount_temp2[0][0]+$amount_temp1[0][0];
                $money_flag=840;
                $price=ceil($price_temp);
                $final_price=ceil($price_temp*$currency_value);
                $charge_auto=Yii::app()->settings->get('system','charge_disk');
                if ((strlen($prod_name)>14))
                {
                    $attr=array('company_id'=>36,'com_prod_ident'=>$com_prod_ident);
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
                        $model->company_id=36;
                        $model->prod_name=$prod_name;
                        $model->price=0;
                        $model->final_price=0;
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
            $attr=array('company_id'=>36);
            $criteria=new CDbCriteria();
            $criteria->condition='file_hash <>"'.$file_hash.'" AND flag_upd <> 0';
            $criteria->limit=-1;
            //$criteria->condition='flag_upd <> 0';
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