<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LivrosViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("DROP VIEW IF EXISTS livros_view");
        DB::statement("
            CREATE OR REPLACE VIEW livros_view AS (
                SELECT autor.nome AS autor_livro,
                       livro.codl AS codigo_livro,
                       livro.titulo AS titulo_livro,
                       livro.editora AS editora_livro,
                       livro.edicao AS edicao_livro,
                       livro.anopublicacao AS ano_publicacao_livro,
                       REPLACE(REPLACE(REPLACE(TO_CHAR(livro.valor, '9G999G990D99'), '.', '#'), ',', '.'), '#', ',') AS valor_livro,
                       STRING_AGG(DISTINCT assunto.descricao, ', ') AS assuntos_livro
                  FROM livro
            INNER JOIN livro_autor
                    ON livro_autor.livro_codl = livro.codl
            INNER JOIN autor
                    ON autor.codau = livro_autor.autor_codau
            INNER JOIN livro_assunto
                    ON livro_assunto.livro_codl = livro.codl
            INNER JOIN assunto
                    ON assunto.codas = livro_assunto.assunto_codas
              GROUP BY autor.nome,
                       livro.codl,
                       livro.titulo,
                       livro.editora,
                       livro.edicao,
                       livro.anopublicacao,
                       livro.valor                
            )
        ");        
    }
}
