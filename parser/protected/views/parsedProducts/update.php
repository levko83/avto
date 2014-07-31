<?php
/* @var $this ParsedProductsController */
/* @var $model ParsedProducts */
/* @var $shopProducts Products */

$this->breadcrumbs=array(
	'Управление товарами поставщика'=>array('admin'),
	$model->prod_name,
	'Изменить',
);

$this->menu=array(
	/*array('label'=>'List Parsedproducts', 'url'=>array('index')),
	array('label'=>'Просмотр товаров', 'url'=>array('view', 'id'=>$model->id)),*/
	array('label'=>'Управление товарами', 'url'=>array('admin')),
);
?>

<h1>Изменить <?php echo $model->prod_name; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'shopProducts'=>$shopProducts)); ?>