<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\OpeningHourController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\MenuController;

Route::get('/opening-hours', [OpeningHourController::class, 'index']);

Route::post('/contact', [ContactController::class, 'send']);

Route::get('/menus', [MenuController::class, 'index']);
Route::get('/menus/{id}', [MenuController::class, 'show']);
