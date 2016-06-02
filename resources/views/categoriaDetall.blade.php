@extends('layouts.app')

@section('content')
<script type="text/javascript" src="{!! asset('js/jquery.infinitescroll.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/jquery_productes.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/script.js') !!}"></script>
<link href="{!! asset('css/styles.css') !!}" media="all" rel="stylesheet" type="text/css" />
<div>&nbsp;</div>
<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">Productes</div>
		<div class="panel-body text-center" id="pbody">
		<!-- Llistat de productes -->
			<ul class="llistaproductes">
				@foreach($articles as $article)
					@foreach($article->imatges as $key => $imatge)
						@if($article->categoria_esps_id == $id && $key == 0)
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
							                </div>
							            {!! Form::close() !!}
						              </span>
						          </div>
						      </div>
						  	</li>
						@endif
					@endforeach
				@endforeach
				@endsection
				</ul>
				{!! $articles->links() !!}
			</div>
		</div>
	</div>
</div>