<?php
declare(strict_types=1);

namespace Modules\User\Application\UseCase;

use Modules\User\Application\Dto\User\UserDto;
use Modules\User\Application\Dto\User\UserDtoTransformer;
use Modules\User\Domain\ValueObject\UserId;
use Modules\User\Domain\Service\GetUserById as GetUserByIdService;

final readonly class GetUserById
{
    public function __construct(
        private GetUserByIdService $service,
        private UserDtoTransformer $transformer,
    ) {
    }

    public function get(UserId $userId): UserDto
    {
        return $this->transformer->getApplication(
            $this->service->get($userId)
        );
    }
}
