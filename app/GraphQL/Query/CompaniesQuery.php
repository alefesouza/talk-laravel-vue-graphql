<?php

namespace App\GraphQL\Query;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;
use GraphQL\Type\Definition\ResolveInfo;
use App\Company;
use Closure;

class CompaniesQuery extends Query
{
    protected $attributes = [
        'name' => 'companies'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Company'));
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $companies = Company::query();

        $fields = $getSelectFields();

        return $companies->orderBy('id', 'desc')
            ->with($fields->getRelations())
            ->select($fields->getSelect())
            ->get();
    }
}
