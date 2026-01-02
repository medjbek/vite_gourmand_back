<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            CREATE TABLE menu_diet (
                id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                menu_id BIGINT UNSIGNED NOT NULL,
                diet_id BIGINT UNSIGNED NOT NULL,
                UNIQUE KEY menu_diet_unique (menu_id, diet_id),
                CONSTRAINT menu_diet_menu_id_foreign FOREIGN KEY (menu_id) REFERENCES menus(id) ON DELETE CASCADE,
                CONSTRAINT menu_diet_diet_id_foreign FOREIGN KEY (diet_id) REFERENCES diets(id) ON DELETE CASCADE
            );
        ");
    }

    public function down(): void
    {
        DB::statement("DROP TABLE IF EXISTS menu_diet;");
    }
};
