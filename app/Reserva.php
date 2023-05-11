<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = 'reservas';
    protected $fillable = [
            'id',
            'user_id',
            'espaco',
            'dt_evento',
            'valor',
            'status_pg',
            'status',
            'diretor',
            'observacoes',
    ];
}
