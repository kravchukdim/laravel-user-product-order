<?php

namespace Modules\Order\Infrastructure\Factory\Order;

use Modules\Order\Infrastructure\Model\Order;
use Illuminate\Support\Collection;

interface OrderModelFactoryInterface
{
    public function create(string $userId, string $userName, string $address, Collection $items, ?string $id = null): Order;
}
