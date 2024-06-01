<?php
declare(strict_types=1);

namespace Modules\User\Domain\Entity;

use Modules\User\Domain\ValueObject\UserId;

final readonly class User
{
    public function __construct(
        private UserId $id,
        private string $email,
        private string $name,
    ) {
    }

    public function getId(): UserId
    {
        return $this->id;
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
