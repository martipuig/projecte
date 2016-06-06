<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Be de preu</title>
    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet'
          type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

    <!-- DataTable Bootstrap -->
    <link href="https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css" rel="stylesheet">

    <link href="http://blackrockdigital.github.io/startbootstrap-simple-sidebar/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://blackrockdigital.github.io/startbootstrap-simple-sidebar/css/simple-sidebar.css"
          rel="stylesheet">
    
    <link href="{!! asset('css/styles.css') !!}" media="all" rel="stylesheet" type="text/css" />

    <script src="http://blackrockdigital.github.io/startbootstrap-simple-sidebar/js/jquery.js"></script>
    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    <!-- Datatables -->
    <script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript" src="{!! asset('js/slider.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('js/jssor.slider.min.js') !!}"></script>

</head>
<body id="app-layout">
<header class="header">
    <nav id="navbarindex" class="navbar navbar-default navbar-static-top">
            <div class="container align-center-header">
                <div>
                        <a class="navbar-brand" href="{{ url('/index') }}">Be De Preu</a>
                        <div id="app-navbar-collapse" class="nav navbar-nav float-left">
                        <div id="primary_nav_wrap">
                            <ul class="nav navbar-nav">
                                <li><a href="#">Categories</a>
                                    <ul>
                                        @foreach($categorias as $categoria)
                                            <li><a href="#">{!! $categoria->NomCat !!}</a>
                                                <ul>
                                                    @foreach($categoriaEsps as $catEsp)
                                                        @if($categoria->id == $catEsp->categoria_id)
                                                            {!! Form::open(['route' => ['categoriaDetall.show', $catEsp->id]]) !!}
                                                            <li><a href="{!! route('categoriaDetall.show', [$catEsp->id]) !!}">{!! $catEsp->NomEsp !!}</a></li>
                                                            {!! Form::close() !!}
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </li>
                                        
                                        @endforeach
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{URL::to('/preferits')}}">Preferits</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <ul class="nav navbar-nav float-right">
                    <button type="button" class="navbar-toggle collapsed hamburger-centre" data-toggle="collapse"
                                data-target="#app-navbar-collapse">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                    </button>
                    </ul>
                </div>
            </div>
        </nav>  
</header>

{{-- @yield('header') --}}
{{-- buscador --}}
<div id="contenidorBuscador">
    <div id="divBuscador">
        <input id="buscador"  type="text" name="buscador" placeholder="Buscar" class="form-control">
    </div>
    <div id="resultatsBuscador"></div>
</div>
@yield('SliderIUltimesNovetats')
@yield('content')
<footer class="footer">
    <div class="container"><br>
        <a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/"><img alt="Licencia Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-nd/4.0/88x31.png" /></a>
    </div>
</footer>

<script type="text/javascript" src="{!! asset('js/jquery.infinitescroll.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/jquery_productes.js') !!}"></script>
<script>
    public_url="{{URL::to('/')}}";
    token_laravel="{{ csrf_token() }}";
</script>
<script type="text/javascript" src="{{ URL::asset('js/script.js') }}"></script>
</body>
</html>