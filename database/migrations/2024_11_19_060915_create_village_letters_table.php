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
        Schema::create('village_letters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('request_id')->constrained();
            $table->string('number_letter')->nullable();
            $table->string('sppt_number');
            $table->string('persil_number');
            $table->string('kohir_number');
            $table->string('class');
            $table->decimal('land_area');
            $table->string('land_owner');
            $table->string('north_border');
            $table->string('east_border');
            $table->string('south_border');
            $table->string('west_border');
            // Menambahkan kolom baru untuk Letter C dan harga taksiran
            $table->string('letter_c_number')->nullable(); // Kolom untuk "Letter C No ..."
            $table->decimal('land_assessment_price', 50, 2)->nullable(); // Kolom untuk harga taksiran tanah
            $table->decimal('building_assessment_price', 50, 2)->nullable(); // Kolom untuk harga taksiran bangunan
            $table->decimal('total_assessment_price', 50, 2)->nullable(); // Kolom untuk jumlah total
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('village_letters');
    }
};