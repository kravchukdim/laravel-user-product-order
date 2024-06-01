<?php
declare(strict_types=1);

namespace Modules\User\Application\Dto\User;

use Modules\User\Domain\ValueObject\UserId;

final readonly class UserDto {
    public function __construct(
        private UserId $userId,
        private string $email,
        private string $name,
    ) {
    }

    public function getUserId(): UserId
    {
        return $this->userId;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
