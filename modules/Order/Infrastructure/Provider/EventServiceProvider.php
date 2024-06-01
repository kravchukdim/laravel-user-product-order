<?php

namespace Modules\Order\Infrastructure\Provider;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as BaseEventServiceProvider;
use Modules\Order\Application\Event\MakeOrderEvent;
use Modules\Order\Application\Event\OrderCreatedEvent;
use Modules\Order\Application\Handler\MakeOrderHandler;
use Modules\Order\Application\Handler\OrderMadeNotificationHandler;

class EventServiceProvider extends BaseEventServiceProvider
{
    protected $listen = [
        MakeOrderEvent::class => [
            MakeOrderHandler::class,
        ],
        OrderCreatedEvent::class => [
            OrderMadeNotificationHandler::class,
        ],
    ];
}
