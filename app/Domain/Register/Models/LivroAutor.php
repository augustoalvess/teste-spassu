<?php

namespace App\Domain\Register\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LivroAutor extends Model
{
    use HasFactory;

    protected $table = 'livro_autor';

    protected $fillable = [
        'livro_codl',
        'autor_codau',
    ];

    public function livro() {
        return $this->belongsTo(Livro::class, 'livro_codl');
    }

    public function autor() {
        return $this->belongsTo(Autor::class, 'autor_codau');
    }
}
