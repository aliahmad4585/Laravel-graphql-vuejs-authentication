<?php

namespace App\GraphQL\Queries;

use App\Models\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class UserQuery extends Query
{
    protected $attributes = [
        'name' => 'User',
    ];

    //define Type
    public function type(): Type
    {
        return Type::listOf(GraphQL::type('User'));
    }

    //arguments used for authentication
    public function args(): array
    {
        return [
            'email' => [
                'name' => 'email',
                'type' => Type::string(),
                'rules' => ['required']
            ],
            'password' => [
                'name' => 'password',
                'type' => Type::string(),
                'rules' => ['required']
            ]
        ];
    }

    //resolver which return result
    public function resolve($root, $args):array
    {
        if (isset($args['email'])) {
            return User::where('email' , $args['email'])
            ->where('password',bcrypt($args['password']))->get()->toArray();
        }

        return User::all()->toArray();
    }

}