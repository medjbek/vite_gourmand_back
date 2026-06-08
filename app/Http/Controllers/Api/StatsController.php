<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mongo\MenuOrderStat;


class StatsController extends Controller
{
   public function menuOrderStats()
    {
        $stats = MenuOrderStat::orderBy('orders_count', 'desc')->get();

        return response()->json($stats);
    }
}