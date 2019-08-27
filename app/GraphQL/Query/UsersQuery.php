<?php

namespace App\GraphQL\Query;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;
use GraphQL\Type\Definition\ResolveInfo;
use App\User;
use Closure;

class UsersQuery extends Query
{
    protected $attributes = [
        'name' => 'users'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('User'));
    }

    public function args(): array
    {
        return [
            'company_id' => ['name' => 'company_id', 'type' => Type::int()],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $users = User::query();

        if (array_key_exists('company_id', $args)) {
            $users = $users->where('company_id', $args['company_id']);
        }

        $fields = $getSelectFields();

        return $users->orderBy('id', 'desc')
            ->with($fields->getRelations())
            ->select($fields->getSelect())
            ->get();
    }
}
