<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('seed_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('jenis_bibit'); // jenis bibit yang dibutuhkan
            $table->decimal('jumlah_gram', 10, 2); // jumlah dalam gram
            $table->text('keterangan')->nullable(); // catatan tambahan
            $table->enum('status', ['pending', 'diproses', 'tersedia', 'selesai', 'ditolak'])->default('pending');
            $table->text('catatan_admin')->nullable(); // catatan dari admin
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('seed_requests');
    }
};
