<?php
declare(strict_types=1);

namespace Modules\User\Application\Dto\User;

use Modules\User\Domain\Entity\User;
use Modules\User\Domain\Factory\UserFactory;

final readonly class UserDtoTransformer
{
    public function __construct(
        private UserFactory $factory,
    ) {
    }

    public function getApplication(User $user): UserDto
    {
        return new UserDto(
            $user->getId(),
            $user->getEmail(),
            $user->getName(),
        );
    }

    public function getDomain(UserDto $dto): User
    {
        return $this->factory->create(
            $dto->getEmail(),
            $dto->getName(),
        );
    }
}
