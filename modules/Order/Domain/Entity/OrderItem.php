<?php
declare(strict_types=1);

namespace Modules\Order\Domain\Entity;

use Modules\Order\Domain\ValueObject\OrderId;
use Modules\Order\Domain\ValueObject\OrderItemId;
use Modules\Product\Domain\ValueObject\ProductId;

final readonly class OrderItem
{
    public function __construct(
        private OrderItemId $id,
        private OrderId $orderId,
        private ProductId $productId,
        private string $name,
        private int $quantity,
    ) {
    }

    public function getOrderId(): OrderId
    {
        return $this->orderId;
    }

    public function getId(): OrderItemId
    {
        return $this->id;
    }

    public function getProductId(): ProductId
    {
        return $this->productId;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }


}
