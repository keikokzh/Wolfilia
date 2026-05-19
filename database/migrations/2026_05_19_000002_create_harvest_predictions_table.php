<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('harvest_predictions', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_tebar');
            $table->decimal('berat_bibit_gram', 8, 2);
            $table->date('prediksi_panen_awal');
            $table->date('prediksi_panen_akhir');
            $table->decimal('estimasi_hasil_gram', 10, 2);
            $table->enum('status', ['menunggu', 'siap_panen', 'sudah_panen'])->default('menunggu');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('harvest_predictions');
    }
};
