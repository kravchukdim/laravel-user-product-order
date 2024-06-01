<?php
declare(strict_types=1);

namespace Modules\Order\Domain\Factory;

use Modules\Order\Domain\Entity\Order;
use Modules\Order\Domain\ValueObject\OrderId;
use Illuminate\Support\Collection;
use Modules\Order\Domain\ValueObject\UserId;

final class OrderFactory
{
    public function create(string $userId, string $userName, string $address, Collection $items, ?string $id = null): Order
    {
        return new Order(
            new OrderId($id),
            new UserId($userId),
            $userName,
            $address,
            $items,
        );
    }
}
