<?php

namespace Modules\Order\Infrastructure\Dto\Order;

use Modules\Order\Domain\Entity\Order as OrderEntity;
use Modules\Order\Domain\Factory\OrderFactory;
use Modules\Order\Infrastructure\Dto\OrderItem\OrderItemDtoTransformerInterface;
use Modules\Order\Infrastructure\Factory\Order\OrderModelFactoryInterface;
use Modules\Order\Infrastructure\Model\Order;

class OrderDtoTransformer implements OrderDtoTransformerInterface
{
    public function __construct(
        protected OrderModelFactoryInterface $modelFactory,
        protected OrderItemDtoTransformerInterface $orderItemTransformer,
        protected OrderFactory $orderEntityFactory
    ) {
    }

    public function getModel(OrderEntity $entity): Order
    {
        return $this->modelFactory->create(
            $entity->getUserId()->getId(),
            $entity->getUserName(),
            $entity->getAddress(),
            collect($entity->getItems())->map(fn ($itemEntity) => $this->orderItemTransformer->getModel($itemEntity)),
            $entity->getId()->getId()
        );
    }

    public function getEntity(Order $model): OrderEntity
    {
        return $this->orderEntityFactory->create(
            $model->user_id,
            $model->user_name,
            $model->address,
            collect($model->items)->map(fn ($itemModel) => $this->orderItemTransformer->getEntity($itemModel)),
            $model->id,
        );
    }
}
