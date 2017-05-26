<html>
    <head>
    <title>@yield('titulo')</title>
     <script type="text/javascript" src="{{ URL::asset('js/jquery.js') }}"></script>
     <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" />
     <link rel="stylesheet" href="{{ URL::asset('css/index.css') }}" />
     <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css') }}" />
     <script type="text/javascript" src="{{ URL::asset('js/tether.js') }}"></script>
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
            <li class=""><a href="{{ route('index') }}"></a></li>
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

