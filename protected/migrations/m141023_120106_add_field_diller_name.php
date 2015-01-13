<?php

class m141023_120106_add_field_diller_name extends CDbMigration
{
	public function up()
	{
        $transaction = $this->getDbConnection()->beginTransaction();
        try
        {
            echo "Начало миграции...\n";
            $sql = "ALTER TABLE disks ADD diller_name VARCHAR(100) AFTER price;";
            $this->execute($sql);
            $sql = "ALTER TABLE shins ADD diller_name VARCHAR(100) AFTER price;";
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
		echo "m141023_120106_add_field_diller_name does not support migration down.\n";
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