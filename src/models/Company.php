<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "company".
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
class Company extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company';
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
            'phone' => 'Phone',
            'name' => 'Name',
            'logo' => 'Logo',
        ];
    }

    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    public function getFormates()
    {
        return $this->hasMany(PolicyFormat::className(), ['company_id' => 'id']);
    }
}
