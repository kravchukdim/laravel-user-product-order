<?php

namespace Modules\Product\Infrastructure\Dto\Response;

final readonly class ResponseDto {
    public function __construct(
        public string $status,
        public string $message,
    ) {
    }
}
