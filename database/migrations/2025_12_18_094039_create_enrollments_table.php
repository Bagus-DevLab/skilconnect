<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Tabel untuk menyimpan data pendaftaran kursus dan pembayaran
     */
    public function up(): void
    {
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            
            // ==========================================
            // RELASI (NULLABLE UNTUK GUEST ENROLLMENT)
            // ==========================================
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade'); // ✅ NULLABLE
            $table->foreignId('course_id')->nullable()->constrained()->onDelete('cascade'); // ✅ NULLABLE
            
            // ==========================================
            // INFORMASI KURSUS (DARI FORM)
            // ==========================================
            $table->string('course_name'); // ✅ TAMBAHAN: nama kursus dari form
            $table->string('course_price'); // ✅ TAMBAHAN: harga dari form
            $table->string('course_duration'); // ✅ TAMBAHAN: durasi dari form
            
            // ==========================================
            // INFORMASI PENDAFTAR (DARI FORM)
            // ==========================================
            $table->string('full_name'); // ✅ TAMBAHAN: nama lengkap
            $table->string('email'); // ✅ TAMBAHAN: email
            $table->string('phone'); // ✅ TAMBAHAN: nomor HP
            $table->string('occupation')->nullable(); // ✅ TAMBAHAN: pekerjaan
            $table->text('goals')->nullable(); // ✅ TAMBAHAN: tujuan belajar
            
            // ==========================================
            // INFORMASI PEMBAYARAN
            // ==========================================
            $table->string('payment_method')->nullable(); // transfer, ewallet
            $table->string('payment_proof')->nullable(); // nama file bukti transfer
            $table->enum('payment_status', ['pending', 'confirmed', 'rejected'])->default('pending');
            $table->text('rejection_reason')->nullable(); // alasan jika pembayaran ditolak
            $table->timestamp('confirmed_at')->nullable(); // waktu pembayaran dikonfirmasi
            
            // ==========================================
            // INFORMASI PROGRESS KURSUS
            // ==========================================
            $table->integer('progress')->default(0); // progress belajar (0-100%)
            $table->integer('completed_lessons')->default(0); // jumlah pelajaran yang sudah selesai
            $table->integer('total_lessons')->default(0); // total pelajaran dalam kursus
            $table->enum('status', ['pending', 'active', 'completed', 'approved', 'rejected'])->default('pending'); 
            // pending = menunggu konfirmasi, active = sedang belajar, completed = selesai, approved = disetujui, rejected = ditolak
            
            // ==========================================
            // INFORMASI SERTIFIKAT
            // ==========================================
            $table->string('certificate_number')->nullable(); // nomor sertifikat
            $table->timestamp('completed_at')->nullable(); // waktu kursus selesai
            
            $table->timestamps();
            
            // Index untuk optimasi query
            $table->index(['user_id', 'course_id']);
            $table->index('payment_status');
            $table->index('status');
            $table->index('email'); // ✅ TAMBAHAN: index email untuk pencarian
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};