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
        Schema::create('denuncia', function (Blueprint $table) {
            $table->increments('id_denuncia');
            $table->unsignedInteger('id_denunciante');
            $table->unsignedInteger('id_utilizador_alvo')->nullable();
            $table->unsignedInteger('id_boleia')->nullable();
            $table->unsignedInteger('id_mensagem')->nullable();
            $table->string('motivo', 100);
            $table->string('descricao', 500);
            $table->enum('estado', ['aberta', 'em_analise', 'resolvida', 'arquivada']);
            $table->string('decisao', 255)->nullable();
            $table->dateTime('data_criacao');

            $table->foreign('id_denunciante')->references('id_utilizador')->on('utilizador');
            $table->foreign('id_utilizador_alvo')->references('id_utilizador')->on('utilizador');
            $table->foreign('id_boleia')->references('id_boleia')->on('boleia');
            $table->foreign('id_mensagem')->references('id_mensagem')->on('mensagem');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('denuncia');
    }
};
