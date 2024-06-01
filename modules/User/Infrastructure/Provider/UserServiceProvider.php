<?php

namespace Modules\User\Infrastructure\Provider;

use Illuminate\Support\ServiceProvider;
use Modules\User\Domain\Repository\GetUserByIdInterface;
use Modules\User\Domain\Repository\MakeUserInterface;
use Modules\User\Infrastructure\Api\Api;
use Modules\User\Infrastructure\Api\UserApiInterface;
use Modules\User\Infrastructure\Dto\User\UserDtoTransformer;
use Modules\User\Infrastructure\Dto\User\UserDtoTransformerInterface;
use Modules\User\Infrastructure\Factory\UserModelFactoryInterface;
use Modules\User\Infrastructure\Factory\UserModelModelFactory;
use Modules\User\Infrastructure\Repository\User\GetUserByIdRepository;
use Modules\User\Infrastructure\Repository\User\MakeUserRepository;

class UserServiceProvider extends ServiceProvider
{
    public function boot()
    {
        foreach ($this->dI() as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }

        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');
        $this->mergeConfigFrom(__DIR__.'/../config.php', 'user');

        $this->app->register(EventServiceProvider::class);
        $this->app->register(RouteServiceProvider::class);
    }

    private function dI(): array
    {
        return [
            GetUserByIdInterface::class => GetUserByIdRepository::class,
            MakeUserInterface::class => MakeUserRepository::class,

            UserDtoTransformerInterface::class => UserDtoTransformer::class,
            UserModelFactoryInterface::class => UserModelModelFactory::class,
            UserApiInterface::class => Api::class,
        ];
    }
}
