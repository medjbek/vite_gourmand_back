<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("
            CREATE TABLE opening_hours (
                id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                day ENUM(
                    'Lundi','Mardi','Mercredi',
                    'Jeudi','Vendredi','Samedi','Dimanche'
                ) NOT NULL,
                opens_at TIME NOT NULL,
                closes_at TIME NOT NULL,
                is_closed TINYINT(1) NOT NULL DEFAULT 0,
                created_at TIMESTAMP NULL,
                updated_at TIMESTAMP NULL,
                UNIQUE KEY unique_day (day)
            );
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP TABLE IF EXISTS opening_hours;");
    }
};
