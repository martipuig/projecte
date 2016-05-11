<table class="table table-responsive" id="articles-table">
    <thead>
        <th>Nomart</th>
        <th>Categoria Id</th>
        <th>Categoria Esps Id</th>
        <th>Descripcio</th>
        <th>Unitat</th>
        <th>Amplada</th>
        <th>Llargada</th>
        <th>Alcada</th>
        <th>Preu</th>
        <th>Estat</th>
        <th>Notes</th>
        <th>Usuarimod</th>
        <th>Posicio</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($articles as $article)
        <tr>
            <td>{!! $article->NomArt !!}</td>
            <td>{!! $article->categoria_id !!}</td>
            <td>{!! $article->categoria_esps_id !!}</td>
            <td>{!! $article->descripcio !!}</td>
            <td>{!! $article->unitat !!}</td>
            <td>{!! $article->amplada !!}</td>
            <td>{!! $article->llargada !!}</td>
            <td>{!! $article->alcada !!}</td>
            <td>{!! $article->preu !!}</td>
            <td>{!! $article->estat !!}</td>
            <td>{!! $article->notes !!}</td>
            <td>{!! $article->usuariMod !!}</td>
            <td>{!! $article->posicio !!}</td>
            <td>
                {!! Form::open(['route' => ['articles.destroy', $article->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('articles.show', [$article->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('articles.edit', [$article->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>