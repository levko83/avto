<?php
    /* @var $this ParsedProductsController */
    /* @var $model SettingsForm */
    /* @var $form CActiveForm */

    $this->pageTitle=Yii::app()->name . ' - Настройки';
    $this->breadcrumbs=array(
        'Настройки',
    );
    ?>

<h1>Настройки</h1>
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'settings-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
)); ?>
    <?php echo $form->hiddenField($model,'category'); ?>
<div class="row">
    <?php echo $form->labelEx($model,'charge_disk'); ?>
    <?php echo $form->textField($model,'charge_disk',array('size'=>1)); ?>
    <?php echo $form->error($model,'charge_disk'); ?>
</div>
<div class="row">
    <?php echo $form->labelEx($model,'charge_shina'); ?>
    <?php echo $form->textField($model,'charge_shina',array('size'=>1)); ?>
    <?php echo $form->error($model,'charge_shina'); ?>
</div>
<div class="row">
    <?php echo $form->labelEx($model,'callback_email'); ?>
    <?php echo $form->textField($model,'callback_email'); ?>
    <?php echo $form->error($model,'callback_email'); ?>
</div>
<div class="row">
    <?php echo $form->labelEx($model,'currency_usd'); ?>
    <?php echo $form->textField($model,'currency_usd'); ?>
    <?php echo $form->error($model,'currency_usd'); ?>
</div>

<div class="row buttons">
    <?php echo CHtml::submitButton('Submit'); ?>
</div>

<?php $this->endWidget(); ?>