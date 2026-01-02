<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThemeSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement("
            INSERT INTO themes (name, created_at, updated_at) VALUES
            ('Cuisine française', NOW(), NOW()),
            ('Cuisine italienne', NOW(), NOW()),
            ('Cuisine asiatique', NOW(), NOW()),
            ('Cuisine végétarienne', NOW(), NOW()),
            ('Cuisine festive', NOW(), NOW())
        ");
    }
}
