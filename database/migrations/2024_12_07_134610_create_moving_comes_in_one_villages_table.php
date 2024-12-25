<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('moving_comes_in_one_village', function (Blueprint $table) {
            $table->id();
            $table->foreignId('request_id')->constrained();
            $table->string('number_letter')->nullable();
            // Origin details
            $table->string('origin_family_card_number')->nullable();
            $table->string('origin_head_of_family_name')->nullable();
            $table->text('origin_address')->nullable();
            $table->string('origin_rt')->nullable();
            $table->string('origin_rw')->nullable();
            $table->string('origin_hamlet')->nullable(); // 'dusun' in Indonesian
            $table->string('origin_village')->nullable();
            $table->string('origin_district')->nullable(); // 'kecamatan'
            $table->string('origin_regency')->nullable(); // 'kabupaten'
            $table->string('origin_province')->nullable();
            $table->string('origin_postal_code')->nullable();
            $table->string('origin_phone')->nullable();

            // Applicant detail
            $table->string('applicant_nik',)->unique();
            $table->string('applicant_full_name')->nullable();

            // Move reason


            // Destination details
            $table->string('destination_card_number_family')->nullable();
            $table->string('destination_nik_head_of_family')->nullable();
            $table->string('destination_name_head_of_family')->nullable();
            $table->date('destination_arrival_date')->nullable();
            $table->text('destination_address')->nullable();
            $table->string('destination_rt')->nullable();
            $table->string('destination_rw')->nullable();
            $table->string('destination_hamlet')->nullable();
            $table->string('destination_village')->nullable();
            $table->string('destination_district')->nullable();
            $table->string('destination_regency')->nullable();
            $table->string('destination_province')->nullable();
            $table->string('destination_postal_code')->nullable();
            // $table->string('destination_phone')->nullable();

            // Move type and family card status
            // $table->enum('move_type', ['Kepala Keluarga', 'Kepala Keluarga dan Semua Anggota', 'Kepala Keluarga dan Sebagai Anggota', 'Anggota Keluarga'])->nullable();
            // $table->enum('kk_status_not_moving', ['Numpang KK', 'Membuat KK Baru', 'Nomor KK Tetap'])->nullable();
            $table->enum('kk_status_moving', ['Numpang KK', 'Membuat KK Baru', 'Nomor KK Tetap'])->nullable();

            $table->timestamps(); // Created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moving_comes_in_one_villages');
    }
};
