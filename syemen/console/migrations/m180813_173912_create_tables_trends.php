<?php

use yii\db\Migration;

/**
 * Class m180813_173912_create_tables_trends
 */
class m180813_173912_create_tables_trends extends Migration
{
    /**
     * {@inheritdoc}
     */
	  private $tablename="{{%Trends}}";
	protected $MySqlOptions = 'ENGINE=InnoDB CHARSET=utf8 COLLATE=utf8_unicode_ci';
   
    public function safeUp()
    {
		 $this->createTable($this->tablename, [
            'id' => $this->PrimaryKey(4)->unsigned()->notNull() .' AUTO_INCREMENT ',
			'slug'=>$this->string(100)->notNull()->unique(),
			'fromDate'=> $this->integer()->unsigned()->defaultValue(0),
			'mustContain'=>$this->string(),
			'contain'=>$this->string(),
			'notContain'=>$this->string(),
			'keyWords'=>$this->string(),
			'description'=>$this->string(),
			'active'=>$this->boolean()->defaultValue(true),
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

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180813_173912_create_tables_trends cannot be reverted.\n";

        return false;
    }
    */
}
