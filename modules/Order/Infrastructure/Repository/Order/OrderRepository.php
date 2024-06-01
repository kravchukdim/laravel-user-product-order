<?php

namespace Modules\Order\Infrastructure\Repository\Order;

use Modules\Order\Domain\Entity\Order as OrderEntity;
use Modules\Order\Domain\Repository\OrderRepositoryInterface;
use Modules\Order\Domain\ValueObject\OrderId;
use Modules\Order\Infrastructure\Dto\Order\OrderDtoTransformerInterface;
use Modules\Order\Domain\Entity\Order;

class OrderRepository implements OrderRepositoryInterface
{
    public function __construct(
        protected OrderDtoTransformerInterface $modelTransformer,
    ) {
    }

    public function get(OrderId $orderId): OrderEntity
    {
        $order = Order::findOrFail($orderId->getId());
        return $this->modelTransformer->getEntity($order);
    }

    public function make(Order $order): Order
    {
        $model = $this->modelTransformer->getModel($order);
        $model->create();

        return $this->modelTransformer->getEntity($model);
    }
}
