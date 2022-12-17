<?php

use yii\db\Migration;

/**
 * Handles the creation of table `feeds`.
 */
class m180515_201907_create_feeds_table extends Migration
{
    /**
     * {@inheritdoc}
     */
	 private $tablename="{{%Feeds}}";
	protected $MySqlOptions = 'ENGINE=InnoDB CHARSET=utf8 COLLATE=utf8_unicode_ci ';
    public function safeUp()
    {
        $this->createTable($this->tablename, [
            'id' => $this->PrimaryKey(4)->unsigned()->notNull() .' AUTO_INCREMENT ',
			'feedurl'=>$this->string(100)->unique()->notNull(),
			'cat'=> $this->smallInteger(2)->unsigned()->notNull()->defaultValue(1),
			'resID'=> $this->Integer(3)->unsigned()->notNull(),
			'interval'=>$this->smallInteger(2)->unsigned()->defaultValue(0),
			'lastDate'=>$this->integer()->unsigned()->notNull()->defaultValue(0),
			'lastModified'=>$this->integer(12)->defaultValue(0),
			'etag'=>$this->string(),
			'ttl'=>$this->smallInteger(3)->defaultValue(0),
			'failNo'=>$this->smallInteger(2)->defaultValue(0),
			'lastError'=>$this->string()->defaultValue(NULL),
			'active'=>$this->boolean()->notNull()->defaultValue(true),
			'lastChecked'=>$this->integer(12)->notNull()->defaultValue(0),
			'created_at' => 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP',	
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
