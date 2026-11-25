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
        Schema::create('periodo_institucional', function (Blueprint $table) {
            $table->increments('id_periodo');
            $table->unsignedInteger('id_administrador');
            $table->string('designacao', 100);
            $table->enum('tipo', ['aulas', 'exames', 'ferias', 'feriado', 'outro']);
            $table->date('data_inicio');
            $table->date('data_fim');

            $table->foreign('id_administrador')->references('id_utilizador')->on('utilizador');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periodo_institucional');
    }
};
