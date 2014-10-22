<?php
/* @var $this PricelistController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Поставщики',
);

$this->menu=array(
	array('label'=>'Поиск прайса', 'url'=>array('admin')),
);
?>

<h1>Price Lists</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
    'columns'=>array(
        'company',
        'upd_date',
        'parse_class',
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
            )
    )
)); ?>
