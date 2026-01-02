<?php

namespace App\Services;

use App\Models\Menu;

class MenuService
{
    public function getMenus(array $filters = [], int $perPage = 10)
    {
        $query = Menu::with(['theme', 'diets', 'dishes.allergens', 'images']);

        if (!empty($filters['theme_id'])) {
            $query->where('theme_id', $filters['theme_id']);
        }

        if (!empty($filters['diet_id'])) {
            $query->whereHas('diets', function ($q) use ($filters) {
                $q->where('id', $filters['diet_id']);
            });
        }

        if (!empty($filters['price_min'])) {
            $query->where('base_price', '>=', $filters['price_min']);
        }

        if (!empty($filters['price_max'])) {
            $query->where('base_price', '<=', $filters['price_max']);
        }

        if (!empty($filters['min_people'])) {
            $query->where('minimum_people', '>=', $filters['min_people']);
        }

        return $query->orderBy('title')
                     ->paginate($perPage);
    }

    public function getMenuById(int $id)
    {
        return Menu::with(['theme', 'diets', 'dishes.allergens', 'images'])
                   ->findOrFail($id);
    }
}
