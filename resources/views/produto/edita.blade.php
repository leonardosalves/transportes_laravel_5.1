@extends('template')

@section('titulo')
Editando {{ $produto->nome }}
@stop

@section('conteudo')
<h3> Editando <small>{{ $produto->nome }}</small></h3>
    {!! Form::model($produto, ['route'=>['produto.update', $produto->id],'method'=>'put']) !!}
    @include('_form')
    <div class="form-group">
        {!! Form::label('estoque_atual', 'Estoque Atual: ') !!}
        {!! Form::text('estoque_antigo', $produto->estoque_atual,['class'=>'estoque_antigo', 'readonly' => 'true']) !!}
        <br><br>
        {!! Form::label('estoque_atual', 'Novo valor: ') !!}
        {!! Form::text('estoque_atual', null,['class'=>'estoque_atual']) !!}
        &nbsp;&nbsp;&nbsp;
        <span id="estoque_observacao">
            {!! Form::label('detalhe', 'Motivo da atualização de estoque: ') !!}
            {!! Form::text('detalhe', null,array('size' => '90') ,['class'=>'detalhe']) !!}
        </span>
    </div> 
        <div class="panel panel-primary">
          <div class="panel-heading">Histórico de estoque</div>
          <div class="panel-body">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Quantidade</th>
                  <th>Data</th>
                  <th>Descrição</th>
                </tr>
              </thead>
              <tbody>
                  @foreach($produto->estoque as $estoques)
                      <tr>
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
             toastr.options.progressBar = true;
             toastr.options.closeButton = true;
             $("#estoque_observacao").hide();
             $(".estoque_atual").change(function(){
                $("#estoque_observacao").show();
             }).blur(function(){
              if($(".estoque_antigo").val() != $(".estoque_atual").val() && $("#detalhe").val() === ""){
                  toastr.error('Favor informar motivo da mudança de estoque');
                    $(".btn-primary").attr('disabled','disabled');
                }else{
                     $("input").removeAttr('disabled');
                } 
            });
            $("#detalhe").blur(function(){
              if($(".estoque_antigo").val() != $(".estoque_atual").val() && $("#detalhe").val() === ""){
                  toastr.error('Favor informar motivo da mudança de estoque');
                    $(".btn-primary").attr('disabled','disabled');
                }else{
                     $("input").removeAttr('disabled');
                } 
            });
        </script>
    {!! Form::close() !!}
@stop