<?php

namespace Modules\Order\Infrastructure\Dto\Order;

final readonly class OrderDto {
    public function __construct(
        public string $id,
        public string $userId,
        public string $userName,
        public string $address,
        public Collection $items,
    ) {

    }
}
