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
        Schema::create('birth_letters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('request_id')->constrained();
            $table->string('number_letter')->nullable();
            $table->string('family_head_name');
            $table->string('family_card_number');
            $table->string('baby_name');
            $table->string('baby_gender');
            $table->date('birth_date');
            $table->time('birth_time');
            $table->integer('birth_order');
            $table->string('birth_helper');
            $table->decimal('baby_weight');
            $table->decimal('baby_length');
            $table->string('mother_nik');
            $table->string('mother_name');
            $table->date('mother_birth_date');
            $table->integer('mother_age');
            $table->string('mother_occupation');
            $table->text('mother_address');
            $table->string('mother_nationality');
            $table->string('mother_ethnicity');
            $table->date('mother_marriage_date');
            $table->string('father_nik');
            $table->string('father_name');
            $table->date('father_birth_date');
            $table->integer('father_age');
            $table->string('father_occupation');
            $table->text('father_address');
            $table->string('father_nationality');
            $table->string('father_ethnicity');
            $table->date('father_marriage_date');
            $table->string('reporter_nik');
            $table->string('reporter_name');
            $table->integer('reporter_age');
            $table->enum('reporter_gender', ['Laki-Laki', 'Perempuan']);
            $table->string('reporter_occupation');
            $table->text('reporter_address');
            $table->string('witness1_nik')->nullable();
            $table->string('witness1_name')->nullable();
            $table->integer('witness1_age')->nullable();
            $table->string('witness1_occupation')->nullable();
            $table->text('witness1_address')->nullable();
            $table->string('witness2_nik')->nullable();
            $table->string('witness2_name')->nullable();
            $table->integer('witness2_age')->nullable();
            $table->string('witness2_occupation')->nullable();
            $table->text('witness2_address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('birth_letters');
    }
};