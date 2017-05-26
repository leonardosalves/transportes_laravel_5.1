<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categorias extends Model
{
    //
    
    protected $fillable = [
        'nome'
    ];
    
    public function produto()
    {
        return $this->hasMany('App\produto', 'produtos_id','id');
    }
}
