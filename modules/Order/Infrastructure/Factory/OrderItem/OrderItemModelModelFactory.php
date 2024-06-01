<?php

namespace Modules\Order\Infrastructure\Factory\OrderItem;

use Illuminate\Support\Str;
use Modules\Order\Infrastructure\Model\OrderItem;

final class OrderItemModelModelFactory implements OrderItemModelFactoryInterface
{
    public function create(?string $orderId, string $productId, string $name, string $quantity, ?string $id = null): OrderItem
    {
        return OrderItem::make([
            'id' => $id ?? Str::uuid()->toString(),
            'order_id' => $orderId,
            'product_id' => $productId,
            'name' => $name,
            'quantity' => $quantity
        ]);
    }
}
