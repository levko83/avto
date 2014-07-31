<?php
Yii::import('application.vendors.PHPExcel',true);
class chunkReadFilter implements PHPExcel_Reader_IReadFilter
{
    private $_startRow = 0;
    private $_endRow = 0;

    /**  Set the list of rows that we want to read  */
    public function setRows($startRow, $chunkSize) {
        $this->_startRow    = $startRow;
        $this->_endRow      = $startRow + $chunkSize;
    }

    public function readCell($column, $row, $worksheetName = '') {
        //  Only read the heading row, and the rows that are configured in $this->_startRow and $this->_endRow
        if (($row == 1) || ($row >= $this->_startRow && $row < $this->_endRow)) {
            return true;
        }
        return false;
    }
}

class avtosport
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
        self::$data['company_id']=24;
        $this->filename=$_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'parser'.DIRECTORY_SEPARATOR.'protected'.DIRECTORY_SEPARATOR.'prices'.DIRECTORY_SEPARATOR.'avtosport'.DIRECTORY_SEPARATOR.$filename;
        return $this->startParse();
    }


    private function startParse()
    {
        //Yii::import('application.vendors.PHPExcel',true);
        $this->inputFileType = PHPExcel_IOFactory::identify($this->filename);
        $this->objReader = PHPExcel_IOFactory::createReader($this->inputFileType);
        $this->objReader->setReadDataOnly(true);
        $chunkFilter = new ChunkReadFilter();
        $this->objReader->setReadFilter($chunkFilter);
        $this->objPHPExcel = $this->objReader->load($this->filename);
        $chunk_size=800;
        $highest_row=20000;
        $file_hash=md5_file($this->filename);
        $first_page=true;
        $this->price_identity=false;
        //$this->lastRow=$this->objPHPExcel->getActiveSheet()->getHighestRow();
        $curr_con=Yii::app()->db->createCommand('SELECT currency_value FROM SC_currency_types WHERE CID=11');
        $currency=$curr_con->queryScalar();
        $currency_value=1/$currency;
        //echo $this->lastRow;
            for ($startRow = 2; $startRow <= $highest_row; $startRow += $chunk_size)
            {
                $chunkFilter->setRows($startRow, $chunk_size);
                $this->objPHPExcel = $this->objReader->load($this->filename);
                for($r = $startRow ; $r <= $startRow + $chunk_size; $r++)
                    {
                        $com_prod_ident=$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(0,$r)->getValue().' '.$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(2,$r)->getValue().' '.$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(3,$r)->getValue().' '.$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(1,$r)->getValue();
                        $prod_name=$com_prod_ident;
                        $price_t=$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(5,$r)->getValue();
						$price=ceil($price_t);
                        $was=$this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow(4,$r)->getValue();
                        $amount_temp=array();
                        preg_match_all ('/(\d+)/',$was,$amount_temp);
                        $amount=$amount_temp[0][0];
                        $money_flag=840;
                        $final_price=$price_t*$currency_value;
                        $final_price=ceil($final_price);
                        $charge_auto=Yii::app()->settings->get('system','charge_shina');
                        if (!(strlen($com_prod_ident)<18))
                        {
                            $attr=array('company_id'=>24,'com_prod_ident'=>$com_prod_ident);
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
                                //echo $r.' '.$prod_name.'<br>';
                                $model=new ParsedProducts;
                                $model->product_id='';
                                $model->com_prod_ident=$com_prod_ident;
                                $model->company_id=24;
                                $model->prod_name=$prod_name;
                                $model->price=$price;
                                $model->final_price=$final_price;
                                $model->money_flag=$money_flag;
                                $model->flag_upd=2;
                                $model->charge_auto=Yii::app()->settings->get('system','charge_shina');
                                $model->amount=$amount;
                                $model->file_hash=$file_hash;
                                if ($model->save()) self::$data['new_records']++;
                            }

                        }
                    }


            }


            //Помечаем старые записи
            $attr=array('company_id'=>24);
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
        //else
         //   return $this->result=false;


}

?>