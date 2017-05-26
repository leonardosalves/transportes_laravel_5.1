@extends('template')

@section('titulo')
Editando {{ $produto->nome }}
@stop

@section('conteudo')
<h3> Editando <small>{{ $produto->nome }}</small></h3>
    {!! Form::model($produto, ['route'=>['produto.update', $produto->id],'method'=>'put']) !!}
    @include('_form')
    <div class="form-group">
        {!! Form::label('quantidade', 'Estoque Atual: ') !!}
        {!! Form::number('quantidade', $produto->estoque->sum('quantidade'),['class'=>'quantidade_estoque']) !!}
        <span id="estoque_observacao">
            &nbsp;&nbsp;&nbsp;
            {!! Form::label('detalhe', 'Motivo da atualização de estoque: ') !!}
            {!! Form::text('detalhe', null,array('size' => '90')) !!}
        </span>
    </div> 
        <div class="panel panel-primary">
          <div class="panel-heading">Histórico de estoque</div>
          <div class="panel-body">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Quantidade</th>
                  <th>Data</th>
                  <th>Descrição</th>
                </tr>
              </thead>
              <tbody>
                  @foreach($produto->estoque as $estoques)
                      <tr>
                          <td>
                              {{ $estoques->id }}
                          </td>
                          <td>
                              {{ $estoques->quantidade }}
                          </td>
                          <td>
                              {{ $estoques->data }}
                          </td>
                          <td>
                              {{ $estoques->descricao }}
                          </td>
                      </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="form-group">
            {!! Form::submit('Salvar alterações', ['class'=>'btn btn-primary']) !!}
        </div>
        <script>
             $("#estoque_observacao").hide();
            $(".quantidade_estoque").change(function(){
                $("#estoque_observacao").show();
                
            });
        </script>
    {!! Form::close() !!}
@stop