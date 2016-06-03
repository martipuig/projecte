@extends('layouts.index')

@section('header')
<link href="{!! asset('css/styles.css') !!}" media="all" rel="stylesheet" type="text/css" />
	{{-- Header / Menu --}}
	<header class="header">
	    <nav id="navbarindex" class="navbar navbar-default navbar-static-top">
	        <div class="container align-center-header">
	            <div id="app-navbar-collapse">
	                    <ul class="navbar-brand">
	                    	Be De Preu
	                    </ul>
	                    <div class="nav navbar-nav float-left">
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
	                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
								data-target="#app-navbar-collapse">
							<span class="sr-only">Toggle Navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
					</button>
	                	{{-- <li id="amagar-movil">
	                		<a id="centrarbuscador">
	                			<input id="buscador" style="padding-bottom: 0px;" type="text" name="buscador" placeholder="Buscar">
	                		</a>
	                	</li> --}}
	                </ul>
	            </div>
	        </div>
	    </nav>
	</header>
@endsection
@section('content')
<script type="text/javascript" src="{!! asset('js/jquery.infinitescroll.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/jquery_productes.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/script.js') !!}"></script>
<link href="{!! asset('css/styles.css') !!}" media="all" rel="stylesheet" type="text/css" />
{{-- buscador --}}
	<div id="contenidorBuscador">
		<div id="divBuscador">
			<input id="buscador"  type="text" name="buscador" placeholder="Buscar" class="form-control">
		</div>
		<div id="resultatsBuscador"></div>
	</div>
	<div class="container">
		<h2>Preferits</h2>
		<div class="panel panel-default">
			<div class="panel-heading">Productes</div>
			<div class="panel-body text-center" id="pbody">
				<!-- Llistat de productes -->
				<ul class="llistaproductes">
					
				</ul>
				{{-- {!! $articles->links() !!} --}}
			</div>
		</div>
	</div>
@endsection