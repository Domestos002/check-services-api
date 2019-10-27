<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%policyformat}}`.
 */
class m191025_083927_create_policyformat_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%policyformat}}', [
            'id' => $this->primaryKey(),
            'format' => $this->string(),
            'type_id' => $this->integer(11),
            'company_id' => $this->integer(11),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%policyformat}}');
    }
}
