<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%policytype}}`.
 */
class m191023_100651_create_policytype_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%policytype}}', [
            'id' => $this->primaryKey(),
            'name'=>$this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%policytype}}');
    }
}
