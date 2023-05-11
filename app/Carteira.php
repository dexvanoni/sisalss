<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carteira extends Model
{
    protected $table = 'carteiras';
    protected $fillable = [
            'id',
            'user_id',
            'categoria',
            'validade',
            'status',
            'observacoes'
    ];
}
