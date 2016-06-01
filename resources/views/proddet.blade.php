@extends('layouts.app')

@section('content')
	@foreach($articles as $article)
		@foreach($article->imatges as $key => $imatge)
			@if($article->id == $id)
			<div class="container-fluid">
				<h2>{!! $article->NomArt !!}</h2>
				<hr>
					<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
						<div class="responsive">
							<div class="img">
								<img src="../resize/{{ $imatge->id }}" id="productedet" alt="" />
							</div>
						</div>
					</div>
				<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
					<h3>Descripció</h3>
					{!! $article->descripcio !!}
					<div>&nbsp;</div>
					<div>
						Preu: <span class="price">{!! $article->preu !!}</span>
					</div>
					@if(Auth::user())
						{!! Form::open(['route' => ['proddet.edit', $article->id]]) !!}
							<a href="{!! route('articles.edit', [$article->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
						{!! Form::close() !!}
					@endif
				</div>
			</div>
			<!-- The Modal -->
			<div id="myModal" class="modal">
				<span class="close">×</span>
				<img class="modal-content" id="img01">
				<div id="caption"></div>
			</div>
			@endif
		@endforeach
	@endforeach

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}

myModal.onclick = function() { 
    modal.style.display = "none";
}

// Get all images and insert the clicked image inside the modal
// Get the content of the image description and insert it inside the modal image caption
var images = document.getElementsByTagName('img');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
var i;
for (i = 0; i < images.length; i++) {
   images[i].onclick = function(){
       modal.style.display = "block";
       modalImg.src = this.src;
       modalImg.alt = this.alt;
       captionText.innerHTML = this.nextElementSibling.innerHTML;
   }
}
</script>
@endsection

