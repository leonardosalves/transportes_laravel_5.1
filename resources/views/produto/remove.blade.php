@extends('template')

@section('titulo')
Confirmação de exclusão de {{ $produto->nome }}
@stop


@section('conteudo')
<br><br>
<div class="panel panel-danger">
  <div class="panel-heading">Confirmarção de exclusão do produto {{ $produto->nome }}</div>
  <div class="panel-body">
  <div class="table-responsive">          
      <table class="table">
        <thead>
          <tr>
            <th>Nome do produto</th>
            <th>Marca</th>
            <th>Quantidade atual em estoque</th>
            <th>Fornecedor</th>
            <th>Categoria</th>
          </tr>
        </thead>
        <tbody >
          <tr>
            <td>{{ $produto->nome }}</td>
            <td>{{ $produto->marca }}</td>
            <td>{{ $produto->estoque_atual }}</td>
            <td>{{ $produto->fornecedor->nome }}</td>
            <td>{{ $produto->categoria->nome }}</td>
          </tr>
        </tbody>
      </table>
      </div>
      <br>
      <a href="{{ route('index') }}" class="btn btn-default">Cancelar</a>&nbsp;&nbsp;&nbsp;<a href="{{ route('produto.destroy', ['id' => $produto->id]) }}" class="btn btn-danger">Remover</a>
    </div>
</div>


@stop