<?php
declare(strict_types=1);

namespace Modules\User\Domain\Service;

use Modules\User\Domain\Entity\User;
use Modules\User\Domain\Repository\GetUserByIdInterface;
use Modules\User\Domain\ValueObject\UserId;

final readonly class GetUserById
{
    public function __construct(
        private GetUserByIdInterface $repository
    ) {
    }

    public function get(UserId $userId): User
    {
        return $this->repository->get($userId);
    }
}
