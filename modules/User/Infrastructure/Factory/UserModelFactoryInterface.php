<?php

namespace Modules\User\Infrastructure\Factory;

use Modules\User\Infrastructure\Model\User;

interface UserModelFactoryInterface
{
    public static function create(string $email, string $name, ?string $id = null): User;
}
