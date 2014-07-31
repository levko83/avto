<?php
/**
 * Created by PhpStorm.
 * User: Ifaliuk
 * Date: 30.04.14
 * Time: 10:58
 */

class FilterByTires extends CBaseFilter{

    function __construct($filter = array()){
        parent::__construct("shinsIndex", $filter);
        $this->addFilterPrice("v1", "v2", "price");
        $this->addFilterItem("v3", "shins_diametr");
        $this->addFilterItem("v4", "shins_load_index_translit", "shins_load_index");
        $this->addFilterItem("v5", "shins_profile_height");
        $this->addFilterItem("v6", "shins_profile_width");
        $this->addFilterItem("v7", "shins_run_flat_technology_id");
        $this->addFilterItem("v8", "shins_season_id", "shins_season");
        $this->addFilterItem("v9", "shins_spike_id");
        $this->addFilterItem("v10", "shins_type_of_avto_id", "shins_type_of_avto");
        $this->addFilterItem("v11", "vendor_id", "vendor_name");
        $this->addCheckBoxesFields("shins_run_flat_technology_id", "shins_spike_id");
        $this->buildVocabs();
    }

}