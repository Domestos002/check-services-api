<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "policy".
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
class PolicyFormat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'policyformat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['format', 'type_id', 'company_id'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'format' => 'Format',
            'type_id' => 'Type id',
            'company_id' => 'Company id',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(PolicyType::className(), ['id' => 'type_id']);
    }

    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    public function findByFormat($format)
    {
        return $this->find()->where(['format' => $format])->one();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['id' => 'company_id']);
    }

    public function getServices()
    {
        $ids = ServiceCompanyPolicyType::find()->where(['company_id'=>$this->company->id, 'type_id'=>$this->type->id])->all();
        $idsArr = ArrayHelper::toArray($ids, [
            'app\models\ServiceCompanyPolicyType' => [
                'service_id',
                'type_id',
                'company_id',
            ]]);
        return array_map(function($item) {
            return Service::findIdentity($item['service_id']);
        }, $idsArr);
    }
}
