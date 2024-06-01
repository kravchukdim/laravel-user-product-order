<?php
declare(strict_types=1);

namespace Modules\Order\Application\Handler;

use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\Order\Application\Event\MakeOrderEvent;
use Modules\Order\Application\Event\OrderCreatedEvent;
use Modules\Order\Domain\Service\MakeOrder as MakeOrderService;

class MakeOrderHandler implements ShouldQueue
{
    public function __construct(
        private MakeOrderService $service,
        protected Dispatcher $events,
    ) {
    }

    public function handle(MakeOrderEvent $event): void
    {
        $order = $this->service->make($event->userId, $event->products, $event->address);
        $this->events->dispatch(
            new OrderCreatedEvent($order)
        );
    }
}
