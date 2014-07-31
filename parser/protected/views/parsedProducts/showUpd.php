<?php
/* @var $this ParsedproductsController */
/* @var $model Parsedproducts */


$this->breadcrumbs=array(
    /*'ParsedProducts'=>array('index'),*/
    'Управление товарами поставщика'=>array('admin'),
    'Обновленные товары',
);

?>


<h1>Обновленные позиции</h1>

<!--<table>
<?php
/*    foreach ($model as $record)
    {
        echo "<tr>";


        echo "</tr>";
    }
*/?>
</table>-->


<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'parsedproducts-grid',
    'dataProvider'=>$dataProvider,
    'columns'=>array(
        'product_id',
        'company_rel.company',
        'prod_name',
        'final_price',
        'amount',
        /*
          'money_flag',
          'final_price',
          'flag_upd',
          'flag_delete',
          */
        array(
            'class'=>'CButtonColumn',
        ),
    ),
)); ?>