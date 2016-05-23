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
            <script>
                selecatesp($('#cat').val());
                $('#cat').on('change', function(e){
                    var cat_id = e.target.value;
                    selecatesp(cat_id);
                });

                function selecatesp(cat_id){
                    $('#catesp').empty();
                    $.get("{{URL::to('ajax-subcat')}}/" + cat_id, function(dades){
                        console.log(dades);
                        $.each(dades, function(index, subcat){
                            $('#catesp').append('<option value="'+index+'">'+subcat+'</option>');
                        });
                    });
                };

            </script>

        {!! Form::close() !!}
    </div>
@endsection