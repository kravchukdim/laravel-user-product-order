<?php

namespace Modules\Order\Infrastructure\Provider;


use Illuminate\Foundation\Support\Providers\RouteServiceProvider as BaseRouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Cache\RateLimiting\Limit;

class RouteServiceProvider extends BaseRouteServiceProvider
{
    public function boot(): void
    {
        RateLimiter::for('order', function (Request $request) {
            return Limit::perMinute(config('order.request_limit_per_minute', 60))->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware('api')
                ->as('order::')
                ->group(__DIR__.'/../Api/routes.php');
        });
    }
}
