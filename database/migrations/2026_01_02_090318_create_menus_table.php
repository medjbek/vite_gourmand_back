<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            CREATE TABLE menus (
                id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                title VARCHAR(255) NOT NULL,
                description TEXT NOT NULL,
                theme_id BIGINT UNSIGNED NOT NULL,
                minimum_people INT NOT NULL,
                base_price DECIMAL(10,2) NOT NULL,
                stock INT NOT NULL DEFAULT 0,
                conditions TEXT NULL,
                created_at TIMESTAMP NULL DEFAULT NULL,
                updated_at TIMESTAMP NULL DEFAULT NULL,
                CONSTRAINT fk_menus_theme
                    FOREIGN KEY (theme_id) REFERENCES themes(id)
            );
        ");
    }

    public function down(): void
    {
        DB::statement("DROP TABLE IF EXISTS menus;");
    }
};
