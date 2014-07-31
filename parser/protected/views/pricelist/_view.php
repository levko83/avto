<?php
/* @var $this PricelistController */
/* @var $data Pricelist */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('company')); ?>:</b>
	<?php echo CHtml::encode($data->company); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('upd_date')); ?>:</b>
	<?php echo CHtml::encode($data->upd_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parse_class')); ?>:</b>
	<?php echo CHtml::encode($data->parse_class); ?>
	<br />


</div>