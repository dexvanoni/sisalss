<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $table = 'alunos';
    protected $fillable = [
            'servico_id',
            'user_id',
            'tipo',
            'area',
            'a_pagar_mens',
            'status',
            'observacoes',
    ];
}
