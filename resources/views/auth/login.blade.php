@extends('layouts.app')

@section('content')
<script type="text/javascript" src="{!! asset('js/slider.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/jssor.slider.min.js') !!}"></script>
<link href="{!! asset('css/styles.css') !!}" media="all" rel="stylesheet" type="text/css" />

<div class="container">
    <div class="pull-left text-center">
        <h1>Bé De Preu</h1>

        <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 700px; height: 400px; overflow: hidden; visibility: hidden;">
            <!-- Loading Screen -->
            <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
                <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 45%; height: 45%;"></div>
                <div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:45%;height:45%;"></div>
            </div>
            <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 700px; height: 400px; overflow: hidden;">
                <div data-p="225.00" style="display: none;">
                    <img data-u="image" src="img/slider1.jpg" />
                </div>
            
            </div>
            <!-- Bullet Navigator -->
            <div data-u="navigator" class="jssorb05" style="bottom:16px;right:16px;" data-autocenter="1">
                <!-- bullet navigator item prototype -->
                <div data-u="prototype" style="width:16px;height:16px;"></div>
            </div>
            <!-- Arrow Navigator -->
            <span data-u="arrowleft" class="jssora22l" style="top:0px;left:12px;width:40px;height:58px;" data-autocenter="2"></span>
            <span data-u="arrowright" class="jssora22r" style="top:0px;right:12px;width:40px;height:58px;" data-autocenter="2"></span>
        </div>
        <script>
            jssor_1_slider_init();
        </script>
    </div>


    <br><br><br><br><br><br><br><br><br>
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
