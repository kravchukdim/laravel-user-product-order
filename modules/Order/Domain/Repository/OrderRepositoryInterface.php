<?php

declare(strict_types=1);

namespace Modules\Order\Domain\Repository;

use Modules\Order\Domain\Entity\Order;
use Modules\Order\Domain\ValueObject\OrderId;

interface OrderRepositoryInterface
{
    public function get(OrderId $userId): Order;
    public function make(Order $order): Order;
}
