<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement(
            'CREATE VIEW v_classificacao_utilizador AS
            SELECT utilizador.id_utilizador, utilizador.nome,
                COUNT(avaliacao.id_avaliacao) AS total_avaliacoes,
                ROUND(AVG(avaliacao.pontuacao), 2) AS media
            FROM utilizador
            INNER JOIN avaliacao ON avaliacao.id_avaliado = utilizador.id_utilizador
            GROUP BY utilizador.id_utilizador, utilizador.nome'
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS v_classificacao_utilizador');
    }
};
