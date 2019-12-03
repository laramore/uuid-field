<?php

/*
|--------------------------------------------------------------------------
| Foreign uuid field
|--------------------------------------------------------------------------
|
| Define all configurations for the foreign uuid field.
|
*/

return [

    'type' => 'foreign_uuid',
    'fields' => [
        'id' => [
            Laramore\Fields\Uuid::class,
            ['visible', 'fillable', 'not_zero'],
        ],
    ],
    'links' => [],
    'field_name_template' => '${name}_${fieldname}',
    'link_name_template' => '*{modelname}',
    'proxies' => [
        'relate' => [
            'name_template' => '${fieldname}',
            'requirements' => ['instance'],
        ],
        'where' => [
            'requirements' => ['instance'],
            'targets' => [Laramore\Proxies\ProxyHandler::BUILDER_TYPE],
        ],
        'whereNull' => [
            'name_template' => 'doesntHave^{fieldname}',
            'requirements' => ['instance'],
            'targets' => [Laramore\Proxies\ProxyHandler::BUILDER_TYPE],
        ],
        'whereNotNull' => [
            'name_template' => 'has^{fieldname}',
            'requirements' => ['instance'],
            'targets' => [Laramore\Proxies\ProxyHandler::BUILDER_TYPE],
        ],
    ],

];
