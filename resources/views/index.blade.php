@extends('template')

@section('titulo')
Gerenciador de Estoques
@stop

@section('conteudo')
<div class="container">
 <br>
  <p>Listagem de produtos:</p> 
  <a href="{{ route('produto.novo') }}" class="btn btn-primary" role="button">Cadastrar novo produto</a>           
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
            <td><a href="{{ route('produto.edita', ['id' => $produto->id]) }}" class="btn btn-primary btn-sm" role="button">Editar</a>&nbsp;<a href="{{ route('produto.destroy', ['id' => $produto->id]) }}" class="btn btn-danger btn-sm" role="button">Remover</a></td>
        </tr>
        @endforeach
    </tbody>
  </table>
  
  {!! $produtos->render() !!}
</div>
@stop