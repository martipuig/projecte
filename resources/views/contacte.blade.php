@extends('layouts.app')

@section('content')

    <h3>Contacte amb nosaltres!</h3>
    <hr>
    <form id="contact" method="post" class="form" role="form">

    @if(Session::has('errors'))
        <div class="alert alert-warning">
            @foreach(Session::get('errors')->all() as $error_message)
                <p>{{ $error_message }}</p>
            @endforeach
        </div>
    @endif

        <div class="col-xs-7 col-md-7 form-group">
            <input class="form-control" id="name" name="name" placeholder="Nom" type="text"autofocus="">
        </div>
        <div class="col-xs-7 col-md-7 form-group">
            <input class="form-control" id="email" name="email" placeholder="Email" type="text">
        </div>
        <div class="col-xs-7 col-md-7 form-group">
            <input class="form-control" id="tel" name="tel" placeholder="Telèfon" type="tel">
        </div>
        <div class="col-xs-8 col-md-8 form-group">
            <textarea class="form-control" id="message" name="msg" placeholder="Missatge" rows="5"></textarea>
        </div>
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

        <div class="col-xs-12 col-md-12 form-group">
            <button class="btn btn-primary pull-right" type="submit">Submit</button>
        </div>
    </form>
@endsection