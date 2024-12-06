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
        Schema::create('different_name_letters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('request_id')->constrained();
            $table->string('number_letter')->nullable();
            $table->string('name');
            $table->string('birth_place');
            $table->date('birth_date');
            $table->text('address');
            $table->string('document_name');
            $table->string('family_card_number');
            $table->string('same_name');
            $table->text('same_address');
            $table->string('same_document');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('different_name_letters');
    }
};
