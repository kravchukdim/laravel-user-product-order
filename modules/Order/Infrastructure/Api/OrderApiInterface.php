<?php

namespace Modules\Order\Infrastructure\Api;


use Modules\Order\Infrastructure\Dto\Order\OrderDto;
use Illuminate\Support\Collection;

interface OrderApiInterface
{
    public function getOrder(string $orderId): OrderDto;
    public function make(string $userId, string $address, Collection $items): void;
}
