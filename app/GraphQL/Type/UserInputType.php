<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use App\User;

class UserInputType extends GraphQLType
{
    protected $attributes = [
        'name' => 'UserInput',
        'description' => 'The data to create or update a user.'
    ];

    protected $inputObject = true;

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::int(),
                'description' => 'The user ID if it\'s updating.',
            ],
            'company_id' => [
                'type' => Type::int(),
                'description' => 'The user company ID.',
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The user name.',
                'rules' => ['required', 'max:64'],
            ],
            'email' => [
                'type' => Type::string(),
                'description' => 'The user email.',
                'rules' => ['nullable', 'max:64', 'email'],
            ],
        ];
    }
}
