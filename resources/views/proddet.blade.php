@extends('layouts.app')

@section('content')
	@foreach($articles as $article)
		@foreach($article->imatges as $key => $imatge)
			@if($article->id == $id)
			<h2>{!! $article->NomArt !!}</h2>
			<hr>
				<div class="container-fluid">
					<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
						<img src="../resize/{{ $imatge->id }}" id="producte" alt="" />
					</div>
					<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
						<h3>Descripció</h3>
						{!! $article->descripcio !!}
						<div>&nbsp;</div>
						<div>
							Preu: <span class="price">{!! $article->preu !!}</span>
						</div>
					</div>
				</div>
			@endif
		@endforeach
	@endforeach
@endsection