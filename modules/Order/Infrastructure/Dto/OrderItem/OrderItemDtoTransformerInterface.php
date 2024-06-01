<?php

namespace Modules\Order\Infrastructure\Dto\OrderItem;

use Modules\Order\Infrastructure\Model\OrderItem;
use Modules\Order\Domain\Entity\OrderItem as OrderItemEntity;

interface OrderItemDtoTransformerInterface
{
    public function getModel(OrderItemEntity $entity): OrderItem;
    public function getEntity(OrderItem $model): OrderItemEntity;
}
