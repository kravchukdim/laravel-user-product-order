<?php
declare(strict_types=1);

namespace Modules\Order\Application\Event;

use Modules\Order\Domain\ValueObject\UserId;
use Illuminate\Support\Collection;

readonly class MakeOrderEvent
{
    public function __construct(
        public UserId $userId,
        public Collection $products,
        public string $address,
    ) {
    }
}
