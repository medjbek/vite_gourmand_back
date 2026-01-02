<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AllergenSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement("
            INSERT INTO allergens (name, created_at, updated_at) VALUES
            ('Gluten', NOW(), NOW()),
            ('Lactose', NOW(), NOW()),
            ('Arachides', NOW(), NOW()),
            ('Fruits de mer', NOW(), NOW()),
            ('Œufs', NOW(), NOW())
        ");
    }
}
