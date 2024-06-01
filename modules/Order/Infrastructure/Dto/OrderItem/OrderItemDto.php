<?php

namespace Modules\Order\Infrastructure\Dto\OrderItem;

final readonly class OrderItemDto {
    public function __construct(
        public string $id,
        public string $orderId,
        public string $productId,
        public string $name,
        public int $quantity,
    ) {

    }
}
