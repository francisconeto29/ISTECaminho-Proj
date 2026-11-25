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
        Schema::create('registo_auditoria', function (Blueprint $table) {
            $table->bigIncrements('id_registo');
            $table->unsignedInteger('id_administrador');
            $table->string('acao', 100);
            $table->string('entidade', 50);
            $table->dateTime('data_hora');

            $table->foreign('id_administrador')->references('id_utilizador')->on('utilizador');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registo_auditoria');
    }
};
