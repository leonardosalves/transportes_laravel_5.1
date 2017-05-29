@extends('template')

@section('titulo')
Editando {{ $produto->nome }}
@stop
@section('conteudo')
<h3> Editando <small>{{ $produto->nome }}</small></h3>
<script type="text/javascript" src="{{ URL::asset('js/toastr.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/maskMoney.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/produto/edita.js') }}"></script>
<link rel="stylesheet" href="{{ URL::asset('css/toastr.css') }}" />
       
  <div class="container">
    <div class="row">

        <div class="col-sm-6">
            <div class="panel panel-success">
                <div class="panel-heading">
                  <h3 class="panel-title">Formulário</h3>
                </div>
                    <div class="panel-body">
                    {!! Form::model($produto, ['route'=>['produto.update', $produto->id],'method'=>'put']) !!}
                    {!! Form::hidden('valor_antigo', $produto->valor) !!}
                    @include('_form')
                    <div class="form-group">
                        {!! Form::label('estoque_atual', 'Estoque Atual: ') !!}
                        {!! Form::text('estoque_antigo', $produto->estoque_atual,['class'=>'estoque_antigo form-control', 'readonly' => 'true']) !!}
                        
                    </div>
                    <div class="form-group">
                        {!! Form::label('estoque_atual', 'Mudança de estoque para: ') !!}
                        {!! Form::text('estoque_atual', null,['class'=>'estoque_atual form-control','size' => '6']) !!}
                       <br>
                       <br>
                        <span id="estoque_observacao">
                        {!! Form::label('detalhe', 'Motivo da atualização de estoque: ') !!}
                        {!! Form::text('detalhe', null,array('size' => '80') ,['class'=>'detalhe form-control']) !!}
                        </span>
                    </div>
                </div> 
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-primary"  >
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
                                      {{ date('d/m/Y', strtotime($estoques->data)) }}
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
            </div> 
            <div class="col-sm-12">  
                          <div class="panel panel-danger">
                            <div class="panel-heading">
                              <h3 class="panel-title"> Histórico de ateração de preço</h3>
                            </div>
                            <div class="panel-body">
                                 <table class="table table-hover">
                                      <thead>
                                        <tr>
                                          <th>Valor</th>
                                          <th>Data</th>
                                          <th>Descrição</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                          @foreach($produto->valores as $valor)
                                              <tr>
                                                  <td>
                                                     R$ {{  number_format(str_replace(',','',$valor->valor),2) }}
                                                  </td>
                                                  <td>
                                                      {{ date('d/m/Y', strtotime($valor->data)) }}
                                                  </td>
                                                  <td>
                                                      {{ $valor->descricao }}
                                                  </td>
                                              </tr>
                                          @endforeach
                                      </tbody>
                                    </table>
                            </div>
                          </div>    
                    </div>
        </div>  
    </div>          
    </div>     
    <div class="form-group">
    {!! Form::submit('Salvar alterações', ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}  
@stop
