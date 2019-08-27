<?php

namespace App\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use App\User;
use Auth;

class AddUserMutation extends Mutation
{
    protected $attributes = [
        'name' => 'addUser'
    ];

    public function type(): Type
    {
        return GraphQL::type('User');
    }

    public function args(): array
    {
        return [
            'input' => ['name' => 'input', 'type' => GraphQL::type('UserInput')],
        ];
    }

    public function rules(array $args = []): array
    {
        return [
            'email' => ['nullable', 'max:64', 'email', 'unique:users,email'],
        ];
    }

    public function resolve($root, $args)
    {
        $input = $args['input'];

        $user = User::create($input);

        return $user;
    }
}
