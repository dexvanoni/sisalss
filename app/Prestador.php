<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestador extends Model
{
    protected $table = 'prestadores';
    protected $fillable = [
            'id',
            'nome_completo',
            'cpf',
            'identidade',
            'funcao',
            'salario',
            'dt_pg',
            'carga_horaria',
            'datas_horarios',
            'status',
            'diretoria',
            'observacoes',
    ];
}
