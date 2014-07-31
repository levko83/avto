<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Ifaliuk
 * Date: 07.11.13
 * Time: 15:20
 * To change this template use File | Settings | File Templates.
 */

class CShinsProductsCheckBoxColumn extends CCheckBoxColumn{

    public $type;

    protected function renderDataCellContent($row, $data){
        $this->checkBoxHtmlOptions["prod_type"] = $data->type;
        parent::renderDataCellContent($row, $data);
    }

}