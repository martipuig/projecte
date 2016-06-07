@extends('layouts.index')
@section('content')
<div class="container">
	<h2>Articles de la categoria {{$categoria->NomCat}}</h2>
	@if(count($articles)==0)
	<div class="alert alert-warning">
		No hi ha resultats.
	</div>
	@else
	<div class="panel panel-default">
		<div class="panel-heading">Productes</div>
		<div class="panel-body text-center" id="pbody">
		<!-- Llistat de productes -->
			<ul class="llistaproductes">
				@foreach($articles as $article)
					@foreach($article->imatges as $key => $imatge)
						@if($key == 0)
							<li>
						      <a href="{!! route('proddet.show', [$article->id]) !!}"><img src="../resize/{{ $imatge->id }}" id="producte" alt="" /></a>
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
							                    <a onclick="cookieskdjhgbvkcfdhb({!! $article->id !!})" class='btn btn-default btn-xs'><i id="{!! $article->id !!}" class="glyphicon glyphicon-heart-empty"></i></a>
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
		@endif
	</div>
</div>
@endsection