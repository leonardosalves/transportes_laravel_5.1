<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produtos extends Model
{
    //
    protected $fillable = [
        'nome',
        'marca',
        'estoque_atual',
        'fornecedor_id',
        'categoria_id',
        'observacao'
    ];
    
    public function estoque()
    {
        return $this->hasMany('App\estoques', 'produtos_id','id');
    }
}