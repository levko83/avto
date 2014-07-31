<?php
/**
 * Created by PhpStorm.
 * User: Ifaliuk
 * Date: 30.04.14
 * Time: 10:58
 */

class FilterByDrives extends CBaseFilter{

    function __construct($filter = array()){
        parent::__construct("disksIndex", $filter);
        $this->addFilterPrice("v1", "v2", "price");
        $this->addFilterItem("v3", "disks_rim_diametr");
        $this->addFilterItem("v4", "disks_type_id", "disks_type");
        $this->addFilterItem("v5", "disks_rim_width");
        $this->addFilterItem("v6", "disks_port_position");
        $this->addFilterItem("v10", "disks_fixture_port_count");
        $this->addFilterItem("v7", "disks_boom");
        $this->addFilterItem("v11", "disks_color_translit", "disks_color");
        $this->addFilterItem("v12", "vendor_id", "vendor_name");
        $this->buildVocabs();
    }

}