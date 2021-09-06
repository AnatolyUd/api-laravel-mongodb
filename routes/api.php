<?php

use App\Http\Controllers\Api\PersonsController;
use App\Http\Controllers\Api\RegsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::prefix('v1')->group(function () {
    Route::post('/persons', [PersonsController::class, 'load']);
    Route::get('/persons', [PersonsController::class, 'list']);
});

Route::prefix('v1')->group(function () {
    Route::get('/regs', [RegsController::class, 'load']);
    //Route::get('/regs', [RegsController::class, 'list']);
});
