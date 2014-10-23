<?php

class m140903_145635_change_pages_seo_set_templates_to_shins_and_disks extends CDbMigration
{
	public function up()
	{
        $transaction = $this->getDbConnection()->beginTransaction();
        try
        {
            echo "Начало миграции...\n";
            $sql = <<< SQL
UPDATE pages_seo
SET hasTemplate = 1,
	template_keywords = 'a:1:{i:0;a:2:{s:7:"keyword";s:6:"filter";s:19:"keyword_description";s:77:"Строковое представление значений фильтра";}}'
WHERE id IN (30, 31)
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
        echo "Данная миграция не поддерживает отката";
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