<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\ClientController;
use App\Http\Controllers\Api\V1\ProductController;
use App\Http\Controllers\Api\V1\DeliveryLocationController;
use App\Http\Controllers\Api\V1\DeliveryController;
use App\Http\Controllers\Api\V1\GeoScopeController;
use App\Http\Controllers\Api\V1\ClientTypeController;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\ProductTypeController;
use App\Http\Controllers\Api\V1\TransportTypeController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1/auth')->group(function () {
    Route::post('login', [AuthController::class, 'login'])->middleware('throttle:10,1');
});

Route::middleware('auth:sanctum')->prefix('v1')->group(function () {
    Route::get('auth/me', [AuthController::class, 'me']);
    Route::post('auth/logout', [AuthController::class, 'logout']);
    Route::post('auth/logout-all', [AuthController::class, 'logoutAll']);


    Route::get('/user', fn(Request $r) => $r->user());
    Route::apiResource('clients', ClientController::class);
    Route::apiResource('products', ProductController::class);
    Route::apiResource('delivery_locations', DeliveryLocationController::class);
    Route::apiResource('deliveries', DeliveryController::class);
    Route::get('geo_scopes', [GeoScopeController::class, 'index']);
    Route::get('geo_scopes/{id}', [GeoScopeController::class, 'show']);
    Route::get('client_type', [ClientTypeController::class, 'index']);
    Route::get('client_type/{id}', [ClientTypeController::class, 'show']);
    Route::get('product_types', [ProductTypeController::class, 'index']);
    Route::get('product_types/{id}', [ProductTypeController::class, 'show']);

    Route::get('transport_types', [TransportTypeController::class, 'index']);
    Route::get('transport_types/{id}', [TransportTypeController::class, 'show']);
});

