<?php

namespace app\schema;

use app\models\Policy;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class PolicySchema extends ObjectType
{
    public function __construct()
    {
        $config = [
            'fields' => function() {
                return [
                	'number' => [
                		'type' => Type::string(),
                	],
                    'date_end' => [
                        'type' => Type::string(),
                    ],
                    'format' => [
                        'type' => Types::policyformat(),
                        'resolve' => function(Policy $policytype) {
                            return $policytype->format;
                        },
                    ],
                    'type' => [
                        'type' => Types::policytype(),
                        'resolve' => function(Policy $policytype) {
                            return $policytype->type;
                        },
                    ],
                    'company' => [
                        'type' => Types::company(),
                        'resolve' => function(Policy $policytype) {
                            return $policytype->company;
                        },
                    ],
                    'services' => [
                        'type' => Type::listOf(Types::service()),
                        'resolve' => function(Policy $policytype) {
                            return $policytype->services;
                        },
                    ]
                ];
            }
        ];

        parent::__construct($config);
    }

}
