<?php
/* @var $this ParsedProductsController */
/* @var $model ParsedProducts */

$this->breadcrumbs=array(
	/*'ParsedProducts'=>array('index'),*/
	'Управление товарами',
);

$this->menu=array(
	array('label'=>'Новые товары', 'url'=>array('showNew','company_id'=>'all')),
    array('label'=>'Товары для удаления', 'url'=>array('showDel','company_id'=>'all')),
    array('label'=>'Привязанные товары', 'url'=>array('linkProd','company_id'=>'all')),
    array('label'=>'Непривязанные товары', 'url'=>array('notLinkProd','company_id'=>'all')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#parsedProducts-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление товарами поставщиков</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'parsedProducts-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'product_id',
		'company_rel.company',
		'com_prod_ident',
		'prod_name',
		'charge_auto',
        'charge_hand',
		'final_price',
		'amount',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
