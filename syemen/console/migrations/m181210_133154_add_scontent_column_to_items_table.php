<?php

use yii\db\Migration;

/**
 * Handles adding scontent to table `items`.
 */
class m181210_133154_add_scontent_column_to_items_table extends Migration
{
    /**
     * {@inheritdoc}
     */
	 private $tablename="{{%Items}}";
    public function safeUp()
    {
     $this->addColumn($this->tablename, 'body',$this->text());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
				      $this->dropColumn($this->tablename, 'body');

    }
}
