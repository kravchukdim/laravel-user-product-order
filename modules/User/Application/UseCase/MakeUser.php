<?php
declare(strict_types=1);

namespace Modules\User\Application\UseCase;

use Modules\User\Application\Dto\User\UserDto;
use Modules\User\Domain\Factory\UserFactory;
use Modules\User\Domain\Service\MakeUser as MakeUserService;

final readonly class MakeUser
{
    public function __construct(
        private MakeUserService $service,
        private UserFactory $factory,
    ) {
    }

    public function make(UserDto $userDto): void
    {
        $this->service->make(
            $this->factory->create($userDto->getEmail(), $userDto->getName())
        );
    }
}
