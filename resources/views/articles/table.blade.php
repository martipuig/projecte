<link href="{!! asset('css/styles.css') !!}" media="all" rel="stylesheet" type="text/css" />
<div>&nbsp;</div>

<input class="search form-control" placeholder="Buscar" id="searchTerm" type="text">

<div>&nbsp;</div>

{!! Form::open(['url' => 'multidestroy']) !!}

<table class="table table-responsive tablesorter" id="articles-table">
    <thead>
        <th id="Nom">Nom</th>
        <th id="Preu">Preu</th>
        <th id="operacio" class="text-right">Operació</th>
    </thead>
    <tbody>
    @foreach($articles as $article)
        <tr class="Fila_Article">
            <td>{!! $article->NomArt !!}</td>
            <td>{!! $article->preu !!}€</td>
            <td>
                <div class='btn-group pull-right'>
                    <a href="{!! route('articles.show', [$article->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('articles.edit', [$article->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    <a href="{!!URL::to('destroy')!!}/{!!$article->id!!}" class='btn btn-danger btn-xs'><i class="glyphicon glyphicon-trash"></i></a>
                    <input type="checkbox" name="ArticleBorrar[]" id="{!!$article->id!!}" value="{!!$article->id!!}" />
                </div> 
            </td> 
            <td style="display:none;">{{!! $article->estat !!}}</td>
            <td style="display:none;">{{!! $article->descripcio !!}}</td>
       </tr>
       <tr class="expand-child Fila_Articles">
            <td colspan="3">
                <div>&nbsp;</div>
                <div class="text-center">
                    {{ $article->descripcio }}
                </div>
                <div>&nbsp;</div>
            </td>
        </tr>
    @endforeach
    {!! Form::submit('Eliminar seleccionats', array('class'=>'btn btn-primary', 'id'=>'botoEliminar', 'disabled')) !!}
    {!! Form::close() !!}
    </tbody>
</table>