@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit categoriaEsp</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($categoriaEsp, ['route' => ['categoriaEsps.update', $categoriaEsp->id], 'method' => 'patch']) !!}

            @include('categoriaEsps.fields')

            {!! Form::close() !!}
        </div>
@endsection