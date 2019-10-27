<?php

namespace app\schema;

use app\models\Company;
use app\models\PolicyFormat;
use app\models\Policy;
use app\models\PolicyType;
use app\models\Service;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class QuerySchema extends ObjectType
{
    public function __construct()
    {
        $config = [
            'fields' => function() {
                return [
                    'companies' => [
                        'type' => Type::listOf(Types::company()),
                        'resolve' => function() {
                            return Company::find()->all();
                        },
                    ],
                    'policytypes' => [
                        'type' => Type::listOf(Types::policytype()),
                        'resolve' => function() {
                            return PolicyType::find()->all();
                        },
                    ],
                    'policy' => [
                        'type' => Types::policy(),
                        'args' => [
                            'number' => Type::string(),
                            'format' => Type::string()
                        ],
                        'resolve' => function($root, $args) {
                            $mod = new PolicyFormat;
                            $formatId = $mod->findByFormat($args['format'])->id;
                            $policy = Policy::find()->where(['number' => $args['number'], 'format_id' => $formatId])->one();
                            return $policy;
                        },
                    ],
                    'policyformats' => [
                        'type' => Type::listOf(Types::policyformat()),
                        'resolve' => function() {
                            return PolicyFormat::find()->all();
                        },
                    ],
                    'services' => [
                        'type' => Type::listOf(Types::service()),
                        'resolve' => function() {
                            return Service::find()->all();
                        },
                    ],
                ];
            }
        ];

        parent::__construct($config);
    }
}
