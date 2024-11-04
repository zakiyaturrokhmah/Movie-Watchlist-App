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
        Schema::create('ulasans', function (Blueprint $table) {
            $table->string('id_ulasan')->primary();
            $table->string('id_pengguna');
            $table->string('id_film');
            $table->decimal('rating', 3, 2);
            $table->string('ulasan')->nullable(false);
            $table->date('tanggal_ulasan')->default(now());
            $table->timestamps();

            $table->foreign('id_pengguna')->references('id_pengguna')->on('penggunas')->onDelete('cascade');
            $table->foreign('id_film')->references('id_film')->on('films')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ulasans');
    }
};
