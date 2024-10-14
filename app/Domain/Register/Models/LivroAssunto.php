<?php

namespace App\Domain\Register\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LivroAssunto extends Model
{
    use HasFactory;

    protected $table = 'livro_assunto';

    protected $fillable = [
        'livro_codl',
        'assunto_codas',
    ];

    public function livro() {
        return $this->belongsTo(Livro::class, 'livro_codl');
    }

    public function assunto() {
        return $this->belongsTo(Assunto::class, 'assunto_codas');
    }
}
