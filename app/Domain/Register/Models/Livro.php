<?php

namespace App\Domain\Register\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    protected $table = 'livro';
    protected $primaryKey = 'codl';

    protected $fillable = [
        'titulo',
        'editora',
        'edicao',
        'anopublicacao'
    ];

    public function autores() {
        return $this->hasMany(LivroAutor::class, 'livro_codl');
    }

    public function assuntos() {
        return $this->hasMany(LivroAssunto::class, 'livro_codl');
    }
}
