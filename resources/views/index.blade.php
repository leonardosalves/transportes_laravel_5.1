@extends('template')

@section('titulo')
Gerenciador de Estoques
@stop

@section('conteudo')
<div class="container">
 <br>
  <p>Listagem de produtos:</p> 
  <a href="{{ route('produto.novo') }}" class="btn btn-primary" role="button">Cadastrar novo produto</a>           
  <table class="table table-condensed">
    <thead>
      <tr>
        <th>Nome do produto</th>
        <th>Marca</th>
        <th>Estoque atual</th>
        <th>Observação</th>
        <th>Ação</th>
      </tr>
    </thead>
    <tbody>   
        @foreach($produtos as $produto)
        <tr>
            <td>{{ $produto->nome }}</td>
            <td>{{ $produto->marca }}</td>
            <td align="center">{{ $produto->estoque_atual }}</td>
            <td>{{ $produto->observacao }}</td>
            <td><a href="{{ route('produto.edita', ['id' => $produto->id]) }}" class="btn btn-primary btn-sm" role="button">Editar</a>&nbsp;<a href="{{ route('produto.destroy', ['id' => $produto->id]) }}" class="btn btn-danger btn-sm" role="button">Remover</a></td>
        </tr>
        @endforeach
    </tbody>
  </table>
  
  {!! $produtos->render() !!}
</div>
<script>
       $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
})
</script>
@stop