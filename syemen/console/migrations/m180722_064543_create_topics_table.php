<?php

use yii\db\Migration;

/**
 * Handles the creation of table `topics`.
 */
class m180722_064543_create_topics_table extends Migration
{
    /**
     * {@inheritdoc}
     */
	 private $tablename="{{%Topics}}";
	protected $MySqlOptions = 'ENGINE=InnoDB CHARSET=utf8 COLLATE=utf8_unicode_ci';
   
    public function safeUp()
    {
        $this->createTable($this->tablename, [
            'id' => $this->PrimaryKey(2)->unsigned()->notNull() .' AUTO_INCREMENT ',
			'title'=>$this->string(100)->notNull()->unique(),
			'slug'=>$this->string(100),
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
