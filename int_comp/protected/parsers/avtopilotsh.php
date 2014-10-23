<?php

class avtopilotsh
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
        self::$data['company_id']=58;
        $this->filename=$_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'int_comp'.DIRECTORY_SEPARATOR.'protected'.DIRECTORY_SEPARATOR.'prices'.DIRECTORY_SEPARATOR.'avtopilotsh'.DIRECTORY_SEPARATOR.$filename;
        return $this->startParse();
    }


    private function startParse()
    {
        Yii::import('application.vendors.PHPExcel',true);
        $this->inputFileType = PHPExcel_IOFactory::identify($this->filename);
        $this->objReader = PHPExcel_IOFactory::createReader($this->inputFileType);
        $this->objReader->setReadDataOnly(true);
        $this->objPHPExcel = $this->objReader->load($this->filename);
        $this->lastRow=$this->objPHPExcel->getActiveSheet()->getHighestRow();
        $this->price_identity=trim($this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(0,3)->getValue());
        $this->price_identity.=trim($this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(1,3)->getValue());
        $this->price_identity=md5($this->price_identity);
        $file_hash=md5_file($this->filename);
        $price_pos=5;
        if (trim($this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(5,3)->getValue())=='Резерв')
        {
            $price_pos=6;
        }
        //$curr_con=Yii::app()->db->createCommand('SELECT currency_value FROM SC_currency_types WHERE CID=11');
        //$currency=$curr_con->queryScalar();
        //$currency_value=1/$currency;

        if ($this->price_identity=="e38a102f05a047f5a4bdf7c86e783154")
        {
            for ($r=5; $r <= $this->lastRow; $r++)
            {

                $com_prod_ident=$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(0,$r)->getValue();
                $prod_name=$com_prod_ident;
                $money_flag=null;

                $price_t=$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow($price_pos,$r)->getValue();
				$price=ceil($price_t);
                $money_flag=980;
                $final_price=$price;
                 $was1=$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(1,$r)->getValue();
                 $amount_temp1=array();
                 preg_match_all ('/(\d+)/',$was1,$amount_temp1);
                $was2=$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(2,$r)->getValue();
                $amount_temp2=array();
                preg_match_all ('/(\d+)/',$was2,$amount_temp2);
                $was3=$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(3,$r)->getValue();
                $amount_temp3=array();
                preg_match_all ('/(\d+)/',$was3,$amount_temp3);
                $was4=$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(4,$r)->getValue();
                $amount_temp4=array();
                preg_match_all ('/(\d+)/',$was4,$amount_temp4);
                 $amount=$amount_temp1[0][0]+$amount_temp2[0][0]+$amount_temp3[0][0]+$amount_temp4[0][0];

                $charge_auto=Yii::app()->settings->get('system','charge_shina');

                if ((strlen($com_prod_ident)>18)&&(strlen($price_t)>1))
                {
                    $attr=array('company_id'=>58,'com_prod_ident'=>$com_prod_ident);
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
                        $model->company_id=58;
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
            $attr=array('company_id'=>58);
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