<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Espaco extends Model
{
    protected $table = 'espacos';
    protected $fillable = [
            'id',
            'local',
            'reserva',
            'diretoria_resp',
            'status',
            'obsevacoes',
    ];
}
