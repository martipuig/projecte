<div>&nbsp;</div>

<input class="search form-control" placeholder="Buscar" id="searchTerm" type="text">

<div>&nbsp;</div>

<table class="table table-responsive" id="articles-table">
    <thead>
        <th>Nom</th>
        <th>Preu</th>
    </thead>
    <tbody>
    @foreach($articles as $article)
        <tr class="Fila_Article">
            <td>{!! $article->NomArt !!}</td>
            <td>{!! $article->preu !!}</td>  
            <td style="display:none;">{{!! $article->descripcio !!}}</td>
       </tr>
       <tr class="hiddenRow">
                <td colspan="2">
                    <div class="container">
                        {{ $article->descripcio }}
                        {!! Form::open(['route' => ['articles.destroy', $article->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{!! route('articles.show', [$article->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                                <a href="{!! route('articles.edit', [$article->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs']) !!}
                            </div>
                        {!! Form::close() !!}
                    </div>
                </td>
            </tr>
    @endforeach
    </tbody>
</table>