<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category');
            $table->string('duration'); // Contoh: '8 Minggu'
            $table->integer('participants')->default(0);
            $table->decimal('price', 10, 0); // Harga dalam Rupiah
            $table->string('icon_class')->nullable(); // Class ikon Font Awesome
            $table->timestamps();
        });
    }

    /**
     * Batalkan migrasi.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};