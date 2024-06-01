<?php
declare(strict_types=1);

namespace Modules\Order\Application\UseCase;

use Modules\Order\Application\Event\MakeOrderEvent;
use Modules\Order\Domain\ValueObject\UserId;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Events\Dispatcher;

final readonly class MakeOrder
{
    public function __construct(
        private Dispatcher $events,
    ) {
    }

    public function make(UserId $userId, Collection $products, string $address): void
    {
        $this->events->dispatch(
            new MakeOrderEvent($userId, $products, $address)
        );
    }
}
