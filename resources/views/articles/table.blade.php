<table class="table table-responsive" id="articles-table">
    <thead>
        <th>Nom Producte</th>
        <th>Preu</th>
    </thead>
    <tbody>
    @foreach($articles as $article)
        <tr class="Fila_Article">
            <td>{!! $article->NomArt !!}</td>
            <td>{!! $article->preu !!}</td>  
            <tr class="hiddenRow">
                <td colspan="2">
                    <div class="container">
                        {{ $article->notes }}
                        {!! Form::open(['route' => ['articles.destroy', $article->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{!! route('articles.show', [$article->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                                <a href="{!! route('articles.edit', [$article->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                            </div>
                        {!! Form::close() !!}
                    </div>
                </td>
            </tr>
       </tr>
    @endforeach
    </tbody>
</table>