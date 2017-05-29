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
        'observacao',
        'valor'
    ];
    
    public function estoque()
    {
        return $this->hasMany('App\estoques', 'produtos_id','id');
    }
    
    public function valores()
    {
        return $this->hasMany('App\valores', 'produtos_id','id');
    }
    
     public function categoria(){
    
        return $this->belongsTo('App\categorias');
    }
     public function fornecedor(){
    
        return $this->belongsTo('App\fornecedores');
    }
    
    //Deleta estas tableas relacionadas valores e estoques**
    public static function boot()
    {
        parent::boot();    
    
        // cause a delete of a product to cascade to children so they are also deleted
        static::deleted(function($product)
        {
            $product->valores()->delete();
            $product->estoque()->delete();
        });
    }    
}
