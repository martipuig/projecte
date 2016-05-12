@extends('layouts.app')

@section('content')
<br><br><br><br>
<div class="container">
    <div class="pull-left text-center">
        <h1>Bé De Preu</h1>
    </div>
    <div class="row pull-right">
        <div class="col-md-12">
            <div class="panel panel-default"> {{-- Recuadre que envolta el login --}}
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">Email</label>

                            <div class="col-md-8 pull-right">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">Contrasenya</label>

                            <div class="col-md-8 pull-right">
                                <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group pull-left">
                            <div class="col-md-10 col-md-offset-2">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Recorda'm
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group pull-left">
                            <div class="col-md-10 col-md-offset-2">
                                <button type="submit" class="btn btn-primary pull-right">
                                    <i class="fa fa-btn fa-sign-in pull-right"></i>Entra
                                </button>

                                <a class="btn btn-link pull-right" href="{{ url('/password/reset') }}">Has olvidat la contrasenya?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
