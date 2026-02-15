<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OpeningHour;
use App\Services\OpeningHourService;
use Illuminate\Http\Request;

class OpeningHourController extends Controller
{
    public function __construct(
        private OpeningHourService $openingHourService
    ) {
    }

    public function index()
    {
        return response()->json(
            $this->openingHourService->getAll()
        );
    }
}
