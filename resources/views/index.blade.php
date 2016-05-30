@extends('layouts.index')

@section('header')
<link href="{!! asset('css/styles.css') !!}" media="all" rel="stylesheet" type="text/css" />
	{{-- Header / Menu --}}
	<header class="header">
	    <nav id="navbarindex" class="navbar navbar-default navbar-static-top">
	        <div class="container align-center-header">
	            <div id="app-navbar-collapse">
	                    <!-- LPart de la dreta de la barra -->

	                    <!-- Aqui si volem alinear a la dreta -->
	                    <ul class="navbar-brand">
	                    	Be De Preu
	                    </ul>
	                    <div class="nav navbar-nav float-left">
						<div id="primary_nav_wrap">
						    <ul class="nav navbar-nav">
						        <li><a href="#" class="categories-centre">Categories</a>
						        	<ul>
						        		@foreach($categorias as $categoria)
						            		<li><a href="#">{!! $categoria->NomCat !!}</a>
												<ul>
													@foreach($categoriaEsps as $catEsp)
														@if($categoria->id == $catEsp->categoria_id)
															<li><a href="#">{!! $catEsp->NomEsp !!}</a></li>
														@endif
													@endforeach
												</ul>
						            		</li>
						        		@endforeach
						        	</ul>
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
	                    	<li id="amagar-movil"><a id="centrarbuscador"><input id="buscador" style="padding-bottom: 0px;" type="text" name="buscador" placeholder="Buscar"></a></li>
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
	<div>&nbsp;</div>
	<div class="padding-slider-movil margin-top-slider-movil margin-top-ordinador">
	    <div class="pull-left text-center" id="ampladaslider">
	        <div id="jssor_1">
	            <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 700px; height: 400px; overflow: hidden;">
	                <div data-p="225.00" style="display: none;">
	                    <img id="mida-img" data-u="image" src="img/s7.jpg" />
	                </div>
	                <div data-p="225.00" style="display: none;">
	                    <img id="mida-img" data-u="image" src="img/mi5.jpg" />
	                </div>
	            
	            </div>
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
	            			<li><img data-u="image" src="img/mi5.jpg" style="width: 100%;"/></li>
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
	<script type="text/javascript" src="{!! asset('js/jquery.infinitescroll.min.js') !!}"></script>
	<script type="text/javascript" src="{!! asset('js/jquery_productes.js') !!}"></script>
	<div class="container" id="movilcontainer">
		<script type="text/javascript" src="{!! asset('js/script.js') !!}"></script>
		<div class="container">
			<div class="panel panel-default">
				<div class="panel-heading">Productes</div>
				<div class="panel-body">
				<!-- Llistat de productes -->
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
								              <span class="input-group-btn text-center">
								              	 {!! Form::open(['route' => ['proddet.show', $article->id]]) !!}
									                <div class='btn-group'>
									                    <a href="{!! route('proddet.show', [$article->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
									                </div>
									                {!! Form::close() !!}
								              </span>
								          </div>
								      </div>
								  	</li>
								@endif
							@endforeach
						@endforeach
					</ul>
					{!! $articles->links() !!}
				</div>
			</div>
		</div>
	</div>
	<footer class="footer">
		<div class="container">
			<p>Aparcao</p>
		</div>
	</footer>
@endsection