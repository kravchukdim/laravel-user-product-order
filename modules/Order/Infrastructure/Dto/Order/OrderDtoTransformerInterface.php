<?php

namespace Modules\Order\Infrastructure\Dto\Order;

use Modules\Order\Infrastructure\Model\Order;
use Modules\Order\Domain\Entity\Order as OrderEntity;

interface OrderDtoTransformerInterface
{
    public function getModel(OrderEntity $entity): Order;
    public function getEntity(Order $model): OrderEntity;
}
