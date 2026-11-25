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
        Schema::create('boleia', function (Blueprint $table) {
            $table->increments('id_boleia');
            $table->unsignedInteger('id_condutor');
            $table->unsignedInteger('id_veiculo');
            $table->string('origem', 100);
            $table->string('destino', 100);
            $table->dateTime('data_hora');
            $table->unsignedTinyInteger('lugares_disponiveis');
            $table->decimal('custo', 6, 2);
            $table->decimal('distancia_km', 6, 1);
            $table->enum('estado', ['aberta', 'cheia', 'em_curso', 'concluida', 'cancelada']);

            $table->foreign('id_condutor')->references('id_utilizador')->on('utilizador');
            $table->foreign('id_veiculo')->references('id_veiculo')->on('veiculo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boleia');
    }
};
