function eliminarImatge(imatge) {
	imatge.remove();
	$('<input>').attr({
	    type: 'hidden',
	    name: 'idFotosEliminar[]',
	    value: imatge.id
	}).appendTo('form');
}

$( "img" )
  .error(function() {
  	var id=$( this ).attr("src").substr($( this ).attr("src").indexOf("/") + 1);
  	//console.log(id);
  	if($( this ).attr("src").substr(0, $( this ).attr("src").indexOf("/")) == "resize") {
  		$( this ).attr( "src", "resize/" + id );
  	}
  })

if($('h1').html()=="Historial de canvis") {
	$('ul.pagination').hide();

	var loading_options = {
    	msgText: "<em>Carregant més canvis...</em>",
    	finishedMsg: "<em>No hi ha més canvis</em>",
    	//msg: $('<tr><td colspan="3"><div id="infscr-loading"><img alt="Loading..." src="http://www.infinite-scroll.com/loading.gif" /><div><em>Carregant més canvis...</em></div></div></td></tr>')
    	//msg: $('<tr><td colspan="3"><div id="infscr-loading"><img /><div><em>Carregant més canvis...</em></div></div></td></tr>')
    	msg: $('<tr><td colspan="5" style="text-align: center;"><div id="infscr-loading"><img alt="Loading..." src="http://www.infinite-scroll.com/loading.gif" /><div><em></em></div></div></td></tr>')

	};

	$('tbody').infinitescroll({
		loading : loading_options,
 
	    navSelector  : "ul.pagination",            
	                   // selector for the paged navigation (it will be hidden)
	    nextSelector : "ul.pagination li.active + li a",    
	                   // selector for the NEXT link (to page 2)
	    itemSelector : "tbody tr",          
	                   // selector for all items you'll retrieve
  });
}

if($('.llistaproductes').length) {
	$('ul.pagination').hide();

	var loading_options = {
    	finishedMsg: "<em>No hi ha més productes</em>",
    	msg: $('<div style="text-align: center;"><div id="infscr-loading"><img alt="Loading..." src="http://www.infinite-scroll.com/loading.gif" /><div><em></em></div></div></div>')
	};

	$('.llistaproductes').infinitescroll({
		loading : loading_options,

		navSelector  : "ul.pagination",            
		               // selector for the paged navigation (it will be hidden)
		nextSelector : "ul.pagination li.active + li a",    
		               // selector for the NEXT link (to page 2)
		itemSelector : ".llistaproductes li",
		               // selector for all items you'll retrieve
		}, jquery_productes
	);

	// buscador
	var url_buscador=public_url+"/buscador/";
	var url_imatge=public_url+"/resize/";

	$('#buscador').keyup(function() {
		if($('#buscador').val().length>0) {
			buscar();
		}
		else{
			$('#resultatsBuscador').html('');
		}
	});

	function buscar() {
		$.ajax({
			url : url_buscador + $('#buscador').val(),
			success : function(dades) {
				articles=dades.data;
				var html="<table class='table table-hover'>";
				for(var i=0;i<articles.length;i++) {
					//console.log(articles[i].imatges[0])
					html+="<tr>";
					html+="<td>" + "<img src='"  + url_imatge + articles[i].imatges[0].id + "' height='30'/></td>";
					html+="<td>" + articles[i].NomArt + "</td>";
					html+="<td>" + articles[i].preu + "€</td>";
					html+="</tr>";
				}
				html+="</table>";
				$('#resultatsBuscador').html(html);
			}
		});
	}
}

if($('#articles-table').length) {
	function botoEliminar() {
		$('input[type="checkbox"]').each(function(){
			if(this.checked) {
				$('#botoEliminar').prop("disabled", false);
				return false;
			}
			$('#botoEliminar').prop("disabled", true);
		})
	}

	$('input[type="checkbox"]').each(function() {
		$(this).change(function() {
			botoEliminar();
		})
	})
}