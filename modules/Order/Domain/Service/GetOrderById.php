<?php
declare(strict_types=1);

namespace Modules\Order\Domain\Service;

use Modules\Order\Domain\Entity\Order;
use Modules\Order\Domain\Repository\OrderRepositoryInterface;
use Modules\Order\Domain\ValueObject\OrderId;

final readonly class GetOrderById
{
    public function __construct(
        private OrderRepositoryInterface $repository
    ) {
    }

    public function get(OrderId $orderId): Order
    {
        return $this->repository->get($orderId);
    }
}
