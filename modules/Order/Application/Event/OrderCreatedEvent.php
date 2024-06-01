<?php
declare(strict_types=1);

namespace Modules\Order\Application\Event;

use Illuminate\Support\Collection;
use Modules\Order\Domain\Entity\Order;

readonly class OrderCreatedEvent
{
    public function __construct(
        public Order $order,
    ) {
    }
}
