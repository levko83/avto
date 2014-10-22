<?php

class autoimidj
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
        self::$data['company_id']=21;
        $this->filename=$_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'int_comp'.DIRECTORY_SEPARATOR.'protected'.DIRECTORY_SEPARATOR.'prices'.DIRECTORY_SEPARATOR.'autoimidj'.DIRECTORY_SEPARATOR.$filename;
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
        $this->price_identity=false;
        for ($i=0;$i<4;$i++)
        {
            if (strlen(trim($this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(2,$i)->getValue()))>1)
            {
                $t_identity=trim($this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(2,$i)->getValue());
                $t_identity.=trim($this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(3,$i)->getValue());
                $t_identity=md5($t_identity);
                //var_dump($t_identity);
                if ($t_identity=='3d01998247b5e6ac6f6b085c52687c6f')
                {
                    $this->price_identity=true;
                }
            }
        }
        //$this->price_identity=trim($this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(0,2)->getValue());
        //$this->price_identity.=($this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(1,2)->getValue());
        //$this->price_identity=md5($this->price_identity);
        $file_hash=md5_file($this->filename);
        $curr_con=Yii::app()->db->createCommand('SELECT currency_value FROM SC_currency_types WHERE CID=11');
        $currency=$curr_con->queryScalar();
        $currency_value=1/$currency;
        $disk_vendor='';
        $disk_radius='';
        if ($this->price_identity==true)
        {

            for ($r=1; $r <= $this->lastRow; $r++)
            {
                if (preg_match('/Диски/',$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(1,$r)->getValue()))
                {
                    $disk_vendor=trim(substr($this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(1,$r)->getValue(),10));
                }
                if (preg_match('/дюймов|ДЮЙМОВ/',$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(1,$r)->getValue()))
                {
                    $disk_radius='R'.trim(substr($this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(1,$r)->getValue(),0,2));
                }
                $com_prod_ident=$disk_vendor.' '.$disk_radius.' '.$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(1,$r)->getValue();
                $prod_name=$com_prod_ident;
                $price=$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(3,$r)->getValue();
                $price=ceil($price/1.2);
                $was=$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(2,$r)->getValue();
                $amount_temp=array();
                preg_match_all ('/(\d+)/',$was,$amount_temp);
                $amount=$amount_temp[0][0];
                $money_flag=840;
                $final_price=$price*$currency_value;
                $final_price=ceil($final_price);
                $charge_auto=Yii::app()->settings->get('system','charge_disk');
                if ((strlen($this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(0,$r)->getValue())>0)&&(strlen($this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(1,$r)->getValue())>12))
                {
                    $attr=array('company_id'=>21,'com_prod_ident'=>$com_prod_ident);
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
                        $model->company_id=21;
                        $model->prod_name=$prod_name;
                        $model->price=$price;
                        $model->final_price=$final_price;
                        $model->money_flag=$money_flag;
                        $model->flag_upd=2;
                        $model->charge_auto=$charge_auto;
                        $model->amount=$amount;
                        $model->file_hash=$file_hash;
                        if ($model->save()) {self::$data['new_records']++;}
                        else var_dump('tr');

                    }

                }
            }
            //Помечаем старые записи
            $attr=array('company_id'=>21);
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