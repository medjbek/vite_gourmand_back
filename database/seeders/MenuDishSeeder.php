<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuDishSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement("
            INSERT INTO menu_dish (menu_id, dish_id) VALUES
            -- Menu Tradition
            (1, 1),
            (1, 3),
            (1, 6),

            -- Menu Végétarien
            (2, 2),
            (2, 5),
            (2, 7),

            -- Menu Italien
            (3, 2),
            (3, 4),
            (3, 6),

            -- Menu Asiatique
            (4, 1),
            (4, 5),
            (4, 7),

            -- Menu Vegan
            (5, 5),
            (5, 7),

            -- Menu Festif
            (6, 1),
            (6, 3),
            (6, 4),
            (6, 6),
            (6, 7)
        ");
    }
}
