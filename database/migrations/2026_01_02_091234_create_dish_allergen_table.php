<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            CREATE TABLE dish_allergen (
                dish_id BIGINT UNSIGNED NOT NULL,
                allergen_id BIGINT UNSIGNED NOT NULL,
                PRIMARY KEY (dish_id, allergen_id),
                CONSTRAINT fk_dish_allergen_dish
                    FOREIGN KEY (dish_id) REFERENCES dishes(id)
                    ON DELETE CASCADE,
                CONSTRAINT fk_dish_allergen_allergen
                    FOREIGN KEY (allergen_id) REFERENCES allergens(id)
                    ON DELETE CASCADE
            );
        ");
    }

    public function down(): void
    {
        DB::statement("DROP TABLE IF EXISTS dish_allergen;");
    }
};
