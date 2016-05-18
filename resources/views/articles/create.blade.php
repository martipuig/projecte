@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Nou article</h1>
        </div>
    </div>

    @include('core-templates::common.errors')

    <div class="row">
        {!! Form::open(['route' => 'articles.store', 'files'=>true]) !!}

            @include('articles.fields')

        {!! Form::close() !!}
    </div>
@endsection