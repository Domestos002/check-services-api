<?php

namespace app\schema;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class PolicyTypeSchema extends ObjectType
{
    public function __construct()
    {
        $config = [
            'fields' => function() {
                return [
                	'id' => [
                		'type' => Type::int(),
                	],
                    'name' => [
                        'type' => Type::string(),
                    ]
                ];
            }
        ];

        parent::__construct($config);
    }

}
