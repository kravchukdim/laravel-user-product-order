<?php

namespace Modules\User\Infrastructure\Provider;


use Illuminate\Foundation\Support\Providers\RouteServiceProvider as BaseRouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Cache\RateLimiting\Limit;

class RouteServiceProvider extends BaseRouteServiceProvider
{
    public function boot(): void
    {
        RateLimiter::for('user', function (Request $request) {
            return Limit::perMinute(config('user.request_limit_per_minute', 60))->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware('api')
                ->as('user::')
                ->group(__DIR__.'/../Api/routes.php');
        });
    }
}
