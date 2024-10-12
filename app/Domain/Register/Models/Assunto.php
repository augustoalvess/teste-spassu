<?php

namespace App\Domain\Register\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assunto extends Model
{
    use HasFactory;

    protected $table = 'assunto';
    protected $primaryKey = 'codas';

    protected $fillable = [
        'codas',
        'descricao'
    ];
}
