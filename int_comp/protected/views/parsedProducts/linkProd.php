<?php
/* @var $this ParsedproductsController */
/* @var $model Parsedproducts */



$this->breadcrumbs=array(
    /*'ParsedProducts'=>array('index'),*/
    'Управление товарами поставщика'=>array('admin'),
    'Привязка товаров',
);
?>


<h1>Связанные товары</h1>

<?php
/*$this->menu=array(
    array('label'=>'Управление товарами', 'url'=>array('admin')),
    array('label'=>'Новые товары', 'url'=>array('showNew','company_id'=>'all')),
    array('label'=>'Товары для удаления', 'url'=>array('showDel','company_id'=>'all')),
);
*/?>
<?php
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