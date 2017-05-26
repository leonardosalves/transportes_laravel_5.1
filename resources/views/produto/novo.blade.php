@extends('template')

@section('titulo')
Novo Produto
@stop

@section('conteudo')
<h3>Novo Produto</h3>
    {!! Form::open(['route'=>'produto.store','method'=>'post']) !!}
     @include('_form')
    <div class="form-group">
        {!! Form::label('estoque_atual', 'Estoque Inicial: ') !!}
        {!! Form::number('estoque_atual', null) !!}
    </div> 
       
        <div class="form-group">
            {!! Form::submit('Cadastrar produto', ['class'=>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
@stop