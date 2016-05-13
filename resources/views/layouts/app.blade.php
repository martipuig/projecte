<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

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

    <style type="text/css">
        .sidebar-nav li.active > a,
        .sidebar-nav li > a:focus {
            text-decoration: none;
            color: #fff;
            background: rgba(255, 255, 255, 0.2);
        }

        .header {
            width: 100%;
            background: #e7e7e7;
            color: #fff;
            height: 50px;

        }
    </style>

</head>
<body id="app-layout">

@if (Auth::guest())
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/login') }}">
                    Bé De Preu
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Home</a></li>
                    <li><a href="{{ url('/articles') }}">Articles</a></li>
                    <li><a href="{{ url('/categorias') }}">Categoria</a></li>
                    <li><a href="{{ url('/categoriaEsps') }}">Categoria Esp</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
@else
    <!-- Tota la part comentada mostra el sidebar de l'esquerra -->
    <!-- <div id="wrapper" class=""> -->
        <!-- Sidebar -->
            <!-- @include('layouts.sidebar') -->
        <!-- /#sidebar-wrapper -->
        <header class="header">
            {{-- <a href="#menu-toggle"
               style="margin-top: 8px;margin-left: 5px;background-color: #E7E7E7;border-color: #E7E7E7"
               class="btn btn-default" id="menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i></a> --}}

            @if (!Auth::guest())
                <span class="pull-right" style="margin-right: 10px;margin-top: 15px"><a href="{{ url('/logout') }}"><i
                                class="fa fa-btn fa-sign-out"></i>Tancar Sessió</a></span>
            @endif
        </header>
    <!-- </div> -->
    @endif

    <!-- Page Content -->
    <div id="page-content-wrapper">

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
    <script src="http://blackrockdigital.github.io/startbootstrap-simple-sidebar/js/bootstrap.min.js"></script>
    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <!-- Datatables -->
    <script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>

    <!-- Temes propis -->
    <link href="../css/styles.css" rel='stylesheet' type='text/css'>

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

    @yield('scripts')

</body>
</html>