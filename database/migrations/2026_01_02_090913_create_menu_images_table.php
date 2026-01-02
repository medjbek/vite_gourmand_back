<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            CREATE TABLE menu_images (
                id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                menu_id BIGINT UNSIGNED NOT NULL,
                path VARCHAR(255) NOT NULL,
                created_at TIMESTAMP NULL DEFAULT NULL,
                updated_at TIMESTAMP NULL DEFAULT NULL,
                CONSTRAINT fk_menu_images_menu
                    FOREIGN KEY (menu_id) REFERENCES menus(id)
                    ON DELETE CASCADE
            );
        ");
    }

    public function down(): void
    {
        DB::statement("DROP TABLE IF EXISTS menu_images;");
    }
};
