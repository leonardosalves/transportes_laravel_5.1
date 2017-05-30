<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \App\produtos;
use \App\categorias;
use \App\fornecedores;
use \App\estoques;
use \App\valores;
use \App\Http\Requests\produtoRequest;

class produtoController extends Controller
{
    
    private $produto;
    private $categoria;
    private $fornecedor;
    private $estoque;
    private $valor;
    
    
    public function __construct(produtos $produto,categorias $categoria,fornecedores $fornecedor,estoques $estoque,valores $valor)
    {
        $this->produto = $produto;
        $this->categoria = $categoria;
        $this->fornecedor = $fornecedor;
        $this->estoque = $estoque;
        $this->valor = $valor;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        
        $produtos = $this->produto->orderBy('nome');
        $nome = $request->input('nome');
        if(!empty($nome)){
            $produtos = produtos::where('nome', 'LIKE', '%' . $nome . '%')
                        ->orWhere('marca', 'LIKE', '%' . $nome . '%');
             $produtos = $produtos->paginate(10);
        }else{ 
            $produtos = $this->produto->paginate(10);
        }
        return view('index', compact('produtos'));
    }

    /**
    public function search(){
        $produtos = produtos::where('nome', 'LIKE', '%' . $q . '%')
            ->orWhere('marca', 'LIKE', '%' . $q . '%')
            ->paginate(10);
        $produtos->appends(['search' => $q]);
        
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
        $categorias = categorias::where('ativo', '=', '1');
        $categorias = $categorias->lists('nome','id');
        $fornecedores = fornecedores::where('ativo', '=', '1');
        $fornecedores = $fornecedores->lists('nome','id');
        
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
        //Criando preço inicial
        $this->valor->create(['produtos_id' => $produto->id,
                                'valor' => $request->valor,
                                'data' => date("Y-m-d"),
                                'descricao' => 'Valor inicial']);
        
        $request->session()->flash('alert-success', 'Produto criado com sucesso!');
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
        $categorias = categorias::where('ativo', '=', '1');
        $categorias = $categorias->lists('nome','id');
        $fornecedores = fornecedores::where('ativo', '=', '1');
        $fornecedores = $fornecedores->lists('nome','id');
        
        return view('produto.edita',compact('produto','categorias','fornecedores'));
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
        //dd($request->all()); 
        // Se ouver alguma diferença no estoque atual, acrescentou ou tirado atualizará na tablea de estoque
        if($request->valor_antigo != $request->valor){
            //Criando registro no estoque
            $this->valor->create(['produtos_id' => $id,
                                    'valor' => $request->valor,
                                    'data' => date("Y-m-d"),
                                    'descricao' => "Atualização de valor"]);
        }
        if(!empty($request->detalhe) && $request->estoque_atual != $request->estoque_antigo){
            $this->produto->find($id)->update($request->except('_token','detalhe','estoque_antigo','valor_antigo')); 
            $atualizacao = ($request->estoque_atual) - ($request->estoque_antigo); 
            //Criando registro no estoque
            $this->estoque->create(['produtos_id' => $id,
                                    'quantidade' => $atualizacao,
                                    'data' => date("Y-m-d"),
                                    'descricao' => $request->detalhe]);
        }else{
            //Se não atualizará somente a tabela produtos
             $this->produto->find($id)->update($request->except('_token','detalhe','estoque_antigo','valor_antigo')); 
        }
        \Session::flash('alert-info','Produto editado com sucesso.');
        return redirect()->route('index');
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
        //Deleta tanto estoque como o historico de valores
        $this->produto->boot();
        \Session::flash('alert-danger','Produto removido com sucesso.');
        return redirect()->route('index');
    }
    
    public function remove($id){
            $produto = $this->produto->find($id);
            $categorias = $this->categoria->lists('nome','id');
            $fornecedores = $this->fornecedor->lists('nome','id');

            return view('produto.remove',compact('produto','categorias','fornecedores','estoque'));
    }
    
}