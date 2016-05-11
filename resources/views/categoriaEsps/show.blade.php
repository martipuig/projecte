@extends('layouts.app')

@section('content')
    @include('categoriaEsps.show_fields')

    <div class="form-group">
           <a href="{!! route('categoriaEsps.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
