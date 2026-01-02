<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\MenuService;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    protected MenuService $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function index(Request $request)
    {
        $filters = $request->only([
            'theme_id',
            'diet_id',
            'price_min',
            'price_max',
            'min_people'
        ]);

        $menus = $this->menuService->getMenus($filters, 10);

        return response()->json($menus);
    }
}
