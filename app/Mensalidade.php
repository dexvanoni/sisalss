<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensalidade extends Model
{
    protected $table = 'mensalidades';
    protected $fillable = [
            'id',
            'servico_id',
            'user_id_pago',
            'valor_pago',
            'mes_referente',
            'diretor_recebeu',
            'observacoes',
    ];
}
