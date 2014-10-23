<?php

class m141002_142351_seo_delivery extends CDbMigration
{
	public function up()
	{
        $transaction = $this->getDbConnection()->beginTransaction();
        try
        {
            echo "Начало миграции...\n";
            $sql = <<< SQL
CREATE TABLE `delivary_seo` (
  `region_id` INTEGER(11) DEFAULT NULL,
  `city` VARCHAR(250) COLLATE utf8_general_ci DEFAULT NULL,
  `city_translit` VARCHAR(250) COLLATE utf8_general_ci DEFAULT NULL,
  `text` TEXT COLLATE utf8_general_ci
)ENGINE=InnoDB CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
SQL;
            $this->execute($sql);
            $sql = <<< SQL
INSERT INTO `delivary_seo`(`region_id`, `city`, `city_translit`)
(
    SELECT t.`root`, t.`name`, t.`name_translit`
    FROM
    (
        SELECT `root`, `name`, `name_translit`
        FROM `nova_warehouse`
        WHERE `level` = 2
        UNION ALL
        SELECT `root`, `name`, `name_translit`
        FROM `intime_warehouse`
        WHERE `level` = 2
    ) t
    GROUP BY t.`root`, t.`name`, t.`name_translit`
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
		echo "Данная миграция не поддерживает отката \n";
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