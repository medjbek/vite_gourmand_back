<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DishSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement("
            INSERT INTO dishes (name, description, type, is_active, created_at, updated_at) VALUES
            ('Soupe à l’oignon', 'Soupe traditionnelle française', 'starter', 1, NOW(), NOW()),
            ('Salade césar', 'Salade fraîche au poulet', 'starter', 1, NOW(), NOW()),
            ('Bœuf bourguignon', 'Plat mijoté au vin rouge', 'main', 1, NOW(), NOW()),
            ('Lasagnes maison', 'Lasagnes à la bolognaise', 'main', 1, NOW(), NOW()),
            ('Curry de légumes', 'Plat végétarien épicé', 'main', 1, NOW(), NOW()),
            ('Tarte aux pommes', 'Dessert classique', 'dessert', 1, NOW(), NOW()),
            ('Mousse au chocolat', 'Dessert gourmand', 'dessert', 1, NOW(), NOW())
        ");
    }
}
