<?php

namespace App\Domain\Register\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;

    protected $table = 'autor';
    protected $primaryKey = 'codau';

    protected $fillable = [
        'nome'
    ];
}
