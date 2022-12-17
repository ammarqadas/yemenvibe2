<?php

use yii\db\Migration;

/**
 * Handles the creation of table `res`.
 */
class m180526_000723_create_res_table extends Migration
{
    /**
     * {@inheritdoc}
     */
	 private $tablename="{{%Res}}";
	protected $MySqlOptions = 'ENGINE=InnoDB CHARSET=utf8 COLLATE=utf8_unicode_ci';
    public function safeUp()
    {
        $this->createTable($this->tablename, [
            'id' => $this->PrimaryKey(4)->unsigned()->notNull() .' AUTO_INCREMENT ',
			'rName'=>$this->string(70)->unique(),
			'logo'=>$this->string(100),
			'domain'=>$this->string(100),
			'active'=>$this->boolean()->notNull()->defaultValue(true),
        ],$this->MySqlOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->tablename);
    }
}
