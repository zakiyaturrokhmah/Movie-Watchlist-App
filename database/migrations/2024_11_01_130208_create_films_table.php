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
        Schema::create('films', function (Blueprint $table) {
            $table->string('id_film')->primary();
            $table->string('judul_film')->nullable(false);
            $table->string('genre')->nullable(false);
            $table->integer('tahun_rilis')->nullable(false);
            $table->string('sutradara')->nullable(false);
            $table->string('deskripsi_film')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('films');
    }
};
