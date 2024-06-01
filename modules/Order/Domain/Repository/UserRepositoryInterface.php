<?php

declare(strict_types=1);

namespace Modules\Order\Domain\Repository;

use Modules\Order\Domain\Entity\User;
use Modules\Order\Domain\ValueObject\UserId;

interface UserRepositoryInterface
{
    public function get(UserId $userId): User;
}
