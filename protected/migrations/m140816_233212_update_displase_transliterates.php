<?php

class m140816_233212_update_displase_transliterates extends CDbMigration
{
	public function up()
	{
        $transaction = $this->getDbConnection()->beginTransaction();
        try
        {
            echo "Начало миграции...\n";
            $sql = "DROP FUNCTION IF EXISTS transliterate";
            $this->execute($sql);
            $sql = <<< SQL
CREATE FUNCTION transliterate(s VARCHAR(500)) RETURNS VARCHAR(500) DETERMINISTIC
BEGIN
	DECLARE pos, n INTEGER;
    DECLARE c VARCHAR(5);
    DECLARE t VARCHAR(500) DEFAULT "";
    SET s = TRIM(LOWER(s));
    SET pos = 1;
    SET n = CHAR_LENGTH(s);
    WHILE (pos <= n) DO
    	SET c = SUBSTR(s, pos, 1);
        CASE c
        	WHEN "а" THEN SET c = "a";
            WHEN "б" THEN SET c = "b";
            WHEN "в" THEN SET c = "v";
            WHEN "г" THEN SET c = "g";
            WHEN "д" THEN SET c = "d";
			WHEN "е" THEN SET c = "e";
			WHEN "ё" THEN SET c = "yo";
            WHEN "ж" THEN SET c = "zh";
			WHEN "з" THEN SET c = "z";
            WHEN "и" THEN SET c = "i";
            WHEN "й" THEN SET c = "j";
            WHEN "к" THEN SET c = "k";
            WHEN "л" THEN SET c = "l";
            WHEN "м" THEN SET c = "m";
            WHEN "н" THEN SET c = "n";
            WHEN "о" THEN SET c = "o";
            WHEN "п" THEN SET c = "p";
            WHEN "р" THEN SET c = "r";
            WHEN "с" THEN SET c = "s";
            WHEN "т" THEN SET c = "t";
            WHEN "у" THEN SET c = "u";
            WHEN "ф" THEN SET c = "f";
            WHEN "х" THEN SET c = "h";
            WHEN "ц" THEN SET c = "c";
            WHEN "ч" THEN SET c = "ch";
            WHEN "ш" THEN SET c = "sh";
            WHEN "щ" THEN SET c = "csh";
            WHEN "ь" THEN SET c = "";
            WHEN "ы" THEN SET c = "y";
            WHEN "ъ" THEN SET c = "";
            WHEN "э" THEN SET c = "e";
            WHEN "ю" THEN SET c = "yu";
            WHEN "я" THEN SET c = "ya";
            WHEN "a" THEN SET c = "a";
            WHEN "b" THEN SET c = "b";
            WHEN "c" THEN SET c = "c";
            WHEN "d" THEN SET c = "d";
            WHEN "e" THEN SET c = "e";
            WHEN "f" THEN SET c = "f";
            WHEN "g" THEN SET c = "g";
            WHEN "h" THEN SET c = "h";
            WHEN "i" THEN SET c = "i";
            WHEN "j" THEN SET c = "j";
            WHEN "k" THEN SET c = "k";
            WHEN "l" THEN SET c = "l";
            WHEN "m" THEN SET c = "m";
            WHEN "n" THEN SET c = "n";
            WHEN "o" THEN SET c = "o";
            WHEN "p" THEN SET c = "p";
            WHEN "q" THEN SET c = "q";
            WHEN "r" THEN SET c = "r";
            WHEN "s" THEN SET c = "s";
            WHEN "t" THEN SET c = "t";
            WHEN "u" THEN SET c = "u";
            WHEN "v" THEN SET c = "v";
            WHEN "w" THEN SET c = "w";
            WHEN "x" THEN SET c = "x";
            WHEN "y" THEN SET c = "y";
            WHEN "z" THEN SET c = "z";
            WHEN "0" THEN SET c = "0";
            WHEN "1" THEN SET c = "1";
            WHEN "2" THEN SET c = "2";
            WHEN "3" THEN SET c = "3";
            WHEN "4" THEN SET c = "4";
            WHEN "5" THEN SET c = "5";
            WHEN "6" THEN SET c = "6";
            WHEN "7" THEN SET c = "7";
            WHEN "8" THEN SET c = "8";
            WHEN "9" THEN SET c = "9";
            ELSE SET c = "-";
        END CASE;
    	SET t = CONCAT(t, c);
        SET pos = pos + 1;
    END WHILE;
    WHILE (INSTR(t, "--") > 0) DO
    	SET t = REPLACE(t, "--", "-");
    END WHILE;
	RETURN t;
END;
SQL;
            $this->execute($sql);
            $sql = "UPDATE shins_displays SET translit = transliterate(display_name)";
            $this->execute($sql);
            $sql = "UPDATE disks_displays SET translit = transliterate(display_name)";
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
            $sql = "DROP FUNCTION IF EXISTS transliterate";
            $this->execute($sql);
            $transaction->commit();
            echo "Откат миграцим успешно завершен...\n";

        }catch(Exception $e)
        {
            echo "Произошло исключение: ".$e->getMessage()."\n";
            $transaction->rollback();
            return false;
        }
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