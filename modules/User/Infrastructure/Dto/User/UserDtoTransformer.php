<?php

namespace Modules\User\Infrastructure\Dto\User;

use Modules\User\Domain\Entity\User as UserEntity;
use Modules\User\Domain\ValueObject\UserId;
use Modules\User\Infrastructure\Factory\UserModelFactoryInterface;
use Modules\User\Infrastructure\Model\User;

class UserDtoTransformer implements UserDtoTransformerInterface
{
    public function __construct(
        protected UserModelFactoryInterface $modelFactory,
    ) {
    }

    public function getModel(UserEntity $entity): User
    {
        return $this->modelFactory->create($entity->getEmail(), $entity->getName(), $entity->getId()->getId());
    }

    public function getEntity(User $user): UserEntity
    {
        return new UserEntity(
            new UserId($user->id),
            $user->email,
            $user->name
        );
    }
}
