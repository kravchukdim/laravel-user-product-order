<?php

namespace Modules\Order\Infrastructure\Factory\OrderItem;

use Illuminate\Support\Collection;
use Modules\Order\Infrastructure\Model\OrderItem;

interface OrderItemModelFactoryInterface
{
    public function create(string $orderId, string $productId, string $name, string $quantity, ?string $id = null): OrderItem;
}
