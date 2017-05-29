   @if($errors->any())
      @foreach($errors->all() as $error)
          <p class="text-danger">{{ $error }}</p>
      @endforeach
    @endif
      
    <div class="form-group">
        {!! Form::label('nome', 'Nome: ') !!}
        {!! Form::text('nome',null, ['class'=>'form-control']) !!}
    </div> 
    <div class="form-group">
        {!! Form::label('telefone', 'Telefone: ') !!}
        {!! Form::text('telefone',null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('endereco', 'Endereço: ') !!}
        {!! Form::text('endereco',null, ['class'=>'form-control']) !!}
    </div>