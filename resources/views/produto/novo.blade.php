@extends('template')

@section('titulo')
Novo Produto
@stop

@section('conteudo')
<script type="text/javascript" src="{{ URL::asset('js/maskMoney.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/produto/novo.js') }}"></script>
<h3>Novo Produto</h3>
    {!! Form::open(['route'=>'produto.store','method'=>'post']) !!}
     @include('_form')
    
    <div class="form-group">
        {!! Form::label('estoque_atual', 'Estoque Inicial: ') !!}
        {!! Form::number('estoque_atual', null,['class'=>'estoque_atual']) !!}
    </div> 
        <div class="form-group">
            {!! Form::submit('Cadastrar produto', ['class'=>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
@stop