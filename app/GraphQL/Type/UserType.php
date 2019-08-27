<?php

namespace App\GraphQL\Type;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use App\User;
use DB;

class UserType extends GraphQLType
{
    protected $attributes = [
        'name' => 'User',
        'description' => 'A user.',
        'model' => User::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::int(),
                'description' => 'The user ID.',
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'The user name.',
            ],
            'email' => [
                'type' => Type::string(),
                'description' => 'The user email.',
            ],
            'company_id' => [
                'type' => Type::int(),
                'description' => 'The user maicompanyntainer ID.',
            ],
            'company' => [
                'type' => GraphQL::type('Company'),
                'description' => 'The user company.',
                'selectable' => false,
            ],
        ];
    }
}
