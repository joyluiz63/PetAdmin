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
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('especie');
            $table->string('raca');
            $table->string('cor');
            $table->string('sexo');
            $table->date('nascimento')->nullable();
            $table->string('tutor')->nullable();
            $table->foreignId('user_id')->constrained('users', 'id');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
