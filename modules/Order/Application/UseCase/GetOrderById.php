<?php
declare(strict_types=1);

namespace Modules\Order\Application\UseCase;

use Modules\Order\Domain\Entity\Order;
use Modules\Order\Domain\Service\GetOrderById as GetOrderByIdService;
use Modules\Order\Domain\ValueObject\OrderId;

final readonly class GetOrderById
{
    public function __construct(
        private GetOrderByIdService $service,
    ) {
    }

    public function getOrder(OrderId $orderId): Order
    {
       return $this->service->get($orderId);
    }
}
