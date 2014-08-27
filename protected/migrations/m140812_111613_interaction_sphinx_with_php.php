<?php

class m140812_111613_interaction_sphinx_with_php extends CDbMigration
{
//	public function up()
//	{
//	}
//
//	public function down()
//	{
//		echo "m140812_111613_interaction_sphinx_with_php does not support migration down.\n";
//		return false;
//	}

	// Use safeUp/safeDown to do migration with transaction
	public function up()
	{
        $transaction = $this->getDbConnection()->beginTransaction();
        try
        {
            echo "Начало миграции...\n";
            $this->addColumn("disks", "edited", "integer");
            $this->update(
                "disks",
                array(
                    "edited" => time(),
                )
            );
            $this->addColumn("disks_displays", "edited", "integer");
            $this->update(
                "disks_displays",
                array(
                    "edited" => time(),
                )
            );
            $this->addColumn("shins", "edited", "integer");
            $this->update(
                "shins",
                array(
                    "edited" => time(),
                )
            );
            $this->addColumn("shins_displays", "edited", "integer");
            $this->update(
                "shins_displays",
                array(
                    "edited" => time(),
                )
            );
            $this->createTable('sphinx_indexer_log', array(
                'id' => 'pk',
                'index_name' => 'string NOT NULL',
                'index_time' => 'integer',
            ));
            $sql = <<< SQL
CREATE TRIGGER `sphinx_indexer_log_before_insert` BEFORE INSERT ON `sphinx_indexer_log`
FOR EACH ROW
BEGIN
   SET NEW.index_time = UNIX_TIMESTAMP();
END;
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
        $transaction = $this->getDbConnection()->beginTransaction();
        try
        {
            echo "Начало отката миграции...\n";
            $this->dropColumn("disks", "edited");
            $this->dropColumn("disks_displays", "edited");
            $this->dropColumn("shins", "edited");
            $this->dropColumn("shins_displays", "edited");
            $sql = "DROP TRIGGER IF EXISTS `sphinx_indexer_log_before_insert`";
            $this->execute($sql);
            $this->dropTable("sphinx_indexer_log");
            $transaction->commit();
            echo "Откат миграцим успешно завершен...\n";

        }catch(Exception $e)
        {
            echo "Произошло исключение: ".$e->getMessage()."\n";
            $transaction->rollback();
            return false;
        }
	}

}