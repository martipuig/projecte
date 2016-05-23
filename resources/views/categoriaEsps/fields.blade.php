@if(Auth::check()) 
    {{ Form::hidden('usuariMod', Auth::user()->name) }}
@endif

<!-- Nomesp Field -->
<div class="form-group col-sm-6">
    {!! Form::label('NomEsp', 'Nom:') !!}
    {!! Form::text('NomEsp', null, ['class' => 'form-control']) !!}
</div>

<!-- Categoria Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('categoria_id','Categoria:') !!}
    {!! Form::select('categoria_id', $categories, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('categoriaEsps.index') !!}" class="btn btn-default">Cancel</a>
</div>
