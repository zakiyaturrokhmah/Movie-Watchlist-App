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
        Schema::create('watchlists', function (Blueprint $table) {
            $table->string('id_watchlists')->primary();
            $table->string('id_pengguna');
            $table->string('id_film');
            $table->enum('status', ['belum ditonton', 'sudah ditonton'])->default('belum ditonton');
            $table->date('tanggal_ditambahkan')->default(now());
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
        Schema::dropIfExists('watchlists');
    }
};
