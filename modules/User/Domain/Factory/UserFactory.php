<?php
declare(strict_types=1);

namespace Modules\User\Domain\Factory;

use Illuminate\Support\Str;
use Modules\User\Domain\Entity\User;
use Modules\User\Domain\ValueObject\UserId;

final class UserFactory
{

    public function create(string $email, string $name): User
    {
        return new User(new UserId(Str::uuid()->toString()), $email, $name);
    }
}
