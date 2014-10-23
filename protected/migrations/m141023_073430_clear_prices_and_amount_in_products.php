<?php

class m141023_073430_clear_prices_and_amount_in_products extends CDbMigration
{
	public function up()
	{
        $transaction = $this->getDbConnection()->beginTransaction();
        try
        {
            echo "Начало миграции...\n";
            $sql = "UPDATE disks SET price = NULL, amount = NULL;";
            $this->execute($sql);
            $sql = "UPDATE shins SET price = NULL, amount = NULL;";
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
		echo "m141023_073430_clear_prices_and_amount_in_products does not support migration down.\n";
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