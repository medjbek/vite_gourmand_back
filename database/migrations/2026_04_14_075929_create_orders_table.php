<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        DB::statement("
            CREATE TABLE orders (
                id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                user_id BIGINT UNSIGNED NOT NULL,
                menu_id BIGINT UNSIGNED NOT NULL,

                customer_last_name VARCHAR(255) NOT NULL,
                customer_first_name VARCHAR(255) NOT NULL,
                customer_email VARCHAR(255) NOT NULL,
                customer_phone VARCHAR(20) NOT NULL,

                address VARCHAR(255) NOT NULL,
                city VARCHAR(255) NOT NULL,

                event_at DATETIME NOT NULL,

                location VARCHAR(255) NOT NULL,

                guest_count INT UNSIGNED NOT NULL,

                status ENUM(
                    'pending',
                    'accepted',
                    'preparing',
                    'delivering',
                    'delivered',
                    'waiting_return',
                    'completed',
                    'cancelled'
                ) NOT NULL DEFAULT 'pending',

                menu_price DECIMAL(8,2) NOT NULL,
                delivery_price DECIMAL(8,2) NOT NULL,
                discount DECIMAL(8,2) NOT NULL DEFAULT 0.00,
                total_price DECIMAL(8,2) NOT NULL,

                cancellation_reason TEXT DEFAULT NULL,
                cancellation_contact_method ENUM('phone','email') DEFAULT NULL,

                created_at TIMESTAMP NULL,
                updated_at TIMESTAMP NULL,

                CONSTRAINT orders_user_fk
                    FOREIGN KEY (user_id) REFERENCES users(id),
                CONSTRAINT orders_menu_fk
                    FOREIGN KEY (menu_id) REFERENCES menus(id)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
        ");
    }

    public function down(): void
    {
        DB::statement("DROP TABLE IF EXISTS orders;");
    }
};
