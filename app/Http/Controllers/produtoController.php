<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \App\produtos;
use \App\categorias;
use \App\fornecedores;
use \App\estoques;
use \App\Http\Requests\produtoRequest;

class produtoController extends Controller
{
    
    private $produto;
    private $categoria;
    private $fornecedor;
    private $estoque;
    
    public function __construct(produtos $produto,categorias $categoria,fornecedores $fornecedor,estoques $estoque)
    {
        $this->produto = $produto;
        $this->categoria = $categoria;
        $this->fornecedor = $fornecedor;
        $this->estoque = $estoque;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $produtos = $this->produto->paginate(12);
        
        return view('index', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categorias = $this->categoria->lists('nome','id');
        $fornecedores = $this->fornecedor->lists('nome','id');
        
        return view('produto.novo', compact('categorias','fornecedores'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(produtoRequest $request)
    {
        //
        //dd($request->all());
        $produto = $this->produto->create($request->except('_token'));
        
        
        //Criando registro no estoque
        $this->estoque->create(['produtos_id' => $produto->id,
                                'quantidade' => $request->estoque_atual,
                                'data' => date("Y-m-d"),
                                'descricao' => 'Estoque inicial']);
        
        return redirect()->route('index');
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
        $produto = $this->produto->find($id);
        $categorias = $this->categoria->lists('nome','id');
        $fornecedores = $this->fornecedor->lists('nome','id');
        
        return view('produto.edita',compact('produto','categorias','fornecedores','estoque'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, produtoRequest $request)
    {
        //
        dd($request->all());
        //$this->produto->find($id)->update($request->except('_token','quantidade'));
        //Criando registro no estoque
        //$this->estoque->create(['produtos_id' => $id,
                                //'quantidade' => $request->quantidade,
                               // 'data' => date("Y-m-d"),
                               // 'descricao' => $request->detalhe]);
        //return redirect()->route('index');
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
        $this->produto->find($id)->delete();
        return redirect()->route('index');
    }
}