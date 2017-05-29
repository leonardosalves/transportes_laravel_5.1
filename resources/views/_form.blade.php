
    @if($errors->any())
      @foreach($errors->all() as $error)
          <p class="text-danger">{{ $error }}</p>
      @endforeach
    @endif
   
    <div class="form-group">
        {!! Form::label('nome', 'Nome: ') !!}
        {!! Form::text('nome',null, ['class'=>'form-control']) !!}
        {!! Form::label('marca', 'Marca: ') !!}
        {!! Form::text('marca',null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('categoria_id', 'Categoria: ') !!}
         {!! Form::select('categoria_id', $categorias,null, ['class'=>'form-control']) !!}

    </div>

    <div class="form-group">
        {!! Form::label('fornecedor_id', 'Fornecedor: ') !!}
          {!! Form::select('fornecedor_id', $fornecedores,null, ['class'=>'form-control']) !!} 
    <div class="form-group">
        {!! Form::label('observacao', 'Observação: ') !!}
        {!! Form::textarea('observacao',null, ['class'=>'form-control','rows' => "3", 'cols' => "50"]) !!}
    </div>
    <div class="form-group">
        {!! Form::label('valor', 'Valor: ') !!}
        {!! Form::text('valor',null, ['class'=>'valor form-control']) !!}
    </div>
   