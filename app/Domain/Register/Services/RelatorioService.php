<?php

namespace App\Domain\Register\Services;

use Illuminate\Support\Facades\DB;

class RelatorioService {

    public static function generate($data) {
        return DB::table('livros_view')
            ->orderBy('autor_livro', 'asc')
            ->orderBy('titulo_livro', 'asc')
            ->get();
    }

}