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
  	var array_url=$( this ).attr("src").split("/");
  	//console.log(array_url);
  	var id=array_url.pop();
  	var m=array_url.pop();
  	// console.log(id)
  	// console.log(m);
  	if(m == "resize") {
  		$( this ).attr( "src", public_url + "/resize/" + id );
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
	var url_proddet=public_url+"/proddet/";

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
				//console.log(dades)
				var html="<table class='table table-hover'>";
				for(var i=0;i<articles.length;i++) {
					//console.log(articles[i].imatges[0])
					html+="<tr onclick='document.location = \"" + url_proddet + articles[i].id +"\";'>";
					html+="<td>" + "<img src='"  + url_imatge + articles[i].imatges[0].id + "' height='30'/></td>";
					html+="<td>" + articles[i].NomArt + "</td>";
					html+="<td>" + articles[i].preu + "€</td>";
					html+="</tr>";
				}
				html+="</table>";
				$('#resultatsBuscador').html(html);
				if(dades.next_page_url) {
					$('#resultatsBuscador').append("<a href='" + public_url + "/resultats/" + $('#buscador').val() + "'>Més resultats</>");
				}
			}
		});
	}

	$('#buscador').keypress(function(e) {
	    if(e.which == 13 && $('#buscador').val()!="") {
	        document.location = public_url + "/resultats/" + $('#buscador').val();
	    }
	});

	//preferits
	if(localStorage.getItem("favoritos")!=null) {
		favoritosarray = JSON.parse(localStorage.getItem("favoritos"));

		for (var key in favoritosarray) {
	        $('#' + favoritosarray[key]).attr("class", "glyphicon glyphicon-heart");
		}
	}
	else {
		favoritosarray = [];
	}

	//console.log(favoritosarray);

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

	// function mostrarPreferits() {
	// 	var url = public_url + "/preferits";
	// 	var form = $('<form action="' + url + '" method="post">' +
 //  		'<input type="hidden" name="preferits" value="' + JSON.stringify(favoritosarray) + '" />' +
 //  		'<input type="hidden" name="_token" value="' +	token_laravel + '"/></form>');
 //  		$('body').append(form);
	// 	form.submit();
	// }

	if(window.location.href.indexOf("preferits") > -1) {
       $.ajax({
			url : public_url + "/ajaxpreferits/" + JSON.stringify(favoritosarray),
			success : function(articles) {
				//console.log(articles)
				for(var i=0;i<articles.length;i++) {
					//console.log(articles[i].imatges[0].name)
					var article="<li><a href=''><img src='"  + url_imatge + articles[i].imatges[0].id + "' id='producte' alt=''/></a>";
					article+="<div class='content'>";
					article+="<div class='contentinner' style='margin-top:132px;'>";
					article+="<div>";
					article+="<span class='price'>" + articles[i].preu + "</span>";
					article+="<a href='' class='title'>" + articles[i].NomArt + "</a>";
					article+="</div>";
					article+="<p class='desc'>" + articles[i].descripcio + "</p>";
					article+="<span class='input-group-btn text-center'>";
					article+="<div class='btn-group'>";
					article+="<a href='" + public_url + "/proddet/" + articles[i].id + "' class='btn btn-default btn-xs'><i class='glyphicon glyphicon-eye-open'></i></a>";
					article+="<a onclick='cookieskdjhgbvkcfdhb(" + articles[i].id + ")' class='btn btn-default btn-xs'><i id='" + articles[i].id + "'class='glyphicon glyphicon-heart-empty'></i></a>";
					article+="</div>";
					article+="</span>";
					article+="</div>";
					article+="</div>";
					article+="</li>";
					$('.llistaproductes').append(article);
				}
				for (var key in favoritosarray) {
			        $('#' + favoritosarray[key]).attr("class", "glyphicon glyphicon-heart");
				}
			},
			complete : function() {
				jquery_productes();
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

if($('#mapaplanol').length) {
	$('#mapaplanol').imageMapResize();
	$('#planol').maphilight();

	$(window).on('resize', function() {
		$('#mapaplanol').imageMapResize();
		$('#planol').maphilight();
		pintarPosicioGuardada();
	});

	if(typeof posicioGuardada!=='undefined' && posicioGuardada>0) {
		pintarPosicioGuardada();
	}

	function pintarPosicioGuardada() {
		$('area').each(function() {
			if($(this).attr('data-posicio')==posicioGuardada) {
				$('.active_area').data('maphilight',{alwaysOn:false}).trigger('alwaysOn.maphilight');           
			    $(this).addClass('active_area').data('maphilight',{alwaysOn:true}).trigger('alwaysOn.maphilight');
				return false;
			}
		})
	}

	$('area').click(function(){
        var posicio=$(this).attr('data-posicio');
        posicioGuardada=posicio;
        $('form').append("<input type='hidden' name='posicio' value='"+ posicio +"'/>");

        $('.active_area').data('maphilight',{alwaysOn:false}).trigger('alwaysOn.maphilight');           
        $(this).addClass('active_area').data('maphilight',{alwaysOn:true}).trigger('alwaysOn.maphilight');
		return false;
	})
}

