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
        Schema::create('avaliacao', function (Blueprint $table) {
            $table->increments('id_avaliacao');
            $table->unsignedInteger('id_reserva');
            $table->unsignedInteger('id_avaliador');
            $table->unsignedInteger('id_avaliado');
            $table->unsignedTinyInteger('pontuacao');
            $table->string('comentario', 255);
            $table->dateTime('data');

            $table->foreign('id_reserva')->references('id_reserva')->on('reserva');
            $table->foreign('id_avaliador')->references('id_utilizador')->on('utilizador');
            $table->foreign('id_avaliado')->references('id_utilizador')->on('utilizador');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avaliacao');
    }
};
