<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\FilterService;

class FilterController extends Controller
{
    protected FilterService $filterService;

    public function __construct(FilterService $filterService)
    {
        $this->filterService = $filterService;
    }

    public function themes()
    {
        return response()->json($this->filterService->getThemes());
    }

    public function diets()
    {
        return response()->json($this->filterService->getDiets());
    }
}
