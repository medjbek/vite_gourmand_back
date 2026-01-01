<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OpeningHoursSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement("
            INSERT INTO opening_hours (day, opens_at, closes_at, is_closed, created_at, updated_at) VALUES
            ('Lundi', '00:00:00', '00:00:00', 1, NOW(), NOW()),
            ('Mardi', '10:00:00', '22:00:00', 0, NOW(), NOW()),
            ('Mercredi', '10:00:00', '22:00:00', 0, NOW(), NOW()),
            ('Jeudi', '10:00:00', '22:00:00', 0, NOW(), NOW()),
            ('Vendredi', '10:00:00', '23:00:00', 0, NOW(), NOW()),
            ('Samedi', '11:00:00', '23:00:00', 0, NOW(), NOW()),
            ('Dimanche', '00:00:00', '00:00:00', 1, NOW(), NOW());
        ");
    }
}
