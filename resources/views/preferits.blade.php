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
	                	<li id="amagar-movil">
	                		<a id="centrarbuscador">
	                			<input id="buscador" style="padding-bottom: 0px;" type="text" name="buscador" placeholder="Buscar">
	                		</a>
	                	</li>
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
<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">Productes</div>
		<div class="panel-body text-center" id="pbody">
		<!-- Llistat de productes -->
			<ul class="llistaproductes">
				@foreach($articles as $article)
					@foreach($article->imatges as $key => $imatge)
						@if($article->id == 1 && $key == 0)
							<li>
						      <a href=""><img src="../resize/{{ $imatge->id }}" id="producte" alt="" /></a>
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
							                    <a onclick="cookieskdjhgbvkcfdhb({!! $article->id !!})" class='btn btn-default btn-xs'><i id="{!! $article->id !!}" class="glyphicon glyphicon-heart-empty"></i></a>
							                </div>
							            {!! Form::close() !!}
						              </span>
						          </div>
						      </div>
						  	</li>
						  	{!! $asd !!}
						@endif
					@endforeach
				@endforeach
				</ul>
				{!! $articles->links() !!}
			</div>
		</div>
	</div>
</div>
@endsection