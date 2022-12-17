<?php

use yii\db\Migration;

/**
 * Handles the creation of table `items`.
 */
class m180518_193651_create_items_table extends Migration
{
    /**
     * {@inheritdoc}     */
	private $tablename="{{%Items}}";
	protected $MySqlOptions = 'ENGINE=InnoDB CHARSET=utf8 COLLATE=utf8_unicode_ci
PARTITION BY RANGE (itemDate)
(
 PARTITION pitem2018 VALUES LESS THAN (1546300800) ,
 PARTITION pitem2019 VALUES LESS THAN (1577836800) ,
 PARTITION pitem2020 VALUES LESS THAN (1609459200) ,
 PARTITION pitem2020up  VALUES LESS THAN MAXVALUE 
);	';
    public function safeUp()
    {
        $this->createTable($this->tablename, [
            'id' =>  $this->integer(10)->unsigned()->notNull() ,
			'feedId' =>$this->integer(3)->unsigned()->notNull(),
			'title'=>$this->string(),
			'content'=>$this->text(),
			'url'=>$this->string(),
			'slug'=>$this->string(),
			'enclosureUrl'=>$this->string(80),
			'enclosureType'=>$this->char(30),
			'itemDate'=> $this->integer()->unsigned()->notNull()->defaultValue(0),
			'read'=>$this->smallInteger(4)->defaultValue(0),
			'active'=>$this->boolean()->notNull()->defaultValue(true),
			'ordr'=>$this->smallInteger(1)->defaultValue(0),
			
        ],$this->MySqlOptions);
		$this->addPrimaryKey('items_pk',$this->tablename,['id','itemDate']);
		//$this->createIndex('url_index',$this->tablename,['url'],true);
		$this->alterColumn($this->tablename,'id',$this->integer(10)->unsigned()->notNull().' AUTO_INCREMENT');
		}

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->tablename);
    }
}
