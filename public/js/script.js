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

$(document).one('ready',function(){
    
});

//Funcio de cookies/favoritos
var favoritosarray = [];
if (localStorage.getItem("favoritos") != null) {
	var retrievedData = localStorage.getItem("favoritos");
	var favoritosarray = JSON.parse(retrievedData);
	var hola = 1000;
	$.ajax({
	    type: "POST",
        url: 'preferits',
        data: {'hola' : hola},
        success: function() {
            console.log("Geodata sent");
        },
        error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
        console.log(JSON.stringify(jqXHR));
        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
    }
    });
	for (var key in favoritosarray) {
        document.getElementById(favoritosarray[key]).className = "glyphicon glyphicon-heart";
	}
};
function cookieskdjhgbvkcfdhb(id){
	if (document.getElementById(id).className == "glyphicon glyphicon-heart-empty") {
		document.getElementById(id).className = "glyphicon glyphicon-heart";
		favoritosarray.push(id);
		localStorage.setItem("favoritos", JSON.stringify(favoritosarray));
	}else{
		document.getElementById(id).className = "glyphicon glyphicon-heart-empty";
		for (var key in favoritosarray) {
		    if (favoritosarray[key] == id) {
		        favoritosarray.splice(key, 1);
		        localStorage.setItem("favoritos", JSON.stringify(favoritosarray));
		    }
		}
	};
}

console.log(favoritosarray);