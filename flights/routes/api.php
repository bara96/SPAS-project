<?php

use App\Http\Controllers\FlightsController;
use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('flight/{id?}', [FlightsController::class, 'getFlights'])->name('getFlights');

Route::get('endpoint1', [FlightsController::class, 'endpoint1']);
Route::get('endpoint2', [FlightsController::class, 'endpoint2']);
Route::get('endpoint3', [FlightsController::class, 'endpoint3']);
