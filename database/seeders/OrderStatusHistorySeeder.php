<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusHistorySeeder extends Seeder
{
    public function run(): void
    {
        DB::statement("
            INSERT INTO order_status_histories (order_id, status, changed_by, created_at, updated_at) VALUES
            (1, 'pending', 1, NOW(), NOW()),
            (1, 'accepted', 2, NOW(), NOW()),
            (2, 'pending', 1, NOW(), NOW()),
            (2, 'preparing', 2, NOW(), NOW()),
            (3, 'pending', 1, NOW(), NOW()),
            (3, 'delivered', 2, NOW(), NOW()),
            (4, 'pending', 1, NOW(), NOW()),
            (4, 'completed', 2, NOW(), NOW())
        ");
    }
}
