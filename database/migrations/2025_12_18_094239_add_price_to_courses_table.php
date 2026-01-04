<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            // Kolom price sudah ada, skip
            
            // Ubah duration dari varchar ke int (kalau mau)
            // $table->integer('duration_weeks')->default(4)->comment('Durasi dalam minggu');
            
            // Tambah total_lessons (yang belum ada)
            if (!Schema::hasColumn('courses', 'total_lessons')) {
                $table->integer('total_lessons')->default(0);
            }
            
            // Kolom icon_class sudah ada dengan nama berbeda
            // Jika mau rename: icon_class -> icon
            // DB::statement('ALTER TABLE courses CHANGE icon_class icon VARCHAR(255)');
        });
    }

    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn(['total_lessons']);
        });
    }
};