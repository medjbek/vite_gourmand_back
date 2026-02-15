<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement("
            INSERT INTO menus (title, description, theme_id, minimum_people, base_price, stock, conditions, created_at, updated_at) VALUES
            (
                'Menu Tradition',
                'Un menu typiquement français',
                1,
                10,
                25.00,
                50,
                'Réservation 48h à l’avance',
                NOW(),
                NOW()
            ),
            (
                'Menu Végétarien',
                'Menu sans viande, équilibré et savoureux',
                4,
                8,
                22.00,
                40,
                NULL,
                NOW(),
                NOW()
            ),
            (
                'Menu Italien',
                'Saveurs italiennes authentiques',
                2,
                12,
                27.00,
                30,
                NULL,
                NOW(),
                NOW()
            ),
            (
                'Menu Asiatique',
                'Cuisine asiatique variée et parfumée',
                3,
                15,
                29.00,
                25,
                'Plats légèrement épicés',
                NOW(),
                NOW()
            ),
            (
                'Menu Vegan',
                'Menu 100% végétal',
                4,
                10,
                24.00,
                35,
                NULL,
                NOW(),
                NOW()
            ),
            (
                'Menu Festif',
                'Menu idéal pour événements et réceptions',
                3,
                20,
                35.00,
                15,
                'Minimum 20 personnes',
                NOW(),
                NOW()
            )
        ");
    }
}
