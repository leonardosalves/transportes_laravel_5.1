@extends('template')

@section('titulo')
Gerenciador de fornecedores
@stop

@section('conteudo')
<link rel="stylesheet" href="{{ URL::asset('css/fornecedor/edita.css') }}" />
<div class="container">
 <br>
  <br>
     <div id="procura_fornecedores">
      {!! Form::open(['route'=>'fornecedor.index','method'=>'Get','class'=>'My_class']) !!}
    <div class="row">
          <div class="col-lg-6">
            <div class="input-group">
              <input type="text" name="nome" class="form-control" placeholder="Procurar por...">
              <span class="input-group-btn">
                <button class="btn btn-default" type="submit">Procurar</button>
              </span>
            </div>
          </div><!-- /.col-lg-6 -->
          <div class="col-lg-6">
           <div><a href="{{ route('fornecedor.novo') }}" style="float:right;position:relative" class="btn btn-primary adiciona" role="button"><i class="fa fa-plus-circle" aria-hidden="true">        </i> Cadastrar fornecedor</a>
            </div>
          </div><!-- /.col-lg-6 -->
        </div><!-- /.row --> 
      {!! Form::close() !!}
  </div>
  <h3>Listagem de fornecedores:</h3>          
  <table class="table table-condensed table-hover table-bordered">
    <thead style="background-color:#2e6da4;color:white">
      <tr>
        <th style="text-align: center;">ID</th>
        <th style="text-align: center;">Ativo</th>
        <th>Nome</th>
        <th>Telefone</th>
        <th>Endereço</th>
        <th style="text-align: center;">Ação</th>
      </tr>
    </thead>
    <tbody>   
        @foreach($fornecedores as $fornecedor)
        @if($fornecedor->ativo == 0)
        <tr class="danger">
        @else
        <tr class="success">
        @endif
        
            <td align="center">{{ $fornecedor->id }}</td>
            <td align="center">
                @if($fornecedor->ativo == 0)
                    <i class="fa fa-times" aria-hidden="false"></i>
                @else
                    <i class="fa fa-check" aria-hidden="false"></i>
                @endif
            </td>
            <td>{{ $fornecedor->nome }}</td>
            <td>{{ $fornecedor->telefone }}</td>
            <td>{{ $fornecedor->endereco }}</td>
            <td align="center"><a href="{{ route('fornecedor.edita', ['id' => $fornecedor->id]) }}" class="btn btn-primary btn-sm" title="Editar {{ $fornecedor->nome }}" role="button"><i class="fa fa-pencil" aria-hidden="true"></i
</a><!-- &nbsp;<a href="{{ route('fornecedor.destroy', ['id' => $fornecedor->id]) }}" class="btn btn-danger btn-sm" title="Remover {{ $fornecedor->nome }}" role="button"><i class="fa fa-trash-o" aria-hidden="true"> --></i></a></td>
        </tr>
        @endforeach
    </tbody>
  </table>
  {!! $fornecedores->render() !!}
</div>
@stop