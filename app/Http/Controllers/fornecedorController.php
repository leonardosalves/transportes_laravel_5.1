<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \App\fornecedores;
use \App\Http\Requests\fornecedorRequest;

class fornecedorController extends Controller
{
    
    
    
    private $fornecedor;
    
    public function __construct(fornecedores $fornecedor)
    {
        $this->fornecedor = $fornecedor;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $fornecedores = $this->fornecedor->orderBy('nome');
        $nome = $request->input('nome');
        if(!empty($nome)){
            $fornecedores = fornecedores::where('nome', 'LIKE', '%' . $nome . '%')
                ->orWhere('telefone', 'LIKE', '%' . $nome . '%')
                ->orWhere('endereco', 'LIKE', '%' . $nome . '%');
            $fornecedores = $fornecedores->paginate(10);
        }else{ 
            $fornecedores = $this->fornecedor->paginate(10);
        }
        return view('fornecedor.index', compact('fornecedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('fornecedor.novo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(fornecedorRequest $request)
    {
        //
        $fornecedor = $this->fornecedor->create($request->except('_token'));
        $request->session()->flash('alert-success', 'Fornecedor criado com sucesso!');
        return redirect()->route('fornecedor.index');
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
        $fornecedor = $this->fornecedor->find($id);
        
        return view('fornecedor.edita',compact('fornecedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(fornecedorRequest $request, $id)
    {
        //
        $this->fornecedor->find($id)->update($request->except('_token'));
        \Session::flash('alert-info','Fornecedor editado com sucesso.');
        return redirect()->route('fornecedor.index');
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
        $this->fornecedor->find($id)->delete();
        \Session::flash('alert-danger','Fornecedor removido com sucesso.');
        return redirect()->route('fornecedor.index');
    }
}
