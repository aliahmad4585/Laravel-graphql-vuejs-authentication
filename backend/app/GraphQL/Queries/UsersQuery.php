<?php

namespace App\GraphQL\Queries;

use App\Models\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class UsersQuery extends Query
{
    protected $attributes = [
        'name' => 'Users',
    ];

    //define type
    public function type(): Type
    {
        return Type::listOf(GraphQL::type('User'));
    }

   //resolver which return result
    public function resolve($root, $args): array
    {
        return User::all()->toArray();
    }
}