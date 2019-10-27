<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%service_company_policytype}}`.
 */
class m191025_175723_create_service_company_policytype_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%service_company_policytype}}', [
            'id' => $this->primaryKey(),
            'service_id' => $this->integer(11),
            'company_id' => $this->integer(11),
            'type_id' => $this->integer(11),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%service_company_policytype}}');
    }
}
