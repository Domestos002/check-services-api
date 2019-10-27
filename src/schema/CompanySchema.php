<?php

namespace app\schema;

use app\models\Company;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class CompanySchema extends ObjectType
{
    public function __construct()
    {
        $config = [
            'fields' => function() {
                return [
                    'id' => [
                        'type' => Type::int(),
                    ],
                    'phone' => [
                        'type' => Type::string(),
                    ],
                    'name' => [
                        'type' => Type::string(),
                    ],
                    'logo' => [
                        'type' => Type::string(),
                    ],
                    'formates' => [
                        'type' => Type::listOf(Types::policyformat()),
                        'resolve' => function(Company $company) {

                            return $company->formates;
                        },
                    ]
                ];
            }
        ];

        parent::__construct($config);
    }

}
