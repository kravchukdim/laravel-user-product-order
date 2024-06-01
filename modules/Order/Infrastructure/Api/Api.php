<?php

namespace Modules\Order\Infrastructure\Api;

use Modules\Order\Application\UseCase\GetOrderById;
use Modules\Order\Application\UseCase\MakeOrder;
use Modules\Order\Domain\Entity\OrderItem;
use Modules\Order\Domain\ValueObject\OrderId;
use Modules\Order\Domain\ValueObject\UserId;
use Modules\Order\Infrastructure\Dto\Order\OrderDto;
use Modules\Order\Infrastructure\Dto\OrderItem\OrderItemDto;
use Illuminate\Support\Collection;

final readonly class Api implements OrderApiInterface
{
    public function __construct(
        private GetOrderById $serviceGetOrder,
        private MakeOrder $serviceMaleOrder,
    ) {
    }

    public function getOrder(string $orderId): OrderDto
    {
        $order = $this->serviceGetOrder->getOrder(new OrderId($orderId));

        return new OrderDto(
            $order->getUserId()->getId(),
            $order->getUserName(),
            $order->getAddress(),
            collect($order->items())->map(function(OrderItem $itemEntity) {
                return new OrderItemDto(
                    $itemEntity->getId()->getId(),
                    $itemEntity->getOrderId()->getId(),
                    $itemEntity->getProductId()->getId(),
                    $itemEntity->getName(),
                    $itemEntity->getQuantity(),
                );
            }),
            $order->getId()->getId()
        );
    }

    public function make(string $userId, string $address, Collection $items): void
    {
        $this->serviceMaleOrder->make(
            new UserId($userId),
            $items,
            $address
        );
    }
}
