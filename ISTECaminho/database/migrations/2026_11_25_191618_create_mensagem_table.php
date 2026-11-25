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
        Schema::create('mensagem', function (Blueprint $table) {
            $table->increments('id_mensagem');
            $table->unsignedInteger('id_reserva');
            $table->unsignedInteger('id_remetente');
            $table->string('conteudo', 500);
            $table->dateTime('data_envio');
            $table->boolean('lida');

            $table->foreign('id_reserva')->references('id_reserva')->on('reserva');
            $table->foreign('id_remetente')->references('id_utilizador')->on('utilizador');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mensagem');
    }
};
