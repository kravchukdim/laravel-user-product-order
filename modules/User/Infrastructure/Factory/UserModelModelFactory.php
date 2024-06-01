<?php

namespace Modules\User\Infrastructure\Factory;

use Modules\User\Infrastructure\Model\User;

final class UserModelModelFactory implements UserModelFactoryInterface
{
    public static function create(string $email, string $name, ?string $id = null): User
    {
        return User::make([
            'id' => $id,
            'name' => $name,
            'email' => $email,
        ]);
    }
}
