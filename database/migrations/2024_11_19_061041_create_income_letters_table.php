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
        Schema::create('income_letters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('request_id')->constrained();
            $table->string('number_letter')->nullable();
            $table->string('name');
            $table->string('nik');
            $table->string('birth_place');
            $table->date('birth_date');
            $table->string('occupation');
            $table->text('address');
            $table->string('parent_name');
            $table->string('parent_nik');
            $table->enum('parent_gender', ['Laki-Laki', 'Perempua']);
            $table->string('parent_birth_place');
            $table->string('parent_nationality');
            $table->string('parent_religion');
            $table->text('parent_address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('income_letters');
    }
};
