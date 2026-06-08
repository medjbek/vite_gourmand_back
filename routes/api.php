<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\OpeningHourController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\MenuController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\FilterController;
use App\Http\Controllers\Api\StatsController;

Route::get('/opening-hours', [OpeningHourController::class, 'index']);

Route::post('/contact', [ContactController::class, 'send']);

Route::get('/menus', [MenuController::class, 'index']);
Route::get('/menus/{id}', [MenuController::class, 'show']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

Route::get('/themes', [FilterController::class, 'themes']);
Route::get('/diets', [FilterController::class, 'diets']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/my-orders', [OrderController::class, 'index']);
    Route::get('/orders', [OrderController::class, 'all']);
    Route::post('/orders', [OrderController::class, 'store']);
    Route::patch('/orders/{id}/status', [OrderController::class, 'updateStatus']);
    Route::post('/admin/create-user', [AuthController::class, 'createUserByAdmin']);
    Route::get('/admin/menu-order-stats', [StatsController::class, 'menuOrderStats']);
});