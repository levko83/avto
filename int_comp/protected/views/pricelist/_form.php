<?php
/* @var $this PricelistController */
/* @var $model Pricelist */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pricelist-form',
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>
	<?php echo $form->errorSummary($model); ?>


    <div class="row">
        <?php echo $form->hiddenField($model,'id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'excel_file'); ?>
        <?php echo $form->fileField($model,'excel_file'); ?>
        <?php echo $form->error($model,'excel_file'); ?>
    </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Обновить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->