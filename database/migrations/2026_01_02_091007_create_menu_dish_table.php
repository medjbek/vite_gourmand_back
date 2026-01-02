<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            CREATE TABLE menu_dish (
                menu_id BIGINT UNSIGNED NOT NULL,
                dish_id BIGINT UNSIGNED NOT NULL,
                PRIMARY KEY (menu_id, dish_id),
                CONSTRAINT fk_menu_dish_menu
                    FOREIGN KEY (menu_id) REFERENCES menus(id)
                    ON DELETE CASCADE,
                CONSTRAINT fk_menu_dish_dish
                    FOREIGN KEY (dish_id) REFERENCES dishes(id)
                    ON DELETE CASCADE
            );
        ");
    }

    public function down(): void
    {
        DB::statement("DROP TABLE IF EXISTS menu_dish;");
    }
};
