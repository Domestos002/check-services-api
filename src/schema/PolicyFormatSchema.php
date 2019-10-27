<?php

namespace app\schema;

use app\models\PolicyFormat;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class PolicyFormatSchema extends ObjectType
{
    public function __construct()
    {
        $config = [
            'fields' => function() {
                return [
                	'format' => [
                		'type' => Type::string(),
                	],
                    'company' => [
                        'type' => Types::company(),
                        'resolve' => function(PolicyFormat $policyformat) {

                            return $policyformat->company;
                        },
                    ],
                    'services' => [
                        'type' => Type::listOf(Types::service()),
                        'resolve' => function(PolicyFormat $policytype) {
                            return $policytype->services;
                        },
                    ],
                    'type' => [
                        'type' => Types::policytype(),
                        'resolve' => function(PolicyFormat $policyformat) {

                            return $policyformat->type;
                        },
                    ]
                ];
            }
        ];

        parent::__construct($config);
    }

}
