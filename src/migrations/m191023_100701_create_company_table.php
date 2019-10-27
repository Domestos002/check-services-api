<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%company}}`.
 */
class m191023_100701_create_company_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%company}}', [
            'id' => $this->primaryKey(),
            'phone'=>$this->decimal(11),
            'name'=>$this->string(),
            'logo'=>$this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%company}}');
    }
}
