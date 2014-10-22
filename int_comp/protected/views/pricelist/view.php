<?php
/* @var $this PricelistController */
/* @var $model Pricelist */

$this->breadcrumbs=array(
	'Pricelists'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Pricelist', 'url'=>array('index')),
	array('label'=>'Create Pricelist', 'url'=>array('create')),
	array('label'=>'Update Pricelist', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Pricelist', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Pricelist', 'url'=>array('admin')),
);
?>

<h1>View Pricelist #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'company',
		'upd_date',
		'parse_class',
	),
)); ?>
