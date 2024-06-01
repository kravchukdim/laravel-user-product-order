<?php

namespace Modules\Order\Infrastructure\Dto\Response;

final readonly class ResponseDto {
    public function __construct(
        public string $status,
        public string $message,
    ) {
    }
}
