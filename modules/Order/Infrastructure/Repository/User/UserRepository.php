<?php

namespace Modules\Order\Infrastructure\Repository\User;

use Modules\Order\Domain\Entity\User;
use Modules\Order\Domain\Repository\UserRepositoryInterface;
use Modules\Order\Domain\ValueObject\UserId;
use Modules\User\Infrastructure\Api\UserApiInterface;

class UserRepository implements UserRepositoryInterface
{
    public function __construct(
      protected UserApiInterface $api,
    ) {
    }

    public function get(UserId $userId): User
    {
        $user = $this->api->getUser($userId->getId());

        return new User(
            new UserId($user->id),
            $user->email,
            $user->name
        );
    }
}
