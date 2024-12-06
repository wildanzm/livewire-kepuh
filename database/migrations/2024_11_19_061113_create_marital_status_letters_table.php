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
        Schema::create('marital_status_letters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('request_id')->constrained();
            $table->string('number_letter')->nullable();
            $table->string('name');
            $table->string('birth_place');
            $table->date('birth_date');
            $table->string('religion');
            $table->string('occupation');
            $table->enum('gender', ['Laki-Laki', 'Perempuan']);
            $table->text('address');
            $table->enum('marital_status', ['Kawin', 'Belum Kawin']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marital_status_letters');
    }
};
