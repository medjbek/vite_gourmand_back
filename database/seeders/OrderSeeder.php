<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement("
            INSERT INTO orders
            (
                user_id, menu_id,
                customer_last_name, customer_first_name,
                customer_email, customer_phone,
                address, city, event_at, location,
                guest_count, status,
                menu_price, delivery_price, discount, total_price,
                created_at, updated_at
            )
            VALUES
            (
                1, 1,
                'Dupont', 'Jean',
                'jean.dupont@test.fr', '0600000000',
                '10 rue de Paris', 'Toulouse',
                DATE_ADD(NOW(), INTERVAL 10 DAY),
                'Salle des fêtes',
                20, 'accepted',
                25.00, 50.00, 0.00, 550.00,
                NOW(), NOW()
            ),
            (
                1, 2,
                'Martin', 'Claire',
                'claire.martin@test.fr', '0611111111',
                '5 avenue du Midi', 'Toulouse',
                DATE_ADD(NOW(), INTERVAL 5 DAY),
                'Domicile',
                10, 'preparing',
                22.00, 30.00, 10.00, 240.00,
                NOW(), NOW()
            ),
            (
                2, 3,
                'Durand', 'Paul',
                'paul.durand@test.fr', '0622222222',
                '18 rue Alsace', 'Blagnac',
                DATE_SUB(NOW(), INTERVAL 2 DAY),
                'Entreprise',
                15, 'delivered',
                27.00, 40.00, 0.00, 445.00,
                NOW(), NOW()
            ),
            (
                2, 6,
                'Bernard', 'Sophie',
                'sophie.bernard@test.fr', '0633333333',
                '3 place du Capitole', 'Toulouse',
                DATE_SUB(NOW(), INTERVAL 7 DAY),
                'Salle privée',
                30, 'completed',
                35.00, 80.00, 20.00, 1110.00,
                NOW(), NOW()
            )
        ");
    }
}
