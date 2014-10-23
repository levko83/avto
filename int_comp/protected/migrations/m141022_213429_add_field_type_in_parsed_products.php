<?php

class m141022_213429_add_field_type_in_parsed_products extends CDbMigration
{
	public function up()
	{
        $transaction = $this->getDbConnection()->beginTransaction();
        try
        {
            echo "Начало миграции...\n";
            $sql = <<< SQL
    ALTER TABLE SC_parsed_products ADD product_type VARCHAR(60) AFTER product_id;
SQL;
            $this->execute($sql);
            $sql = "DELETE FROM SC_parsed_products;";
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
		echo "m141022_213429_add_field_type_in_parsed_products does not support migration down.\n";
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