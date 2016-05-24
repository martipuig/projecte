@extends('layouts.index')

@section('header')
	{{-- Header / Menu --}}
	<header class="header">
	    <nav class="navbar navbar-default navbar-static-top">
	        <div class="container">
	            <div class="navbar-header">

	                <a class="navbar-brand" href="{{ url('/index') }}">
	                    Bé De Preu
	                </a>
	            </div>
	            <div class="collapse navbar-collapse" id="app-navbar-collapse">
	                    <!-- LPart de la dreta de la barra -->
	                    <ul class="nav navbar-nav">
	                        <li><a href="{{ url('/index') }}">Menu 1</a></li>
	                        <li><a href="{{ url('/index') }}">Menu 2</a></li>
	                        <li><a href="{{ url('/index') }}">Menu 3</a></li>
	                    </ul>

	                    <!-- Aqui si volem alinear a la dreta -->
	                    <ul class="nav navbar-nav navbar-right">
	                    	<li><a><input style="padding-bottom: 0px;" type="text" name="buscador" placeholder="Buscar"></a></li>
	                    </ul>
	            </div>
	        </div>
	    </nav>
	</header>
@endsection
@section('SliderIUltimesNovetats')
	<script type="text/javascript" src="{!! asset('js/slider.js') !!}"></script>
	<script type="text/javascript" src="{!! asset('js/jssor.slider.min.js') !!}"></script>
	<link href="{!! asset('css/styles.css') !!}" media="all" rel="stylesheet" type="text/css" />
<br><br>
	<div class="container">
	    <div class="pull-left text-center" id="ampladaslider">
	        <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 700px; height: 400px; overflow: hidden; visibility: hidden;">
	            <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 700px; height: 400px; overflow: hidden;">
	                <div data-p="225.00" style="display: none;">
	                    <img data-u="image" src="img/slider1.jpg" />
	                </div>
	                <div data-p="225.00" style="display: none;">
	                    <img data-u="image" src="img/slider2.jpg" />
	                </div>
	            
	            </div>
	            <!-- Bullet Navigator -->
	            <div data-u="navigator" class="jssorb05" style="bottom:16px;right:16px;" data-autocenter="1">
	                <!-- bullet navigator item prototype -->
	                <div data-u="prototype" style="width:16px;height:16px;"></div>
	            </div>
	            <!-- Arrow Navigator -->
	            <span data-u="arrowleft" class="jssora22l" style="top:0px;left:12px;width:40px;height:58px;" data-autocenter="2"></span>
	            <span data-u="arrowright" class="jssora22r" style="top:0px;right:12px;width:40px;height:58px;" data-autocenter="2"></span>
	        </div>
	        <script>
	            jssor_1_slider_init();
	        </script>
	    </div>
	    <div class="row pull-right" id="ampladanovetats">
	        <div class="col-md-12">
	            <div class="panel panel-default"> {{-- Recuadre que envolta el login --}}
	                <div class="panel-heading">Ultimes Novetats</div>
	                <div class="panel-body">
	            		<ul class="nav navbar-nav">
	            			<b>Xiaomi mi5</b>
	            			<li><img data-u="image" src="img/slider1.jpg" style="width: 100%;"/></li>
	            			<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit...<a href="{{ url('/login') }}" id="mesinformacio">més informació</a></li>
	            			<li><b>Xiaomi mi5</b></li>
	            			<li><img data-u="image" src="img/slider1.jpg" style="width: 100%;"/></li>
	            			<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit...<a href="{{ url('/login') }}" id="mesinformacio">més informació</a></li>
	            		</ul>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<script type="text/javascript" src="{!! asset('js/jquery_productes.js') !!}"></script>
	<div class="container">
		<div class="panel panel-default">
			<div class="panel-heading">Productes</div>
			<div class="panel-body">
				<ul class="llistaproductes">
				  @foreach($articles as $article)
					  @foreach($article->imatges as $key => $imatge)
						  @if($key == 0)
							<li>
						      <a href=""><img src="resize/{{ $imatge->id }}" id="producte" alt="" /></a>
						      <div class="content">
						          <div class="contentinner">
						              <div>
						                  <span class="price">{!! $article->preu !!}</span>
						                  <a href="" class="title">{!! $article->NomArt !!}</a>
						              </div>
						              <p class="desc">{!! $article->descripcio !!}</p>
						          </div>
						      </div>
						  	</li>
						@endif
						@endforeach
					@endforeach
				</ul>
			</div>
		</div>
	</div>
@endsection