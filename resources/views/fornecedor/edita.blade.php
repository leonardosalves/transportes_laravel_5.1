@extends('template')

@section('titulo')
Editando {{ $fornecedor->nome }}
@stop

@section('conteudo')
<h3> Editando <small>{{ $fornecedor->nome }}</small></h3>
    {!! Form::model($fornecedor, ['route'=>['fornecedor.update', $fornecedor->id],'method'=>'put']) !!}
    @include('_formFornecedor')
        
    <div class="form-group">
        {!! Form::submit('Salvar alterações', ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
    
@stop