
 <script type="text/javascript" src="{{ URL::asset('js/jquery.js') }}"></script>
 <script type="text/javascript" src="{{ URL::asset('js/bootstrap.js') }}"></script>
 <script type="text/javascript" src="{{ URL::asset('js/index.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/toastr.js') }}"></script>
 <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" />
 <link rel="stylesheet" href="{{ URL::asset('css/index.css') }}" />
 <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('css/toastr.css') }}" />
 <script type="text/javascript" src="{{ URL::asset('js/tether.js') }}"></script>
   <div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))
       <script>
            toastr.options.progressBar = true;
            toastr.options.closeButton = true;
            // Stuff to do as soon as the DOM is ready;
            var alerta = '<?php echo $msg;?>';
            var mensagem = '<?php echo Session::get('alert-' . $msg);?>';
            if(alerta == 'danger'){
                toastr.error(mensagem, 'Aviso!');
            }else{
                 toastr.success(mensagem, 'Mensagem!');
            }
        </script> 
      <!-- <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p> -->
      @endif
    @endforeach
  </div> <!-- end .flash-message -->
   <html>
    <head>
    <title>@yield('titulo')</title>
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ route('index') }}" ><i style="font-size:20px;margin-top:-8px" class="fa fa-product-hunt" aria-hidden="true">rodutos</i><br> <small style="font-size:10px">Transportes Restauração</small></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Fornecedores <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="{{ route('fornecedor.novo') }}"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Adicionar Fornecedor</a></li>
                <li><a href="{{ route('fornecedor.index') }}"><i class="fa fa-list-alt" aria-hidden="true"></i> Listar fornecedores</a></li>
              </ul>
            </li><li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categorias <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="{{ route('categoria.novo') }}"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Adicionar Categoria</a></li>
                <li><a href="{{ route('categoria.index') }}"><i class="fa fa-list-alt" aria-hidden="true"></i> Listar categorias</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
<div class="row">
<div class="col-md-10 col-md-offset-1">
    <div class=”container”>@yield('conteudo')</div>
    </div>
    </div>
    </body>
</html>

