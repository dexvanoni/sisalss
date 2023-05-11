<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = 'materiais';
    protected $fillable = [
            'id',
            'produto',
            'cautelavel',
            'validade',
            'qtn',
            'valor_un',
            'fornecedor',
            'categoria',
            'status',
            'tipo',
            'observacoes',
    ];
}
