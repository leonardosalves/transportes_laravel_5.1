<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \App\categorias;
use \App\Http\Requests\categoriaRequest;

class categoriaController extends Controller
{
    
    
    private $categoria;
    
    public function __construct(categorias $categoria)
    {
        $this->categoria = $categoria;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $categorias = $this->categoria->orderBy('nome');
        $nome = $request->input('nome');
        if(!empty($nome)){
            $categorias = categorias::where('nome', 'LIKE', '%' . $nome . '%');
             $categorias = $categorias->paginate(10);
        }else{ 
            $categorias = $this->categoria->paginate(10);
        }
        return view('categoria.index', compact('categorias'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('categoria.novo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(categoriaRequest $request)
    {
        //
         //dd($request->all());
        $categoria = $this->categoria->create($request->except('_token'));
        
        return redirect()->route('categoria.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $categoria = $this->categoria->find($id);
        
        return view('categoria.edita',compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->categoria->find($id)->update($request->except('_token')); 
        return redirect()->route('categoria.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $this->categoria->find($id)->delete();
        return redirect()->route('categoria.index');
    }
}
