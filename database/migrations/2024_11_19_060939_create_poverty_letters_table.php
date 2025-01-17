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
        Schema::create('poverty_letters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('request_id')->constrained();
            $table->string('number_letter')->nullable();
            $table->string('name');
            $table->string('nik');
            $table->enum('gender', ['Laki-Laki', 'Perempuan']);
            $table->string('birth_place');
            $table->date('birth_date');
            $table->string('nationality');
            $table->string('religion');
            $table->string('occupation');
            $table->text('address');
            $table->string('purpose');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('poverty_letters');
    }
};
