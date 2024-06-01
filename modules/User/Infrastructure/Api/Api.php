<?php

namespace Modules\User\Infrastructure\Api;


use Modules\User\Application\UseCase\GetUserById;
use Modules\User\Application\UseCase\MakeUser;
use Modules\User\Infrastructure\Dto\User\UserDto;
use Modules\User\Domain\ValueObject\UserId;
use \Modules\User\Application\Dto\User\UserDto as ApplicationUserDto;

final class Api implements UserApiInterface
{
    public function __construct(
        private readonly GetUserById $serviceGetUser,
        private readonly MakeUser $serviceMakeUser,
    ) {
    }

    public function getUser(string $userId): UserDto
    {
        $user = $this->serviceGetUser->get(new UserId($userId));

        return new UserDto(
            $user->getUserId()->getId(),
            $user->getEmail(),
            $user->getName()
        );
    }

    public function makeUser(string $email, string $name): void
    {
        $this->serviceMakeUser->make(new ApplicationUserDto(new UserId(null), $email, $name));
    }
}
