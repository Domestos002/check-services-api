<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "type".
 *
 * @property integer $id
 * @property string $street
 * @property string $zip
 * @property string $createDate
 * @property string $modifyDate
 * @property integer $status
 * @property integer $userId
 * @property integer $cityId
 *
 */
class ServiceCompanyPolicyType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'service_company_policytype';
    }

    /**s
     * @inheritdoc
     */
    public function rules()
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'service_id' => 'Service ID',
            'type_id' => 'Type ID',
            'company_id' => 'Company ID',
        ];
    }

    public static function findIdentity($id)
    {
        return self::findOne($id);
    }
}
