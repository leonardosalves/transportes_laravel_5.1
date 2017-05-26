<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class estoques extends Model
{
    //
    protected $fillable = [
        'quantidade',
        'descricao',
        'produtos_id',
        'data'
    ];
    
    public function produtos()
    {
        return $this->belongsTo('App\produtos');
    }
    
}
