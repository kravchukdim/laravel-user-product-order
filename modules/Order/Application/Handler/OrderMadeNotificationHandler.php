<?php

declare(strict_types=1);

namespace Modules\Order\Application\Handler;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use Modules\Order\Application\Event\OrderCreatedEvent;
use Modules\Order\Application\Notification\OrderMadeNotification;
use Modules\Order\Domain\Repository\UserRepositoryInterface;
use Modules\Payment\PaymentFailed;

final readonly class OrderMadeNotificationHandler implements ShouldQueue
{
    public function __construct(
        private UserRepositoryInterface $userRepository,
    ) {
    }

    public function handle(OrderCreatedEvent $event): void
    {
        $user = $this->userRepository->get($event->order->getUserId());
        Mail::to($user->getEmail())->send(new OrderMadeNotification($event->order));
    }
}
