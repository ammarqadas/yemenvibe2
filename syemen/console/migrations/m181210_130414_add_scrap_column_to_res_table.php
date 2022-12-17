<?php

use yii\db\Migration;

/**
 * Handles adding scrap to table `res`.
 */
class m181210_130414_add_scrap_column_to_res_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
     $this->addColumn('Res', 'scrap', $this->boolean()->notNull()->defaultValue(false));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
		      $this->dropColumn('Res', 'scrap');

    }
}
