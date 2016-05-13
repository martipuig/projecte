<!-- Nomart Field -->
<div class="form-group col-sm-6">
    {!! Form::label('NomArt', 'Nom:') !!}
    {!! Form::text('NomArt', null, ['class' => 'form-control', 'maxlength' => 80]) !!}
</div>

<!-- Categoria Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('categoria_id','Categoria:') !!}
    {!! Form::select('categoria_id', $categories, null, ['class' => 'form-control']) !!}
</div>

<!-- Imatge Field -->
<div class="form-group col-sm-6">
    {!! Form::label('imatge', 'Imatge:') !!}
    {!! Form::text('imatge', null, ['class' => 'form-control']) !!}
</div>

<!-- Categoria Esps Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('categoria_esps_id','Categoria específica:') !!}
    {!! Form::select('categoria_esps_id', $categoriesEsp, null, ['class' => 'form-control']) !!}
</div>

<!-- Unitat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('unitat', 'Unitats:') !!}
    {!! Form::number('unitat', null, ['class' => 'form-control']) !!}
</div>

<!-- Mida Field -->
<div class="form-group col-sm-2">
    {!! Form::label('amplada', 'Mida:') !!}
    {!! Form::number('amplada', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-2">
    {!! Form::label('llargada', '&nbsp;') !!}
    {!! Form::number('llargada', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-2">
    {!! Form::label('alcada', '&nbsp;') !!}
    {!! Form::number('alcada', null, ['class' => 'form-control']) !!}
</div>

{{-- <!-- Amplada Field -->
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
</div> --}}

<!-- Preu Field -->
<div class="form-group col-sm-6">
    {!! Form::label('preu', 'Preu:') !!}
    {!! Form::number('preu', null, ['class' => 'form-control']) !!}
</div>

<!-- Estat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estat', 'Estat:') !!}
    {!! Form::select('estat', $estats, null, ['class' => 'form-control']) !!}
</div>

<!-- Posicio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('posicio', 'Posicio:') !!}
    {!! Form::text('posicio', null, ['class' => 'form-control']) !!}
</div>

<!-- Descripcio Field -->
<div class="form-group col-sm-12">
    {!! Form::label('descripcio', 'Descripcio:') !!}
    {!! Form::textarea('descripcio', null, ['class' => 'form-control', 'rows' => 3, 'maxlength' => 255]) !!}
</div>

<!-- Notes Field -->
<div class="form-group col-sm-12">
    {!! Form::label('notes', 'Notes:') !!}
    {!! Form::textarea('notes', null, ['class' => 'form-control', 'rows' => 3, 'maxlength' => 255]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('articles.index') !!}" class="btn btn-default">Cancel</a>
</div>
