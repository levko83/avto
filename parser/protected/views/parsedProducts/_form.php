<?php
/* @var $this ParsedProductsController */
/* @var $model ParsedProducts */
/* @var $shopProducts Products */
/* @var $form CActiveForm */
?>

<div class="form" onsubmit="selectedRows();">
<script type="text/javascript">
    $(document).ready(function(){
        $("#pp-grid input[type*=checkbox]").live(
            "click",
            function(){
                if($(this).prop("checked") == true){
                   var v = $(this).val();
                   $("#checked_prod_id").val(v);
                   $("#checked_prod_type").val($(this).attr("prod_type"));
                }else{
                    $("#checked_prod_id").removeAttr('value');
                    $("#checked_prod_type").removeAttr('value');
                }
            }
        );
    });
    function selectedRows()
    {
        var b=jQuery('#checked_prod_id');
        if (!(b.val().length>2))
        {
            var a=jQuery('input[type*="checkbox"]:checked').val();
            b.val(a);
            jQuery('#checked_prod_type').val(a.attr('prod_type'));
        }
    }

</script>
<?php

    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'parsedProducts-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'product_id'); ?>
		<?php echo $model->product_id;/*$form->textField($model,'product_id');*/ ?>
		<?php echo $form->error($model,'product_id'); ?>
	</div>


   <!-- <div class="row">
        <?php /*echo $model->product_id; */?>
    </div>-->

	<div class="row">
		<?php echo $form->labelEx($model,'com_prod_ident'); ?>
		<?php echo $model->com_prod_ident; /*$form->textField($model,'com_prod_ident',array('size'=>60,'maxlength'=>255));*/ ?>
		<?php echo $form->error($model,'com_prod_ident'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'prod_name'); ?>
		<?php echo $model->prod_name; /*$form->textField($model,'prod_name',array('size'=>60,'maxlength'=>255));*/ ?>
		<?php echo $form->error($model,'prod_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'price'); ?>
		<?php echo $form->textField($model,'price',array('size'=>8,'maxlength'=>8)); ?>
        <?php if($model->money_flag=='980') echo ' UAH'; elseif ($model->money_flag=='840') echo 'USD'; ?>
		<?php echo $form->error($model,'price'); ?>
	</div>

    <div class="row">
        <?php echo $form->labelEx($model,'final_price'); ?>
        <?php echo $model->final_price; ?>
        <?php echo ' UAH'; ?>
        <?php echo $form->error($model,'final_price'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'charge_auto'); ?>
        <?php echo $model->charge_auto; ?>
        <?php /*echo $form->error($model,'charge_auto'); */?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'charge_hand'); ?>
        <?php echo $form->textField($model,'charge_hand',array('size'=>2,'maxlength'=>3)); ?>
        <?php echo $form->error($model,'charge_hand'); ?>
    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'flag_upd'); ?>
		<?php echo $form->textField($model,'flag_upd',array('size'=>2,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'flag_upd'); ?>
	</div>

    <div class="row">
        <?php echo $form->hiddenField($model,'product_id',array('id'=>'checked_prod_id')); ?>
    </div>

    <div class="row">
        <?php echo $form->hiddenField($model,'product_type',array('id'=>'checked_prod_type')); ?>
    </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php

if ($model->product_id!==NULL)
{
    $shopProducts->dbCriteria->addCondition('id='.$model->product_id);
    $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'pp-grid',
        'dataProvider'=>$shopProducts->search(),
        /*'filter'=>$shopProducts,*/
        'columns'=>array(
            array(
                'name'=>'type',
                'value'=>'$data->type == "disk" ? "диск" : "шина"',
            ),
            'product_name',
            array(
                'class'=>'CButtonColumn',
                'template'=>'{unlink}',
                'buttons'=>array(
                    'unlink'=>array(
                        'label'=>'Снять привязку',
                        'imageUrl'=>Yii::app()->request->baseUrl.'/images/delete.png',
                        'url'=>'Yii::app()->createUrl("ParsedProducts/unlink", array("id"=>'.$model->id.'))',
                        'options'=>array('title'=>'Снять привязку'),
                        'visible'=>'true',

                    ),
                    'update'=>array(
                        'visible'=>'false',
                    ),
                    'delete'=>array(
                        'visible'=>'false',
                    ),
                    'view'=>array(
                        'visible'=>'false',
                    )
                ),
            ),
        ),

    ));
}
else
{

    $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'pp-grid',
        'dataProvider'=>$shopProducts->search(),
        'filter'=>$shopProducts,
        'columns'=>array(
            array(
                'header'=>'Назначить',
                //'class'=>'CCheckBoxColumn',
                'class'=>'CShinsProductsCheckBoxColumn',
                'selectableRows'=>1,
                'value'=>'$data->id',
                'htmlOptions'=>array("width"=>"15"),
                'checkBoxHtmlOptions'=>array(
                    'checked'=>'checked',
                )),
            array(
                'name'=>'type',
                'value'=>'$data->type == "disk" ? "диск" : "шина"',
            ),
            'product_name',
        ),
    ));
}
?>