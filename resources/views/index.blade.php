@extends('layouts.index')
@section('SliderIUltimesNovetats')
	{{-- <div>&nbsp;</div> --}}
	<div class="container margin-top-slider-movil margin-top-ordinador">
	    <div class="pull-left text-center" id="ampladaslider">
	        <div id="jssor_1" style="">
	            <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 700px; height: 400px; overflow: hidden;">
	                <div data-p="225.00" style="display: none;">
	                    <img data-u="image" src="img/s7.jpg" />
	                </div>
	                <div data-p="225.00" style="display: none;">
	                    <img data-u="image" src="img/mi5.jpg" />
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
	            			<li><h4>Xiaomi mi5</h4></li>
	            			<li><img data-u="image" src="img/s7.jpg" style="width: 100%;"/></li>
	            			<li><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...<a href="{{ url('/login') }}" id="mesinformacio">més informació</a></p></li>
	            			<li><h4>Xiaomi mi5</h4></li>
	            			<li><img data-u="image" src="img/mi5.jpg" style="width: 100%;"/></li>
	            			<li><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...<a href="{{ url('/login') }}" id="mesinformacio">més informació</a></p></li>
	            		</ul>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<div class="container" id="movilcontainer">
		<div class="container">
			<div class="panel panel-default">
				<div class="panel-heading">Productes</div>
				<div class="panel-body text-center" id="pbody">
				<!-- Llistat de productes -->
					<ul class="llistaproductes">
						@foreach($articles as $article)
							@foreach($article->imatges as $key => $imatge)
								@if($key == 0)
									<li>
								      <a href="{!! route('proddet.show', [$article->id]) !!}"><img src="resize/{{ $imatge->id }}" id="producte" alt="" /></a>
								      <div class="content">
								          <div class="contentinner" onclick="document.location = '{!! route('proddet.show', [$article->id]) !!}'">
								              <div>
								                  <span class="price">{!! $article->preu !!}€</span>
								                  <a href="{!! route('proddet.show', [$article->id]) !!}" class="title">{!! $article->NomArt !!}</a>
								              </div>
								              <p class="desc">{!! $article->descripcio !!}</p>
								              <span class="input-group-btn text-center">
								              	{!! Form::open(['route' => ['proddet.show', $article->id]]) !!}
									                <div class='btn-group'>
									                    <a href="{!! route('proddet.show', [$article->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
									                    <a onclick="cookieskdjhgbvkcfdhb(event, {!! $article->id !!})" class='btn btn-default btn-xs'><i id="{!! $article->id !!}" class="glyphicon glyphicon-heart-empty"></i></a>
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
@endsection