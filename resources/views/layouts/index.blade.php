<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Be de preu</title>
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

    <script src="http://blackrockdigital.github.io/startbootstrap-simple-sidebar/js/jquery.js"></script>
    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

    <!-- Datatables -->
    <script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>

</head>
<body id="app-layout">

@yield('header')
@yield('SliderIUltimesNovetats')

<script type="text/javascript" src="{{ URL::asset('js/script.js') }}"></script>
</body>
</html>