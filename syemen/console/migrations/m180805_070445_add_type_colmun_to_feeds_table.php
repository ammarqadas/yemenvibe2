<?php

use yii\db\Migration;

/**
 * Class m180805_070445_add_type_colmun_to_feeds_table
 */
class m180805_070445_add_type_colmun_to_feeds_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('Feeds', 'type', $this->integer(2)->notNull()->defaultValue(2));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
      //  echo "m180805_070445_add_type_colmun_to_feeds_table cannot be reverted.\n";
$this->dropColumn('Feeds', 'type');
       
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180805_070445_add_type_colmun_to_feeds_table cannot be reverted.\n";

        return false;
    }
    */
}
