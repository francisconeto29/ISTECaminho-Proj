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
        Schema::create('notificacao', function (Blueprint $table) {
            $table->increments('id_notificacao');
            $table->unsignedInteger('id_utilizador');
            $table->string('tipo', 30);
            $table->string('mensagem', 255);
            $table->dateTime('data_envio');
            $table->boolean('lida');

            $table->foreign('id_utilizador')->references('id_utilizador')->on('utilizador')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notificacao');
    }
};
