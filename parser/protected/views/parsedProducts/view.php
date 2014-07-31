<?php
/* @var $this ParsedProductsController */
/* @var $model ParsedProducts */

$this->breadcrumbs=array(
	'Управление товарами'=>array('admin'),
	$model->prod_name,
);

$this->menu=array(
	/*array('label'=>'List Parsedproducts', 'url'=>array('index')),*/
	array('label'=>'Изменить', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Управление товарами', 'url'=>array('admin')),
);
?>

<h1><?php echo $model->prod_name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'product_id',
		'company_id',
		'com_prod_ident',
		'prod_name',
		'price',
        'charge_auto',
        'charge_hand',
        'amount',
		'money_flag',
		'final_price',
		'flag_upd',
	),
)); ?>
