@extends('template')

@section('titulo')
Nova Categoria
@stop

@section('conteudo')
<h3>Nova Categoria</h3>
    {!! Form::open(['route'=>'categoria.store','method'=>'post']) !!}
     @include('_formCategoria')
        <div class="form-group">
            {!! Form::submit('Cadastrar categoria', ['class'=>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
@stop