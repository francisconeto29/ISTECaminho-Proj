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
        Schema::create('paragem_boleia', function (Blueprint $table) {
            $table->increments('id_paragem');
            $table->unsignedInteger('id_boleia');
            $table->string('local', 100);
            $table->unsignedTinyInteger('ordem');
            $table->unique(['id_boleia', 'ordem']);

            $table->foreign('id_boleia')->references('id_boleia')->on('boleia')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paragem_boleia');
    }
};
