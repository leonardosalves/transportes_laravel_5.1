   @if($errors->any())
      @foreach($errors->all() as $error)
          <p class="text-danger">{{ $error }}</p>
      @endforeach
      @endif
      
    <div class="form-group">
        {!! Form::label('nome', 'Nome: ') !!}
        {!! Form::text('nome',null, ['class'=>'form-control']) !!}
    </div>