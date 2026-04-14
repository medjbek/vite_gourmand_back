<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        DB::statement("
            CREATE TABLE order_status_histories (
                id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                order_id BIGINT UNSIGNED NOT NULL,
                status VARCHAR(255) NOT NULL,
                changed_by BIGINT UNSIGNED NOT NULL,

                created_at TIMESTAMP NULL,
                updated_at TIMESTAMP NULL,

                CONSTRAINT order_status_histories_order_fk
                    FOREIGN KEY (order_id) REFERENCES orders(id),
                CONSTRAINT order_status_histories_user_fk
                    FOREIGN KEY (changed_by) REFERENCES users(id)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
        ");
    }

    public function down(): void
    {
        DB::statement("DROP TABLE IF EXISTS order_status_histories;");
    }
};
