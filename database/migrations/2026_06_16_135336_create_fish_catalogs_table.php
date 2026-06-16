<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fish_catalogs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('scientific_name')->nullable();
            $table->string('status_badge')->nullable();
            $table->string('popularity_badge')->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->text('whatsapp_text')->nullable();
            $table->json('habitat')->nullable();
            $table->json('cycle')->nullable();
            $table->json('advantages')->nullable();
            $table->json('pricing')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fish_catalogs');
    }
};
