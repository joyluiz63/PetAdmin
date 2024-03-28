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
        Schema::create('medicamentos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pet_id')->constrained('pets');
            $table->string('categoria')->nullable();// Vermifugo, Desparasitação Externa, Medicação...
            $table->string('nome')->nullable();// Nome do medicamento
            $table->string('dosagem')->nullable();
            $table->string('uso');// Externo ou Interno
            $table->string('obs')->nullable();// Modo de uso ou outra observação
            $table->date('aplicado')->nullable();
            $table->date('repetir')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicamentos');
    }
};
