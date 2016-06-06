@extends('layouts.index')
@section('content')
<div class="container" id="divContainer">
	<h2>Preferits</h2>
	<div class="panel panel-default" style="display: none;">
		<div class="panel-heading">Productes</div>
		<div class="panel-body text-center" id="pbody">
			<!-- Llistat de productes -->
			<ul class="llistaproductes">
			</ul>
			{{-- {!! $articles->links() !!} --}}
			<div id="preutotal" class="text-right"></div>
		</div>
	</div>
</div>
@endsection