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
}