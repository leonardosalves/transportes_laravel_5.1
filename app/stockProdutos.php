<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stockProdutos extends Model
{
    //
    protected $fillable = [
        'name',
        'stock'
    ];
}
