<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diretoria extends Model
{
    protected $table = 'diretorias';
    protected $fillable = [

        'user_id', 'diretoria', 'observacoes'
        
    ];
}
