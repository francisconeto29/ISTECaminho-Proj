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
        Schema::create('veiculo', function (Blueprint $table) {
            $table->increments('id_veiculo');
            $table->unsignedInteger('id_condutor');
            $table->string('marca', 50);
            $table->string('modelo', 50);
            $table->string('cor', 30);
            $table->string('matricula', 15)->unique();
            $table->enum('energia', ['gasolina', 'gasoleo', 'hibrido', 'eletrico', 'gpl', 'outro']);
            $table->unsignedTinyInteger('lugares_total');
            $table->boolean('validado');

            $table->foreign('id_condutor')->references('id_utilizador')->on('utilizador');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('veiculo');
    }
};
