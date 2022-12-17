<?php

use yii\db\Migration;

/**
 * Class m180810_061822_add_trend_colum_to_Res_tables
 */
class m180810_061822_add_trend_colum_to_Res_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('Res', 'trend', $this->integer(2)->notNull()->defaultValue(1));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       // echo "m180810_061822_add_trend_colum_to_Res_tables cannot be reverted.\n";

      $this->dropColumn('Res', 'trend');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180810_061822_add_trend_colum_to_Res_tables cannot be reverted.\n";

        return false;
    }
    */
}
