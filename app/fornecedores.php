<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fornecedores extends Model
{
    //
    protected $fillable = [
        'nome',
        'telefone',
        'endereco'
    ];
}
