@extends('template')

@section('titulo')
Gerenciador de fornecedores
@stop

@section('conteudo')
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
  <table class="table table-condensed table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Telefone</th>
        <th>Endereço</th>
        <th>Ação</th>
      </tr>
    </thead>
    <tbody>   
        @foreach($fornecedores as $fornecedor)
        <tr>
            <td>{{ $fornecedor->id }}</td>
            <td>{{ $fornecedor->nome }}</td>
            <td>{{ $fornecedor->telefone }}</td>
            <td>{{ $fornecedor->endereco }}</td>
            <td><a href="{{ route('fornecedor.edita', ['id' => $fornecedor->id]) }}" class="btn btn-primary btn-sm" title="Editar {{ $fornecedor->nome }}" role="button"><i class="fa fa-pencil" aria-hidden="true"></i>
</a>&nbsp;<a href="{{ route('fornecedor.destroy', ['id' => $fornecedor->id]) }}" class="btn btn-danger btn-sm" title="Remover {{ $fornecedor->nome }}" role="button"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
        </tr>
        @endforeach
    </tbody>
  </table>
  
  {!! $fornecedores->render() !!}
</div>
@stop