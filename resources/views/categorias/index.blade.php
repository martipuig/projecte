@extends('layouts.app')

@section('content')

        <h1 class="pull-left">Categorías</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('categorias.create') !!}">Crear Categoria</a>

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        @include('categorias.table')
        
@endsection