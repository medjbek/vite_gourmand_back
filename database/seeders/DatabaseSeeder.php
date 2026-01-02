<?php

namespace Database\Seeders;

use Database\Seeders\AllergenSeeder;
use Database\Seeders\DietSeeder;
use Database\Seeders\DishSeeder;
use Database\Seeders\MenuDietSeeder;
use Database\Seeders\MenuDishSeeder;
use Database\Seeders\MenuImageSeeder;
use Database\Seeders\MenuSeeder;
use Database\Seeders\OpeningHoursSeeder;
use Database\Seeders\ThemeSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(ThemeSeeder::class);

        $this->call(DietSeeder::class);

        $this->call(AllergenSeeder::class);

        $this->call(DishSeeder::class);

        $this->call(DishAllergenSeeder::class);

        $this->call(MenuSeeder::class);

        $this->call(MenuDietSeeder::class);
        $this->call(MenuDishSeeder::class);
        $this->call(MenuImageSeeder::class);

        $this->call(OpeningHoursSeeder::class);
    }
}
