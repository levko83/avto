<?php
/* @var $this ParsedproductsController */
/* @var $data Parsedproducts */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('product_id')); ?>:</b>
	<?php echo CHtml::encode($data->product_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('company_id')); ?>:</b>
	<?php echo CHtml::encode($data->company_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('com_prod_ident')); ?>:</b>
	<?php echo CHtml::encode($data->com_prod_ident); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prod_name')); ?>:</b>
	<?php echo CHtml::encode($data->prod_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('money_flag')); ?>:</b>
	<?php echo CHtml::encode($data->money_flag); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('final_price')); ?>:</b>
	<?php echo CHtml::encode($data->final_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('flag_upd')); ?>:</b>
	<?php echo CHtml::encode($data->flag_upd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('flag_delete')); ?>:</b>
	<?php echo CHtml::encode($data->flag_delete); ?>
	<br />

	*/ ?>

</div>