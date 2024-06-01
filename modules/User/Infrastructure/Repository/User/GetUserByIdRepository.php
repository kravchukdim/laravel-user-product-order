<?php

namespace Modules\User\Infrastructure\Repository\User;

use Modules\User\Domain\ValueObject\UserId;
use Modules\User\Domain\Repository\GetUserByIdInterface;
use Modules\User\Infrastructure\Dto\User\UserDtoTransformerInterface;
use Modules\User\Infrastructure\Model\User;
use Modules\User\Domain\Entity\User as UserEntity;

class GetUserByIdRepository implements GetUserByIdInterface
{
    public function __construct(
      protected UserDtoTransformerInterface $modelTransformer,
    ) {
    }

    public function get(UserId $userId): UserEntity
    {
        $user = User::findOrFail($userId->getId());

        return $this->modelTransformer->getEntity($user);
    }
}
