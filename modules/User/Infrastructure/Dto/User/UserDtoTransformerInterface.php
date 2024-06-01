<?php

namespace Modules\User\Infrastructure\Dto\User;

use Modules\User\Infrastructure\Model\User;
use Modules\User\Domain\Entity\User as UserEntity;

interface UserDtoTransformerInterface
{
    public function getModel(UserEntity $entity): User;
    public function getEntity(User $user): UserEntity;
}
