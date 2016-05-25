function eliminarImatge(imatge) {
	imatge.remove();
	$('<input>').attr({
	    type: 'hidden',
	    name: 'idFotosEliminar[]',
	    value: imatge.id
	}).appendTo('form');
}

$('.llistaproductes').infinitescroll({

	navSelector  : "ul.pagination",            
	               // selector for the paged navigation (it will be hidden)
	nextSelector : "ul.pagination li:active + li a",    
	               // selector for the NEXT link (to page 2)
	itemSelector : ".llistaproductes li",
	               // selector for all items you'll retrieve
});