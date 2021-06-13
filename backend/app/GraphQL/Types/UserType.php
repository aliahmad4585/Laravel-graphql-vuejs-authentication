<?php

namespace App\GraphQL\Types;

use App\Models\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class UserType extends GraphQLType
{
    protected $attributes = [
        'name' => 'User',
        'description' => 'define the user detail with all fields',
        'model' => User::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'User Id',
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The name of the User',
            ],
            'email' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The email of the User',
            ],
            'password' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The password of the User',
            ]
        ];
    }
}