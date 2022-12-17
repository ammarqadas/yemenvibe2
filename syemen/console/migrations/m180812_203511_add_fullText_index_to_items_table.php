<?php

use yii\db\Migration;

/**
 * Class m180812_203511_add_fullText_index_to_items_table
 */
class m180812_203511_add_fullText_index_to_items_table extends Migration
{
    /**
     * {@inheritdoc}
     */
	 private $tablename="{{%Items}}";
    public function safeUp()
    {
		
$this->execute("ALTER TABLE ".$this->tablename." REMOVE PARTITIONING ");
$this->execute("ALTER TABLE ".$this->tablename." ADD FULLTEXT (`title`) ");

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180812_203511_add_fullText_index_to_items_table cannot be reverted.\n";

$this->execute("ALTER TABLE ".$this->tablename." drop INDEX title");
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180812_203511_add_fullText_index_to_items_table cannot be reverted.\n";

        return false;
    }
    */
}
