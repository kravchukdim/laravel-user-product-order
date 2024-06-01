<?php

use Illuminate\Support\Facades\Route;
use Modules\Order\Order;
use Modules\User\Infrastructure\Api\User\Controller\GetUserController;
use Modules\User\Infrastructure\Api\User\Controller\MakeUserController;

Route::group(['prefix' => 'api/user'], function() {
    Route::get('/', function () {
        return 'health';
    })->name('health');

    Route::post('/', [MakeUserController::class, 'make'])->name('make');
    Route::get('/list', [GetUserController::class, 'list'])->name('list');
    Route::get('/{id}', [GetUserController::class, 'get'])->name('get');
});
