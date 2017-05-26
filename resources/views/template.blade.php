<html>
    <head>
    <title>@yield('titulo')</title>
     <script type="text/javascript" src="{{ URL::asset('js/jquery.js') }}"></script>
     <script type="text/javascript" src="{{ URL::asset('js/tether.js') }}"></script>
     <script type="text/javascript" src="{{ URL::asset('js/bootstrap.js') }}"></script>
     <script type="text/javascript" src="{{ URL::asset('js/toastr.js') }}"></script>
     <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" />
     <link rel="stylesheet" href="{{ URL::asset('css/toastr.css') }}" />
     <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css') }}" />
     <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
     <style>
        body {
          padding-top: 50px;
        }
        .starter-template {
          padding: 40px 15px;
          text-align: center;
        }
        </style>
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
          <a class="navbar-brand" href="{{ route('index') }}" >Gerenciador produtos</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="{{ route('index') }}">Listagem de produtos</a></li>
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

