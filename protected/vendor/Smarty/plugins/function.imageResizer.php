<?php
/**
 * Allows to generate links using CHtml::link().
 *
 * Syntax:
 * {imageResizer product_type="tire" imageName="335.jpg" width=100 height=200}
 * @param array $params
 * @param Smarty $smarty
 * @return string
 */
function smarty_function_imageResizer($params, &$smarty){
    if(empty($params['product_type'])){
        throw new CException("Function 'product_type' parameter should be specified.");
    }
    if($params['product_type'] != "tire" and
       $params['product_type'] != "drive" and
       $params['product_type'] != "vendor" and
       $params['product_type'] != "shins_vendor" and
       $params['product_type'] != "disks_vendor"
    ){
        throw new CException("Parameter 'product_type' should be 'tire' or 'drive' or 'vendor'");
    }
    if(empty($params['imageName'])){
        $imagesPath = Yii::getPathOfAlias("webroot.images");
        return "/images/".HtmlHelper::resizeImage("no_photo.jpg", (int)$params['width'], (int)$params['height'], $imagesPath);
    }
    if(empty($params['width'])){
        throw new CException("Function 'width' parameter should be specified.");
    }
    if(empty($params['height'])){
        throw new CException("Function 'height' parameter should be specified.");
    }
    if($params["product_type"] == "tire"){
        $imagesPath = Yii::getPathOfAlias("webroot.images.products.shins");
        $url = "/images/products/shins";
    }elseif($params["product_type"] == "drive"){
        $imagesPath = Yii::getPathOfAlias("webroot.images.products.disks");
        $url = "/images/products/disks";
    }elseif($params["product_type"] == "vendor"){
        $imagesPath = Yii::getPathOfAlias("webroot.images.vendors");
        $url = "/images/vendors";
    }elseif($params["product_type"] == "shins_vendor"){
        $imagesPath = Yii::getPathOfAlias("webroot.images.tires_vendors");
        $url = "/images/tires_vendors";
    }elseif($params["product_type"] == "disks_vendor"){
        $imagesPath = Yii::getPathOfAlias("webroot.images.drives_vendors");
        $url = "/images/drives_vendors";
    }
    try{
        return $url."/".HtmlHelper::resizeImage($params['imageName'], (int)$params['width'], (int)$params['height'], $imagesPath);
    }catch(Exception $e){
        $imagesPath = Yii::getPathOfAlias("webroot.images");
        return "/images/".HtmlHelper::resizeImage("no_photo.jpg", (int)$params['width'], (int)$params['height'], $imagesPath);
    }
}
