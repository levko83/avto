<?php
/**
 * Created by PhpStorm.
 * User: Ifaliuk
 * Date: 21.12.13
 * Time: 17:11
 */

class CExtendedArrayDataProvider extends CArrayDataProvider{

    protected function fetchData()
    {
        if(($sort=$this->getSort())!==false && ($order=$sort->getOrderBy())!='')
            $this->sortData($this->getSortDirections($order));

        if(($pagination=$this->getPagination())!==false)
        {
            $pagination->setItemCount($this->getTotalItemCount());
            return $this->rawData;
        }
        else
            return $this->rawData;
    }

} 