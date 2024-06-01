<?php

namespace Modules\User\Infrastructure\Api;

use Modules\User\Infrastructure\Dto\User\UserDto;

interface UserApiInterface
{
    public function getUser(string $userId): UserDto;
    public function makeUser(string $email, string $name): void;
}
