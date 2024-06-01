<?php

use Illuminate\Support\Facades\Route;
use Modules\Order\Order;
use Modules\Product\Infrastructure\Api\Product\Controller\GetProductController;
use Modules\Product\Infrastructure\Api\Product\Controller\MakeProductController;

Route::group(['prefix' => 'api/product'], function() {
    Route::get('/', function () {
        return 'health';
    })->name('health');

    Route::post('/', [MakeProductController::class, 'make'])->name('make');
    Route::get('/list', [GetProductController::class, 'list'])->name('list');
    Route::get('/{id}', [GetProductController::class, 'get'])->name('get');
});
