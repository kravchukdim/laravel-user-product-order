<?php

namespace Modules\Order\Infrastructure\Provider;

use Illuminate\Support\ServiceProvider;
use Modules\Order\Domain\Repository\OrderRepositoryInterface;
use Modules\Order\Domain\Repository\ProductRepositoryInterface;
use Modules\Order\Domain\Repository\UserRepositoryInterface;
use Modules\Order\Infrastructure\Api\Api;
use Modules\Order\Infrastructure\Api\OrderApiInterface;
use Modules\Order\Infrastructure\Dto\Order\OrderDtoTransformer;
use Modules\Order\Infrastructure\Dto\Order\OrderDtoTransformerInterface;
use Modules\Order\Infrastructure\Dto\OrderItem\OrderItemDtoTransformer;
use Modules\Order\Infrastructure\Dto\OrderItem\OrderItemDtoTransformerInterface;
use Modules\Order\Infrastructure\Factory\Order\OrderModelFactoryInterface;
use Modules\Order\Infrastructure\Factory\Order\OrderModelModelFactory;
use Modules\Order\Infrastructure\Factory\OrderItem\OrderItemModelFactoryInterface;
use Modules\Order\Infrastructure\Factory\OrderItem\OrderItemModelModelFactory;
use Modules\Order\Infrastructure\Factory\OrderItem\UserModelModelFactory;
use Modules\Order\Infrastructure\Repository\Order\OrderRepository;
use Modules\Order\Infrastructure\Repository\Product\ProductRepository;
use Modules\Order\Infrastructure\Repository\User\UserRepository;

class OrderServiceProvider extends ServiceProvider
{
    public function boot()
    {
        foreach ($this->dI() as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }

        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');
        $this->mergeConfigFrom(__DIR__.'/../config.php', 'order');
        $this->loadViewsFrom(__DIR__ . '/../../Ui/Views', 'order');

        $this->app->register(EventServiceProvider::class);
        $this->app->register(RouteServiceProvider::class);
    }

    private function dI(): array
    {
        return [
            OrderApiInterface::class => Api::class,
            OrderRepositoryInterface::class => OrderRepository::class,
            ProductRepositoryInterface::class => ProductRepository::class,
            UserRepositoryInterface::class => UserRepository::class,
            OrderDtoTransformerInterface::class => OrderDtoTransformer::class,
            OrderItemDtoTransformerInterface::class => OrderItemDtoTransformer::class,
            OrderModelFactoryInterface::class => OrderModelModelFactory::class,
            OrderItemModelFactoryInterface::class => OrderItemModelModelFactory::class,
        ];
    }
}
