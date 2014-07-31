<?php
/* @var $this ParsedproductsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'ParsedProducts',
);

$this->menu=array(
	array('label'=>'Manage Parsedproducts', 'url'=>array('admin')),
);
?>

<h1>Parsedproducts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
