<?php

namespace Modules\Order\Infrastructure\Factory\Order;

use Illuminate\Support\Str;
use Modules\Order\Infrastructure\Model\Order;
use Illuminate\Support\Collection;

final class OrderModelModelFactory implements OrderModelFactoryInterface
{
    public function create(string $userId, string $userName, string $address, Collection $items, ?string $id = null): Order
    {
        $model = Order::make([
            'id' => $id ?? Str::uuid()->toString(),
            'user_id' => $userId,
            'user_name' => $userName,
            'address' => '$address',
        ]);
        $model->addItems($items);

        return $model;
    }
}
