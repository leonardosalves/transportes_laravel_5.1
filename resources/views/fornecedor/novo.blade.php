@extends('template')

@section('titulo')
Novo Fornecedor
@stop

@section('conteudo')
<h3>Novo Fornecedor</h3>
    {!! Form::open(['route'=>'fornecedor.store','method'=>'post']) !!}
     @include('_formFornecedor')
        <div class="form-group">
            {!! Form::submit('Cadastrar fornecedor', ['class'=>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
@stop