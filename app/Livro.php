<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    protected $table = 'livros';
    protected $fillable = [
            'id',
            'user_id',
            'permanencia',
            'recebi',
            'passei',
            'rancho',
            'alteracao',
            'claviculario',
            'num_reservas',
            'num_socios_cad',
            'eventos',
            'cautelas',
            'num_piscina',
            'puni_user_id',
            'punicao',
    ];
}
