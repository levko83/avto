<?php
/* @var $this PricelistController */
/* @var $model Pricelist */

$this->breadcrumbs=array(
	'Pricelists'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Pricelist', 'url'=>array('index')),
	array('label'=>'Manage Pricelist', 'url'=>array('admin')),
);
?>

<h1>Create Pricelist</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>