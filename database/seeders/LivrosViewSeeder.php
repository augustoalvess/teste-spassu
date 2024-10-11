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
        /**
        Fiz a consulta agrupada por autor devido ao requisito solicitado,
        porém, pra mim essa exibição não faz muito sentido, sendo que mesmo agrupando por
        autor, caso a ideia seja apresentar somente um único registro por autor,
        o agrupamento se desfaz no momento em que um livro possuir mais de um assunto (visto que, segundo o requisito, é preciso juntar as 3 tabelas principais), 
        a menos que a exibição seja mistrurada agregando livros e assuntos, mais ou menos assim:
        | autor | livro 1, livro 2, livro 3 | assunto 1 livro 1, assunto 2 livro 1, assunto 1 livro 2, assunto 2 livro 2... |
         
        O ideal seria não trazer os assuntos dos livros, então o agrupamento ficaria ok, pois daria pra
        agregar somente o título do livro e não trazer as demais informações, então apresentaria algo como:
        | autor | livro 1, livro 2, livro 3 |

        Pra ser mais preciso eu precisaria ver um exemplo de exibição da listagem desejada, então construiria o sql de acordo.
         */

        DB::statement("DROP VIEW IF EXISTS livros_view");
        DB::statement("
            CREATE OR REPLACE VIEW livros_view AS (
                SELECT autor.nome AS autor_livro,
                       livro.codl AS codigo_livro,
                       livro.titulo AS titulo_livro,
                       livro.editora AS editora_livro,
                       livro.edicao AS edicao_livro,
                       livro.anopublicacao AS ano_publicacao_livro,
                       livro.valor AS valor_livro,
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
