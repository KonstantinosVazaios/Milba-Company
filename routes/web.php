<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WatersportController;
use App\Http\Controllers\EndOfDayController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->prefix('/admin')->group(function () {

    // Route::view('/', 'backoffice.statistics');

    Route::get('/end-of-day', [EndOfDayController::class, 'index']);

    Route::get('/watersports/create', [WatersportController::class, 'create']);
    Route::post('/watersports/create', [WatersportController::class, 'store']);
    Route::get('/watersports/{watersport}', [WatersportController::class, 'show']);

    Route::get('/orders', [OrderController::class, 'index']);
    Route::get('/orders/create', [OrderController::class, 'create']);
}); 