<!-- Nomart Field -->
<div class="form-group col-sm-6">
    {!! Form::label('NomArt', 'Nom:') !!}
    {!! Form::text('NomArt', null, ['class' => 'form-control']) !!}
</div>

<!-- Categoria Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('categoria','Categoria:') !!}
    {!! Form::select('categories', $categories, $categories_seleccionades, ['class' => 'form-control']) !!}
</div>

<!-- Categoria Esps Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('categoria_esps_id', 'Categoria Esps Id:') !!}
    {!! Form::text('categoria_esps_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Unitat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('unitat', 'Unitats:') !!}
    {!! Form::text('unitat', null, ['class' => 'form-control']) !!}
</div>

<!-- Amplada Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amplada', 'Amplada:') !!}
    {!! Form::text('amplada', null, ['class' => 'form-control']) !!}
</div>

<!-- Llargada Field -->
<div class="form-group col-sm-6">
    {!! Form::label('llargada', 'Llargada:') !!}
    {!! Form::text('llargada', null, ['class' => 'form-control']) !!}
</div>

<!-- Alcada Field -->
<div class="form-group col-sm-6">
    {!! Form::label('alcada', 'Alçada:') !!}
    {!! Form::text('alcada', null, ['class' => 'form-control']) !!}
</div>

<!-- Preu Field -->
<div class="form-group col-sm-6">
    {!! Form::label('preu', 'Preu:') !!}
    {!! Form::text('preu', null, ['class' => 'form-control']) !!}
</div>

<!-- Estat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estat', 'Estat:') !!}
    {!! Form::text('estat', null, ['class' => 'form-control']) !!}
</div>

<!-- Notes Field -->
<div class="form-group col-sm-6">
    {!! Form::label('notes', 'Notes:') !!}
    {!! Form::text('notes', null, ['class' => 'form-control']) !!}
</div>


<!-- Posicio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('posicio', 'Posicio:') !!}
    {!! Form::text('posicio', null, ['class' => 'form-control']) !!}
</div>

<!-- Descripcio Field -->
<div class="form-group col-sm-12">
    {!! Form::label('descripcio', 'Descripcio:') !!}
    {!! Form::text('descripcio', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('articles.index') !!}" class="btn btn-default">Cancel</a>
</div>
