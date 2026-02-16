<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThemeSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement("
            INSERT IGNORE INTO themes (name, created_at, updated_at) VALUES
            ('Noël', NOW(), NOW()),
            ('Pâques', NOW(), NOW()),
            ('Classique', NOW(), NOW()),
            ('Évènement', NOW(), NOW())
        ");
    }
}
