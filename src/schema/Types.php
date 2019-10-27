<?php

namespace app\schema;

use app\models\Service;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\UnionType;
use yii\base\Model;

class Types
{
    private static $query;

    private static $company;
    private static $policyformat;
    private static $policytype;
    private static $policy;
    private static $service;

    private static $validationError;
    private static $validationErrorsList;


    // здесь будут наши нагенеренные валидирующе типы
    private static $valitationTypes;

    // root types

    public static function query()
    {
        return self::$query ?: (self::$query = new QuerySchema());
    }
    // query types

    public static function company()
    {
        return self::$company ?: (self::$company = new CompanySchema());
    }

    public static function policyformat()
    {
        return self::$policyformat ?: (self::$policyformat = new PolicyFormatSchema());
    }

    public static function policy()
    {
        return self::$policy ?: (self::$policy = new PolicySchema());
    }

    public static function service()
    {
        return self::$service ?: (self::$service = new ServiceSchema());
    }

    public static function policytype()
    {
        return self::$policytype ?: (self::$policytype = new PolicyTypeSchema());
    }

    public static function validationError()
    {
        return self::$validationError ?: (self::$validationError = new ValidationErrorSchema());
    }

    public static function validationErrorsList()
    {
        return self::$validationErrorsList ?: (self::$validationErrorsList = new ValidationErrorsListSchema());
    }
    public static function validationErrorsUnionType(ObjectType $type)
    {
        if (!isset(self::$valitationTypes[$type->name . 'ValidationErrorsType'])) {
            self::$valitationTypes[$type->name . 'ValidationErrorsType'] = new UnionType([
                'name' => $type->name . 'ValidationErrorsType',
                'types' => [
                    $type,
                    Types::validationErrorsList(),
                ],
                'resolveType' => function ($value) use ($type) {
                    if ($value instanceof Model) {
                        // пришел объект
                        return $type;
                    } else {
                        return Types::validationErrorsList();
                    }
                }
            ]);
        }

        return self::$valitationTypes[$type->name . 'ValidationErrorsType'];
    }

}
