<?php

namespace Modules\User\Infrastructure\Dto\Response;

final readonly class ResponseDto {
    public function __construct(
        public string $status,
        public string $message,
    ) {
    }
}
