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
        Schema::create('vacinas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pet_id')->constrained('pets');
            $table->date('agendada')->nullable();
            $table->date('aplicada')->nullable();
            $table->string('clinica')->nullable();
            $table->string('nome')->nullable();
            $table->integer('dose');
            $table->string('doenca');
            $table->string('image')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacinas');
    }
};
