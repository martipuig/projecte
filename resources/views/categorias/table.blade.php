<link href="{!! asset('css/styles.css') !!}" media="all" rel="stylesheet" type="text/css" />
<table class="table table-responsive" id="categorias-table">
    <thead>
        <th>Nom</th>
        <th colspan="3">Acció</th>
    </thead>
    <tbody>
    @foreach($categorias as $categoria)
        <tr>
            <td>{!! $categoria->NomCat !!}</td>
            <td>
                {!! Form::open(['route' => ['categorias.destroy', $categoria->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('categorias.show', [$categoria->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('categorias.edit', [$categoria->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs']) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>