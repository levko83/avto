<?php

class m141005_143442_show_unique_text_on_frontend extends CDbMigration
{
	public function up()
	{
        $transaction = $this->getDbConnection()->beginTransaction();
        try
        {
            echo "Начало миграции...\n";
            $sql = <<< SQL
ALTER TABLE `pages_seo` MODIFY order_no DOUBLE(11, 2)
SQL;
            $this->execute($sql);
            $sql = <<< SQL
DELETE FROM `pages_seo` WHERE id IN (28, 29)
SQL;
            $this->execute($sql);
            $inc = 0;
            foreach(ShinsTypeOfAvto::model()->findAll("id > 1") as $shins_category){
                $order_no = 6 + $inc;
                $sql = <<< SQL
INSERT INTO `pages_seo`(page_key, label, order_no, hasText, hasHeader, title, hasTemplate, template_keywords)
VALUES(
  'shins_category_{$shins_category->translit}',
  'Шины {$shins_category->value}',
  {$order_no},
  1,
  0,
  'Шины {category}',
  1,
  'a:1:{i:0;a:2:{s:7:"keyword";s:8:"category";s:19:"keyword_description";s:25:"Категория шин";}}'
)
SQL;
                $this->execute($sql);
                $inc += 0.01;
            }
            $inc = 0;
            foreach(DisksType::model()->findAll("id > 1") as $disks_category){
                $order_no = 2 + $inc;
                $sql = <<< SQL
INSERT INTO `pages_seo`(page_key, label, order_no, hasText, hasHeader, title, hasTemplate, template_keywords)
VALUES(
  'disks_category_{$disks_category->translit}',
  'Диски {$disks_category->value}',
  {$order_no},
  1,
  0,
  'Диски {category}',
  1,
  'a:1:{i:0;a:2:{s:7:"keyword";s:8:"category";s:19:"keyword_description";s:31:"Категория дисков";}}'
)
SQL;
                $this->execute($sql);
                $inc += 0.01;
            }
            $sql = <<< SQL
INSERT INTO `pages_seo`(page_key, label, order_no, hasText, hasHeader, title, hasTemplate, template_keywords)
VALUES(
  'payment_and_delivery_city',
  'Оплата и доставка (страница города)',
  12.5,
  0,
  0,
  'Шины в {city} {region}',
  1,
  'a:2:{i:0;a:2:{s:7:"keyword";s:4:"city";s:19:"keyword_description";s:10:"Город";}i:1;a:2:{s:7:"keyword";s:6:"region";s:19:"keyword_description";s:14:"Область";}}'
)
SQL;
            $this->execute($sql);
            $transaction->commit();
            echo "Миграция успешно завершена...\n";

        }catch(Exception $e)
        {
            echo "Произошло исключение: ".$e->getMessage()."\n";
            $transaction->rollback();
            return false;
        }

	}

	public function down()
	{
		echo "m141005_143442_show_unique_text_on_frontend does not support migration down.\n";
		return false;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}