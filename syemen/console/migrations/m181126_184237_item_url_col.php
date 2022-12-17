<?php

use yii\db\Migration;

/**
 * Class m181126_184237_item_url_col
 */
class m181126_184237_item_url_col extends Migration
{
    /**
     * {@inheritdoc}
     */
	 private $tablename="{{%Items}}";
    public function safeUp()
    {
$this->alterColumn($this->tablename, 'url', $this->string(500));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181126_184237_item_url_col cannot be reverted.\n";
		$this->alterColumn($this->tablename, 'url', $this->string());

      //  return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181126_184237_item_url_col cannot be reverted.\n";

        return false;
    }
    */
}
