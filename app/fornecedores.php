<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fornecedores extends Model
{
    //
    protected $fillable = [
        'nome',
        'telefone',
        'endereco',
        'ativo'
    ];
    
    
    public function produto()
    {
        return $this->hasMany('App\produto', 'produtos_id','id');
    }
}
