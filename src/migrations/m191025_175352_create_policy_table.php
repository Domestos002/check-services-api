<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%policy}}`.
 */
class m191025_175352_create_policy_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%policy}}', [
            'id' => $this->primaryKey(),
            'number' => $this->bigInteger(),
            'date_end' => $this->bigInteger(),
            'format_id' => $this->integer(11)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%policy}}');
    }
}
