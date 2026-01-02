<?php

namespace App\Services;

use App\Models\Menu;

class MenuService
{
    public function getMenus(int $perPage = 10)
    {
        $query = Menu::with(['theme', 'diets', 'dishes.allergens', 'images']);

        return $query->orderBy('title')
                     ->paginate($perPage);
    }
}
