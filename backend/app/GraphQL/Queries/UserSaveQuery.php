<?php

namespace App\GraphQL\Queries;

use App\Models\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class UserSaveQuery extends Query
{
    protected $attributes = [
        'name' => 'UserSave',
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
            ],
            'name' => [
                'name' => 'name',
                'type' => Type::string(),
                'rules' => ['required']
            ],
        ];
    }

    //resolver which return result
    public function resolve($root, $args):array
    {
        if (isset($args['email']) && isset($args['password']) && isset($args['name'])) {
             
           $user = User::create(
                [
                    'name' => $args['name'],
                    'email' => $args['email'],
                    'password' => bcrypt($args['password'])
                ]
            );
            return User::where('id' , $user->id)->get()->toArray();
        }

    }

}