<?php

use yii\db\Migration;

/**
 * Handles adding role to table `user`.
 */
class m180723_065247_add_role_column_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
   public function up()
    {
        $this->addColumn('user', 'role', $this->integer()->notNull()->defaultValue(10));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('user', 'role');
    }
}
