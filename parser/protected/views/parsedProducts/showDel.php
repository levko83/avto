<?php
/* @var $this ParsedproductsController */
/* @var $model Parsedproducts */


$this->breadcrumbs=array(
    /*'ParsedProducts'=>array('index'),*/
    'Управление товарами поставщика'=>array('admin'),
    'Товары для удаления',
);

?>


<h1>Позиции, помеченнные на удаление</h1>

<?php
/*$this->menu=array(
array('label'=>'Управление товарами', 'url'=>array('admin')),
array('label'=>'Новые товары', 'url'=>array('showNew','company_id'=>'all')),
array('label'=>'Привязка товара', 'url'=>array('linkProd')),
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
            'buttons'=>array(
                'update'=>array(
                    'label'=>'Update',

                ),
                'delete'=>array(
                    'visible'=>'true',

                ),
                'view'=>array(
                    'visible'=>'false',

                ),
            ),

        ),
    ),
));

echo '<a href="'.$this->createUrl('deleteAll').'">Удалить все</a>';
?>