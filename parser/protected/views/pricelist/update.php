<?php
/* @var $this PricelistController */
/* @var $model Pricelist */

$this->menu=array(
	array('label'=>'Список прайсов', 'url'=>array('index')),
	array('label'=>'Поиск прайса', 'url'=>array('admin')),
);
?>

<h1>Обновить прайс поставщика <?php echo $model->company; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>