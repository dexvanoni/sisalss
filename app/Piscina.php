<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Piscina extends Model
{
    protected $table = 'piscinas';
    protected $fillable = [
            'id',
            'user_id',
            'convidado',
            'valor',
            'status',
            'pulseira',
            'observacoes',
    ];
}
