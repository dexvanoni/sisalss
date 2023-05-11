<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cautela extends Model
{
    protected $table = 'cautelas';
    protected $fillable = [
            'id',
            'user_id',
            'material_id',
            'validade',
            'status',
            'condicao_pago',
            'condicao_devolvido',
            'valor_pg',
            'observacoes',
    ];
}
