<?php

use yii\db\Migration;

/**
 * Class m191025_182557_insert_mock_data
 */
class m191025_182557_insert_mock_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('company', ['id', 'name', 'phone', 'logo'], [
            ['id' => 1, 'name'=>'СК МЕД-АСКЕР', 'phone'=>'84951234567', 'logo' => 'med'],
            ['id' => 2, 'name'=>'СК Рандеву', 'phone'=>'84991234568', 'logo' => 'randevu'],
            ['id' => 3, 'name'=>'Страх-трах', 'phone'=>'88121234569', 'logo' => 'strah'],
        ]);

        $this->batchInsert('policytype', ['id', 'name'], [
            ['id' => 1, 'name'=>'ДМС'],
            ['id' => 2, 'name'=>'ОМС'],
        ]);

        $this->batchInsert('policyformat', ['id', 'format', 'type_id', 'company_id'], [
            ['id' => 1, 'format'=>'9999 99999999', 'type_id' => '1', 'company_id' => '1'],
            ['id' => 2, 'format'=>'9999 999999', 'type_id' => '2', 'company_id' => '1'],
            ['id' => 3, 'format'=>'9999-999999-99', 'type_id' => '1', 'company_id' => '2'],
            ['id' => 4, 'format'=>'99-99 9999-99', 'type_id' => '2', 'company_id' => '2'],
            ['id' => 5, 'format'=>'99-999999-9999', 'type_id' => '1', 'company_id' => '3'],
            ['id' => 6, 'format'=>'9999-999999', 'type_id' => '2', 'company_id' => '3'],
        ]);

        $this->batchInsert('policy', ['id', 'number', 'date_end', 'format_id'], [
            ['id' => 1, 'number'=>'123412345678', 'date_end' => '1597343702', 'format_id' => '1'],
            ['id' => 2, 'number'=>'9876543210', 'date_end' => '1628966102', 'format_id' => '2'],
            ['id' => 3, 'number'=>'123412345678', 'date_end' => '1660588502', 'format_id' => '3'],
            ['id' => 4, 'number'=>'9876543210', 'date_end' => '1700764502', 'format_id' => '4'],
            ['id' => 5, 'number'=>'123412345678', 'date_end' => '1732473302', 'format_id' => '5'],
            ['id' => 6, 'number'=>'9876543210', 'date_end' => '1764095702', 'format_id' => '6'],
        ]);

        $this->batchInsert('service_company_policytype', ['service_id', 'type_id', 'company_id'], [
            ['service_id' => '1', 'type_id' => '1', 'company_id' => '1'],
            ['service_id' => '3', 'type_id' => '1', 'company_id' => '1'],
            ['service_id' => '3', 'type_id' => '2', 'company_id' => '1'],
            ['service_id' => '5', 'type_id' => '2', 'company_id' => '1'],
            ['service_id' => '1', 'type_id' => '2', 'company_id' => '2'],
            ['service_id' => '5', 'type_id' => '2', 'company_id' => '2'],
            ['service_id' => '3', 'type_id' => '1', 'company_id' => '2'],
            ['service_id' => '1', 'type_id' => '1', 'company_id' => '3'],
            ['service_id' => '5', 'type_id' => '2', 'company_id' => '3'],
            ['service_id' => '2', 'type_id' => '2', 'company_id' => '3'],
        ]);

        $this->batchInsert('service', ['id', 'name'], [
            ['id' => 1, 'name'=>'Первичный приём врача-стоматолога терапевта'],
            ['id' => 2, 'name'=>'Полирование челюсти'],
            ['id' => 3, 'name'=>'Снятие камней с 1 зуба'],
            ['id' => 4, 'name'=>'Рентген верхней и нижней челюстей'],
            ['id' => 5, 'name'=>'МРТ грудной клетки'],
            ['id' => 6, 'name'=>'МРТ челюсти'],
            ['id' => 7, 'name'=>'Рентген грудной клетки'],
            ['id' => 8, 'name'=>'Исследование функции внешнего дыхания'],
            ['id' => 9, 'name'=>'Денситометрия'],
            ['id' => 10, 'name'=>'МРТ головного мозга'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191025_182557_insert_mock_data cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191025_182557_insert_mock_data cannot be reverted.\n";

        return false;
    }
    */
}
