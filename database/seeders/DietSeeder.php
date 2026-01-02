<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DietSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement("
            INSERT INTO diets (name, created_at, updated_at) VALUES
            ('Végétarien', NOW(), NOW()),
            ('Vegan', NOW(), NOW()),
            ('Sans gluten', NOW(), NOW()),
            ('Halal', NOW(), NOW()),
            ('Sans lactose', NOW(), NOW())
        ");
    }
}
