<?php
/**
 * Created by PhpStorm.
 * User: Ifaliuk
 * Date: 29.04.14
 * Time: 10:56
 */

require_once __DIR__."/../../components/FilterTires.php";

class FilterTiresTest extends PHPUnit_Framework_TestCase{

    /**
     * @dataProvider fixtureCreateUrl
     */
    public function testCreateUrl($filter, $item, $key_field, $urlParam, $result){
        $filterTires = new FilterTires($filter);
        return $this->assertEquals(
            $filterTires->getUrlForFilter($key_field, $item, $urlParam),
            $result
        );
    }

    public function fixtureCreateUrl(){
        return array(
            array(
                array("v3" => [12, 14]),
                array(
                    "shins_diametr" => 12,
                    "count(*)" => 153,
                    "w1" => 1,
                    "@groupby" => 1094713344,
                    "@count" => 153,
                ),
                "shins_diametr",
                "shins_diametr",
                "/shini.html"
            )
        );
    }

} 