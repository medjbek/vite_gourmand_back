<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mongo\MenuOrderStat;

class MenuOrderStatSeeder extends Seeder
{
    public function run(): void
    {
        MenuOrderStat::truncate();

        MenuOrderStat::create([
            'menu_id' => 1,
            'menu_name' => 'Menu Découverte',
            'date' => now()->toDateString(),
            'orders_count' => 8,
            'total_revenue' => 2200,
        ]);

        MenuOrderStat::create([
            'menu_id' => 2,
            'menu_name' => 'Menu Végétarien',
            'date' => now()->toDateString(),
            'orders_count' => 5,
            'total_revenue' => 1250,
        ]);
    }
}