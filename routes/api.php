<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\OpeningHourController;
use App\Http\Controllers\Api\ContactController;

Route::get('/opening-hours', [OpeningHourController::class, 'index']);

Route::post('/contact', [ContactController::class, 'send']);
