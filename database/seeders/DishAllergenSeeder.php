<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DishAllergenSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement("
            INSERT INTO dish_allergen (dish_id, allergen_id) VALUES
            (1, 1),
            (3, 1),
            (6, 2),
            (7, 2)
        ");
    }
}
