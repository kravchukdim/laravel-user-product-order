<?php

namespace Modules\Product\Infrastructure\Provider;

use Illuminate\Support\ServiceProvider;
use Modules\Product\Domain\Repository\GetProductByIdInterface;
use Modules\Product\Domain\Repository\MakeProductInterface;
use Modules\Product\Infrastructure\Api\Api;
use Modules\Product\Infrastructure\Api\ProductApiInterface;
use Modules\Product\Infrastructure\Dto\Product\ProductDtoTransformer;
use Modules\Product\Infrastructure\Dto\Product\ProductDtoTransformerInterface;
use Modules\Product\Infrastructure\Factory\ProductModelFactoryInterface;
use Modules\Product\Infrastructure\Factory\ProductModelModelFactory;
use Modules\Product\Infrastructure\Repository\Product\GetProductByIdRepository;
use Modules\Product\Infrastructure\Repository\Product\MakeProductRepository;

class ProductServiceProvider extends ServiceProvider
{
    public function boot()
    {
        foreach ($this->dI() as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }

        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');
        $this->mergeConfigFrom(__DIR__.'/../config.php', 'product');

        $this->app->register(EventServiceProvider::class);
        $this->app->register(RouteServiceProvider::class);
    }

    private function dI(): array
    {
        return [
            GetProductByIdInterface::class => GetProductByIdRepository::class,
            MakeProductInterface::class => MakeProductRepository::class,

            ProductDtoTransformerInterface::class => ProductDtoTransformer::class,
            ProductModelFactoryInterface::class => ProductModelModelFactory::class,
            ProductApiInterface::class => Api::class,
        ];
    }
}
