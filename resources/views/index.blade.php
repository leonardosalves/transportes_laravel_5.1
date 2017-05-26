@extends('template')

@section('titulo')
Gerenciador de Estoques
@stop

@section('conteudo')
<div class="container">
 <br>
  <div><a href="{{ route('produto.novo') }}" class="btn btn-primary adiciona" role="button"><i class="fa fa-plus-circle" aria-hidden="true"></i> Cadastrar novo produto</a></div>
  <br>
     <div id="procura_produtos">
      {!! Form::open(['route'=>'index','method'=>'Get','class'=>'My_class']) !!}
        
        {!! Form::label('nome', 'Procurar pelo nome do produto: ') !!}
        {!! Form::text('nome',null,array('size' => '30'),['class'=>'form-control']) !!}
        {!! Form::submit('Procurar',['class' => 'btn btn-sm btn-primary']) !!}
            
      {!! Form::close() !!}
  </div>
  <h3>Listagem de produtos:</h3>          
  <table class="table table-condensed">
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