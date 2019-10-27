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
class Policy extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'policy';
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
            'number' => 'Name',
            'date_end' => 'Date end',
            'format_id' => 'Format id',
        ];
    }

    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    public function getFormat()
    {
        return $this->hasOne(PolicyFormat::className(), ['id' => 'format_id']);
    }

    public function getType()
    {
        return $this->hasOne(PolicyType::className(), ['id' => 'type_id'])->via('format');
    }

    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['id' => 'company_id'])->via('format');
    }

    public function getServices()
    {
        return PolicyFormat::findIdentity($this->format_id)->services;
    }
}
