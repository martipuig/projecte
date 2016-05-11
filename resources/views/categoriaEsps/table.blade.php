<table class="table table-responsive" id="categoriaEsps-table">
    <thead>
        <th>Nomesp</th>
        <th>Categoria Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($categoriaEsps as $categoriaEsp)
        <tr>
            <td>{!! $categoriaEsp->NomEsp !!}</td>
            <td>{!! $categoriaEsp->categoria_id !!}</td>
            <td>
                {!! Form::open(['route' => ['categoriaEsps.destroy', $categoriaEsp->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('categoriaEsps.show', [$categoriaEsp->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('categoriaEsps.edit', [$categoriaEsp->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>