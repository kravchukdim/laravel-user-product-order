<?php
declare(strict_types=1);

namespace Modules\Order\Domain\Factory;

use Modules\Order\Domain\Entity\OrderItem;
use Modules\Order\Domain\ValueObject\OrderId;
use Modules\Order\Domain\ValueObject\OrderItemId;
use Modules\Product\Domain\ValueObject\ProductId;

final class OrderItemFactory
{
    public function create(string $productId, string $name, int $quantity): OrderItem
    {
        return new OrderItem(
            new OrderItemId(null),
            new OrderId(null),
            new ProductId($productId),
            $name,
            $quantity
        );
    }
}
