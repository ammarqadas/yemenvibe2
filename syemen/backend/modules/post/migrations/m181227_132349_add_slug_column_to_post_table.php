<?php

use yii\db\Migration;

/**
 * Handles adding slug to table `post`.
 */
class m181227_132349_add_slug_column_to_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		        $this->addColumn('{{%post}}', 'slug', $this->string());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
		$this->dropColumn('{{%post}}', 'slug');
    }
}
