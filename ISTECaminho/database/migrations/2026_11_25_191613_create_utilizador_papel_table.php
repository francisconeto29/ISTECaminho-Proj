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
        Schema::create('utilizador_papel', function (Blueprint $table) {
            $table->unsignedInteger('id_utilizador');
            $table->unsignedTinyInteger('id_papel');
            $table->dateTime('data_atribuicao');
            $table->primary(['id_utilizador', 'id_papel']);

            $table->foreign('id_utilizador')->references('id_utilizador')->on('utilizador')->cascadeOnDelete();
            $table->foreign('id_papel')->references('id_papel')->on('papel')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utilizador_papel');
    }
};
