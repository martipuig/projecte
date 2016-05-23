<div>&nbsp;</div>

<input class="search form-control" placeholder="Buscar" id="searchTerm" type="text">

<div>&nbsp;</div>

<table class="table table-responsive tablesorter" id="articles-table">
    <thead>
        <th id="Nom">Nom</th>
        <th id="Preu">Preu</th>
    </thead>
    <tbody>
    {!! Form::open(['url' => 'multidestroy', 'method' => 'POST']) !!}
    @foreach($articles as $article)
        <tr class="Fila_Article">
            <td>{!! $article->NomArt !!}</td>
            <td>{!! $article->preu !!}</td> 
            <td style="display:none;">{{!! $article->estat !!}}</td>
            <td style="display:none;">{{!! $article->descripcio !!}}</td>
       </tr>
       <tr class="expand-child Fila_Articles">
                <td colspan="2">
                    <div>&nbsp;</div>
                    <div class="container text-center">
                        {{ $article->descripcio }}
                    </div>
                       {{-- {!! Form::open(['route' => ['articles.destroy', $article->id], 'method' => 'delete']) !!} --}}
                        <div>&nbsp;</div>
                            <div class='btn-group pull-right'>
                                <a href="{!! route('articles.show', [$article->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                                <a href="{!! route('articles.edit', [$article->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                                <input type="checkbox" name="ArticleBorrar[]" id="{!!$article->id!!}" value="{!!$article->id!!}" />
                                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs']) !!}
                            </div>    
                </td>
            </tr>
    @endforeach
    {!! Form::submit('Delete', array('class'=>'btn btn-primary')) !!}
    {!! Form::close() !!}
    </tbody>
</table>
<script type="text/javascript">
$("input:checkbox").change(function() {
    var Obj={};
    Obj.Marcats=[];
    Obj.NoMarcats=[];

    $("input:checkbox").each(function(){
        var $this = $(this);

        if($this.is(":checked")){
            Obj.Marcats.push($this.attr("id"));
        }else{
            Obj.NoMarcats.push($this.attr("id"));
        }
            
    });
    $.ajax({
        type: "POST",
        url: "{{URL::to('/multidestroy')}}",
        data: Obj.Marcats,
        success: function( result ) {
            console.log( result ); //please post output of this
        }
    });
});
</script>