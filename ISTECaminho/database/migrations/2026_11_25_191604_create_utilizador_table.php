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
        Schema::create('utilizador', function (Blueprint $table) {
            $table->increments('id_utilizador');
            $table->string('nome', 100);
            $table->string('email', 150)->unique();
            $table->string('password_hash');
            $table->string('telefone', 20);
            $table->string('fotografia', 255);
            $table->string('curso', 100);
            $table->enum('estado_conta', ['pendente', 'ativa', 'suspensa', 'bloqueada']);
            $table->dateTime('data_criacao');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utilizador');
    }
};
