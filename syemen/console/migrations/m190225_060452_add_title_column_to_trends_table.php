<?php

use yii\db\Migration;

/**
 * Handles adding title to table `trends`.
 */
class m190225_060452_add_title_column_to_trends_table extends Migration
{
    /**
     * {@inheritdoc}
     */
	 	  private $tablename="{{%Trends}}";

    public function safeUp()
    {
		     $this->addColumn($this->tablename, 'title', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropColumn($this->tablename, 'scrap');
    }
}
