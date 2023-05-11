<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    protected $table = 'reservas';
    protected $fillable = [
            'id',
            'servico',
            'valor_mens',
            'valor_un',
            'prestador_id',
            'dt_pg',
            'horarios',
            'observacoes',
    ];
}
