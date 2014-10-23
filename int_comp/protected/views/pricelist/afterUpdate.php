<?php
/* @var $this PricelistController  */

$this->breadcrumbs=array(
    'Statistics',
);

$this->menu=array(
    array('label'=>'List Pricelist', 'url'=>array('index')),
);
?>

<h1>Статистика</h1>


<table>

    <tr>
        <td>Обновлено</td>
        <td>
            <?php if (isset($information['upd_records']))
        {
            echo '<a href="'.$this->createUrl('parsedProducts/showUpd',array('company_id'=>$information['company_id'])).'">'.$information['upd_records'].'</a>';
        }
        else echo "0"; ?>
        </td>
    </tr>
    <tr>
        <td>Удалено</td>
        <td>
            <?php if (isset($information['del_records']))
        {
            echo '<a href="'.$this->createUrl('parsedProducts/showDel',array('company_id'=>$information['company_id'])).'">'.$information['del_records'].'</a>';
        }
        else echo "0"; ?>
        </td>
    </tr>
    <tr>
        <td>Добавлено</td>
        <td>
            <?php if (isset($information['new_records']))
        {
            echo '<a href="'.$this->createUrl('parsedProducts/showNew',array('company_id'=>$information['company_id'])).'">'.$information['new_records'].'</a>';
        }
        else echo "0"; ?>
        </td>
    </tr>
</table>