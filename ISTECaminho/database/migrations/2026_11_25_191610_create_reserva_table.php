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
        Schema::create('reserva', function (Blueprint $table) {
            $table->increments('id_reserva');
            $table->unsignedInteger('id_boleia');
            $table->unsignedInteger('id_passageiro');
            $table->dateTime('data_pedido');
            $table->enum('estado', ['pendente', 'aceite', 'recusada', 'cancelada', 'concluida']);

            $table->foreign('id_boleia')->references('id_boleia')->on('boleia');
            $table->foreign('id_passageiro')->references('id_utilizador')->on('utilizador');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reserva');
    }
};
