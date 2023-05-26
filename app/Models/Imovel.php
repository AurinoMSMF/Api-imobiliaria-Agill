<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imovel extends Model
{
    protected $table= 'imovels';

    protected $fillable = [
        'idDono',
        'titulo',
        'val_diaria',
        'CEP',
        'descricao',
        'caracteristicas',
        'max_pessoas',
        'min_dias',
    ];
}
