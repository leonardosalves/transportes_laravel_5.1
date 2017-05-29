<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class valores extends Model
{
    //
     //
    protected $fillable = [
        'valor',
        'descricao',
        'produtos_id',
        'data'
    ];
    
    public function produtos()
    {
        return $this->belongsTo('App\produtos');
    }
}
