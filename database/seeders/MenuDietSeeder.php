<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuDietSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement("
            INSERT INTO menu_diet (menu_id, diet_id) VALUES
            -- Menu Végétarien
            (2, 1),

            -- Menu Italien
            (3, 4),

            -- Menu Asiatique
            (4, 4),

            -- Menu Vegan
            (5, 2),
            (5, 3),
            (5, 5)
        ");
    }
}
