<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // Migration untuk tabel families
    public function up()
    {
        Schema::create('families', function (Blueprint $table) {
            $table->id();
            $table->string('nik');  // Nomor Induk Kependudukan
            $table->string('name');  // Nama Lengkap
            $table->date('ktp_expiry');  // Masa Berlaku KTP
            $table->string('shdk');  // Status Hubungan Dalam Keluarga
            $table->foreignId('request_id')->constrained()->onDelete('cascade');  // Relasi dengan tabel requests
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('families');
    }
};
