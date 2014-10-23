<?php
/* @var $this ParsedProductsController */
/* @var $model ParsedProducts */



$this->breadcrumbs=array(
    /*'ParsedProducts'=>array('index'),*/
    'Управление товарами поставщика'=>array('admin'),
    'Новые товары',
);
?>


<h1>Новые позиции</h1>

<?php
/*$this->menu=array(
    array('label'=>'Управление товарами', 'url'=>array('admin')),
    array('label'=>'Товары для удаления', 'url'=>array('showDel','company_id'=>'all')),
    array('label'=>'Привязка товара', 'url'=>array('linkProd')),
);*/
$this->menu=$companies;

?>



<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'parsedproducts-grid',
    'dataProvider'=>$dataProvider,
    'columns'=>array(
        'product_id',
        'company_rel.company',
        'prod_name',
        'final_price',
        'charge_auto',
        'charge_hand',
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