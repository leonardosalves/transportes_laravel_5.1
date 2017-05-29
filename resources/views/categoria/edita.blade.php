@extends('template')

@section('titulo')
Editando {{ $categoria->nome }}
@stop

@section('conteudo')
<h3> Editando <small>{{ $categoria->nome }}</small></h3>
    {!! Form::model($categoria, ['route'=>['categoria.update', $categoria->id],'method'=>'put']) !!}
    @include('_formCategoria')
        
    <div class="form-group">
        {!! Form::submit('Salvar alterações', ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
    
@stop