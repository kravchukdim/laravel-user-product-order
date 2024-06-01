<?php

namespace Modules\User\Infrastructure\Dto\User;

final readonly class UserDto {
    public function __construct(
        public string $id,
        public string $email,
        public string $name,
    ) {

    }
}
