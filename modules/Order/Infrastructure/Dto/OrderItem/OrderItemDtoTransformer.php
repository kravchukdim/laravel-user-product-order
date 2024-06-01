<?php

namespace Modules\Order\Infrastructure\Dto\OrderItem;

use Modules\Order\Domain\Factory\OrderItemFactory;
use Modules\Order\Infrastructure\Factory\OrderItem\OrderItemModelFactoryInterface;
use Modules\Order\Infrastructure\Model\OrderItem;
use Modules\Order\Domain\Entity\OrderItem as OrderItemEntity;

class OrderItemDtoTransformer implements OrderItemDtoTransformerInterface
{
    public function __construct(
        protected OrderItemFactory $entityFactory,
        protected OrderItemModelFactoryInterface $modelFactory,
    ) {
    }

    public function getModel(OrderItemEntity $entity): OrderItem
    {
        return $this->modelFactory->create(
            $entity->getOrderId()->getId(),
            $entity->getProductId()->getId(),
            $entity->getName(),
            $entity->getQuantity(),
            $entity->getId()->getId(),
        );
    }

    public function getEntity(OrderItem $model): OrderItemEntity
    {
        return $this->entityFactory->create(
            $model->product_id,
            $model->name,
            $model->quantity
        );
    }
}
