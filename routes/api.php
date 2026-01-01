<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\OpeningHourController;

Route::get('/opening-hours', [OpeningHourController::class, 'index']);
