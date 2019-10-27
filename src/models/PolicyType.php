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
class PolicyType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'policytype';
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
            'name' => 'Name',
        ];
    }

    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    public function getPolicies()
    {
        return $this->hasMany(PolicyFormat::className(), ['type_id' => 'id']);
    }

}
