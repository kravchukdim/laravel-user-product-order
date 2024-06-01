<?php

use Illuminate\Support\Facades\Route;
use Modules\Order\Infrastructure\Api\Order\Controller\GetOrderController;
use Modules\Order\Infrastructure\Api\Order\Controller\MakeOrderController;

Route::group(['prefix' => 'api/order'], function() {
    Route::get('/', function () {
        return 'health';
    })->name('health');

    Route::post('/', [MakeOrderController::class, 'make'])->name('make');
    Route::get('/list', [GetOrderController::class, 'list'])->name('list');
    Route::get('/{id}', [GetOrderController::class, 'get'])->name('get');
});

