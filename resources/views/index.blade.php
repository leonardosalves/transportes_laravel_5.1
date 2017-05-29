@extends('template')

@section('titulo')
Gerenciador de Estoques
@stop

@section('conteudo')
<div class="container">
 <br>
  <br>
 <div id="procura_produtos">
      {!! Form::open(['route'=>'index','method'=>'Get','class'=>'My_class']) !!}

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
       <div><a href="{{ route('produto.novo') }}" style="float:right;position:relative" class="btn btn-primary adiciona" role="button"><i class="fa fa-plus-circle" aria-hidden="true">        </i> Cadastrar produto</a>
        </div>
      </div><!-- /.col-lg-6 -->
    </div><!-- /.row -->  
      {!! Form::close() !!}
  </div>
  <h3>Listagem de produtos:</h3>          
  <table class="table table-condensed table-hover">
    <thead>
      <tr>
        <th>Nome do produto</th>
        <th>Marca</th>
        <th>Estoque atual</th>
        <th>Observação</th>
        <th>Ação</th>
      </tr>
    </thead>
    <tbody>   
        @foreach($produtos as $produto)
        <tr>
            <td>{{ $produto->nome }}</td>
            <td>{{ $produto->marca }}</td>
            <td align="center">{{ $produto->estoque_atual }}</td>
            <td>{{ $produto->observacao }}</td>
            <td><a href="{{ route('produto.edita', ['id' => $produto->id]) }}" class="btn btn-primary btn-sm" title="Editar {{ $produto->nome }}" role="button"><i class="fa fa-pencil" aria-hidden="true"></i>
</a>&nbsp;<a href="{{ route('produto.remove', ['id' => $produto->id]) }}" class="btn btn-danger btn-sm" title="Remover {{ $produto->nome }}" role="button"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
        </tr>
        @endforeach
    </tbody>
  </table>
  
  {!! $produtos->render() !!}
</div>
@stop