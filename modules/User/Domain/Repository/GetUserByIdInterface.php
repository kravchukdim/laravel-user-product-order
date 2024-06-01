<?php

declare(strict_types=1);

namespace Modules\User\Domain\Repository;

use Modules\User\Domain\Entity\User;
use Modules\User\Domain\ValueObject\UserId;

interface GetUserByIdInterface
{
    public function get(UserId $userId): User;
}
