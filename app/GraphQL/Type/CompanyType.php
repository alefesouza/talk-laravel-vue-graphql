<?php

namespace App\GraphQL\Type;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use App\Company;
use DB;

class CompanyType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Company',
        'description' => 'A company.',
        'model' => Company::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::int(),
                'description' => 'The company ID.',
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'The company name.',
            ],
            'users' => [
                'type' => Type::listOf(GraphQL::type('User')),
                'description' => 'The company users.',
                'selectable' => false,
            ],
        ];
    }
}
