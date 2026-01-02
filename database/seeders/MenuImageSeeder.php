<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement("
            INSERT INTO menu_images (menu_id, path, created_at, updated_at) VALUES
            (1, 'menus/menu1_image1.jpg', NOW(), NOW()),
            (1, 'menus/menu1_image2.jpg', NOW(), NOW()),
            (2, 'menus/menu2_image1.jpg', NOW(), NOW()),
            (2, 'menus/menu2_image2.jpg', NOW(), NOW()),
            (3, 'menus/menu3_image1.jpg', NOW(), NOW()),
            (3, 'menus/menu3_image2.jpg', NOW(), NOW()),
            (4, 'menus/menu4_image1.jpg', NOW(), NOW()),
            (4, 'menus/menu4_image2.jpg', NOW(), NOW()),
            (5, 'menus/menu5_image1.jpg', NOW(), NOW()),
            (5, 'menus/menu5_image2.jpg', NOW(), NOW())
        ");
    }
}
