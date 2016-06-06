@extends('layouts.app')

@section('content')
<link href="{!! asset('css/styles.css') !!}" media="all" rel="stylesheet" type="text/css" />
	<div class="respons-table">
    	<h1 class="pull-left">Historial de canvis</h1>
	    	<table class="table table-responsive">
	    		<thead>
			        <th>Nom</th>
			        <th>Tipus</th>
			        <th>Operació</th>
			        <th>Usuari</th>
			        <th>Data</th>
			    </thead>
			    <tbody>
			    	@foreach($canvis as $canvi)
			    		<tr>
			    			<td>{!! $canvi->nom !!}</td>
			    			<td>{!! $canvi->tipus !!}</td>
			    			<td>{!! $canvi->operacio !!}</td>
			    			<td>{!! $canvi->usuari !!}</td>
			    			<td>{!! $canvi->data !!}</td>
			    		</tr>
			    	@endforeach
			    </tbody>
	    	</table> 
	    	{!! $canvis->links() !!}  
	</div>
@endsection