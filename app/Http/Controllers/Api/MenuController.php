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
        $menus = $this->menuService->getMenus();

        return response()->json($menus);
    }
}
