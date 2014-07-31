<?php
/* @var $this PricelistController */
/* @var $model Pricelist */

$this->breadcrumbs=array(
	'Поставщики'=>array('index'),
	'Поиск',
);

$this->menu=array(
	array('label'=>'Список прайсов', 'url'=>array('index')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#pricelist-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Поиск прайса</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pricelist-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'company',
		'upd_date',
		array(
			'class'=>'CButtonColumn',
            'buttons'=>array(
                'update'=>array(
                    'label'=>'Update',

                ),
                'delete'=>array(
                    'visible'=>'false',

                ),
                'view'=>array(
                    'visible'=>'false',

                ),
            ),
		),
	),
)); ?>
