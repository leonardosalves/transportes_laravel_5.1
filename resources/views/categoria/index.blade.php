@extends('template')

@section('titulo')
Gerenciador de categorias
@stop

@section('conteudo')
<link rel="stylesheet" href="{{ URL::asset('css/categoria/edita.css') }}" />
<div class="container">
 <br>
  <br>
     <div id="procura_categorias">
      {!! Form::open(['route'=>'categoria.index','method'=>'Get','class'=>'My_class']) !!}
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
           <div><a href="{{ route('categoria.novo') }}" style="float:right;position:relative" class="btn btn-primary adiciona" role="button"><i class="fa fa-plus-circle" aria-hidden="true">        </i> Cadastrar categoria</a>
            </div>
          </div><!-- /.col-lg-6 -->
        </div><!-- /.row --> 
      {!! Form::close() !!}
  </div>
  <h3>Listagem de categorias:</h3>          
  <table class="table table-condensed table-hover table-bordered">
    <thead style="background-color:#2e6da4;color:white">
      <tr>
        <th style="text-align: center;">ID</th>
        <th style="text-align: center;">Ativo</th>
        <th>Nome da categoria</th>
        <th style="text-align: center;">Ação</th>
      </tr>
    </thead>
    <tbody>   
        @foreach($categorias as $categoria)
           @if($categoria->ativo == 0)
            <tr class="danger">
            @else
            <tr class="success">
            @endif
            <td align="center">{{ $categoria->id }}</td>
            <td align="center">
                @if($categoria->ativo == 0)
                    <i class="fa fa-times" aria-hidden="false"></i>
                @else
                    <i class="fa fa-check" aria-hidden="false"></i>
                @endif
            </td>
            <td>{{ $categoria->nome }}</td>
            <td align="center"><a href="{{ route('categoria.edita', ['id' => $categoria->id]) }}" class="btn btn-primary btn-sm" title="Editar {{ $categoria->nome }}" role="button"><i class="fa fa-pencil" aria-hidden="true"></i>
</a><!-- &nbsp;<a href="{{ route('categoria.destroy', ['id' => $categoria->id]) }}" class="btn btn-danger btn-sm" title="Remover {{ $categoria->nome }}" role="button"><i class="fa fa-trash-o" aria-hidden="true"></i></a> --></td>
        </tr>
        @endforeach
    </tbody>
  </table>
  
  {!! $categorias->render() !!}
</div>
@stop