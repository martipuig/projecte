<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link href="{!! asset('css/styles.css') !!}" media="all" rel="stylesheet" type="text/css" />
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

</head>
<body id="app-layout">

@if (Auth::guest())
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ url('/login') }}">
                        Bé De Preu
                </a>
                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
        </div>
    </nav>
@else
    <!-- Tota la part comentada mostra el sidebar de l'esquerra -->
    <!-- <div id="wrapper" class=""> -->
        <!-- Sidebar -->
            <!-- @include('layouts.sidebar') -->
        <!-- /#sidebar-wrapper -->
        <header class="header">

        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <a class="navbar-brand" href="{{ url('/login') }}">
                        Bé De Preu
                    </a>
                </div>
                    {{-- <a href="#menu-toggle"
                       style="margin-top: 8px;margin-left: 5px;background-color: #E7E7E7;border-color: #E7E7E7"
                       class="btn btn-default" id="menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i></a> --}}
                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                        <!-- Left Side Of Navbar -->
                        <ul class="nav navbar-nav">
                            <li><a href="{{ url('/articles') }}">Articles</a></li>
                            <li><a href="{{ url('/categorias') }}">Categoria</a></li>
                            <li><a href="{{ url('/categoriaEsps') }}">Categoria Esp</a></li>
                            <li><a href="{{ url('/canvis') }}">Canvis</a></li>
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Tancar Sessió</a></li>
                        </ul>
                </div>
            </div>
        </nav>

        </header>
    <!-- </div> -->
@endif
    <!-- Page Content -->
    <div class="centrat">

        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

    <script src="http://blackrockdigital.github.io/startbootstrap-simple-sidebar/js/jquery.js"></script>

    <!-- Datatables -->
    <script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>

    <script>

        $("#menu-toggle").click(function (e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });

    </script>

    <script type="text/javascript">
        $(function(){
            $('.hiddenRow').hide();
            $('.hiddenRow').css('background-color','#E0E0E0');
        })
        $(".Fila_Article").click(function(){
            $(this).next().toggle();
        })
    </script> 

    <script type="text/javascript">
        $(".search").keyup(function(){
            _this = this;
            $.each($(".table tbody tr"), function() {
                if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                   $(this).hide();
                else
                   $(this).show();                
            });
            var asd = $(".search").val().length;
            if(asd == 0){
                $(function(){
                    $('.hiddenRow').hide();
                })
            }
        });        
    </script>
    <script type="text/javascript" src="{{ URL::asset('js/jquery.infinitescroll.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/script.js') }}"></script>
    @yield('scripts')
</body>
</html>