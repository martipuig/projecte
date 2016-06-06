var url_buscador=public_url+"/buscador/";
var url_imatge=public_url+"/resize/";
var url_proddet=public_url+"/proddet/";

$("#menu-toggle").click(function (e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});

//eliminar imatge quan es clica a la vista d'editar article
function eliminarImatge(imatge) {
	imatge.remove();
	$('<input>').attr({
	    type: 'hidden',
	    name: 'idFotosEliminar[]',
	    value: imatge.id
	}).appendTo('form');
}

//quan una imatge no es carrega la torna a carregar
$( "img" )
  .error(function() {
  	var array_url=$( this ).attr("src").split("/");
  	var id=array_url.pop();
  	var m=array_url.pop();
  	if(m == "resize") {
  		$( this ).attr( "src", public_url + "/resize/" + id );
  	}
  })

//infinite scroll a la vista historial de canvis
if($('h1').html()=="Historial de canvis") {
	$('ul.pagination').hide();

	var loading_options = {
    	msgText: "<em>Carregant més canvis...</em>",
    	finishedMsg: "<em>No hi ha més canvis</em>",
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

//infinite scroll a totes les vistes que hi ha una llista amb la classe llistaproductes
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
		}, 
		function() {
			jQuery(this).find('.contentinner').stop().animate({marginTop: '132px'});
			jQuery('.llistaproductes li').hover(function(){
				jQuery(this).find('.contentinner').stop().animate({marginTop: '0px'});
			},function(){
				jQuery(this).find('.contentinner').stop().animate({marginTop: '132px'});
			});
    		for (var key in favoritosarray) {
		        $('#' + favoritosarray[key]).attr("class", "glyphicon glyphicon-heart");
			}
		}	
	);

	

	//comprova si al localStorage tenim guardats els preferits, els guarda en un array i canvia l'icona del articles preferits
	//si no crea un array per guardar els preferits
	if(localStorage.getItem("favoritos")!=null) {
		favoritosarray = JSON.parse(localStorage.getItem("favoritos"));

		for (var key in favoritosarray) {
	        $('#' + favoritosarray[key]).attr("class", "glyphicon glyphicon-heart");
		}
	}
	else {
		favoritosarray = [];
	}

	function cookieskdjhgbvkcfdhb(id){
		//si l'article no està marcat com a preferit el marca, l'agegeix a l'array de preferits i guarda l'array de preferits en format JSON al localStorage
		if (document.getElementById(id).className == "glyphicon glyphicon-heart-empty") {
			document.getElementById(id).className = "glyphicon glyphicon-heart";
			favoritosarray.push(id);
			localStorage.setItem("favoritos", JSON.stringify(favoritosarray));
		}
		//si l'article clicat estava marcat com a preferit el desmarca, l'elimina de l'array de preferits i guarda l'array de preferits en format JSON al localStorage 
		else{
			document.getElementById(id).className = "glyphicon glyphicon-heart-empty";
			for (var key in favoritosarray) {
			    if (favoritosarray[key] == id) {
			        favoritosarray.splice(key, 1);
			        localStorage.setItem("favoritos", JSON.stringify(favoritosarray));
			    }
			}
		};
	}


	if(window.location.href.indexOf("preferits") > -1) {
		//fa una peticio amb ajax enviant l'array de preferits i els articles obtinguts els afegeix a la llista, si no hi ha articles preferits mostra un missatge
		var preuTotal=0;
       $.ajax({
			url : public_url + "/ajaxpreferits/" + JSON.stringify(favoritosarray),
			success : function(articles) {
				quantitatArticles=articles.length;
				for(var i=0;i<articles.length;i++) {
					//console.log(articles[i].imatges[0].name)
					var article="<li><a href=''><img src='"  + url_imatge + articles[i].imatges[0].id + "' id='producte' alt=''/></a>";
					article+="<div class='content'>";
					article+="<div class='contentinner' style='margin-top:132px;'>";
					article+="<div>";
					article+="<span class='price'>" + articles[i].preu + "€</span>";
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
					preuTotal+=articles[i].preu;
				}
				for (var key in favoritosarray) {
			        $('#' + favoritosarray[key]).attr("class", "glyphicon glyphicon-heart");
				}
			},
			complete : function() {
				jquery_productes();
				if(quantitatArticles==0) {
					$('#divContainer').append("<div class='alert alert-warning'>No hi ha articles preferits.</div>");
				}
				else {
					$('.panel-default').show();
					$('#preutotal').append("<span>Preu total: " + preuTotal + "€</span>");
				}
			}
		});
    }
}

if(('#buscador').length) {
	//quan es deixa de premer una tecla si el camp del buscador no està buit executa la funció 
	//buscar() si no borra els resultats
	$('#buscador').keyup(function() {
		if($('#buscador').val().length>0) {
			buscar();
		}
		else{
			$('#resultatsBuscador').html('');
		}
	});

	//fa una petició amb ajax enviant el contingut del buscador, amb la resposta crea una
	//taula amb els articles 
	function buscar() {
		$.ajax({
			url : url_buscador + $('#buscador').val(),
			success : function(dades) {
				articles=dades.data;
				var html="<table class='table table-hover'>";
				for(var i=0;i<articles.length;i++) {
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

	//quan es prem la tecla enter utilitzant el buscador i el camp no està buit mostra
	//una pàgina nova amb els resultats
	$('#buscador').keypress(function(e) {
	    if(e.which == 13 && $('#buscador').val()!="") {
	        document.location = public_url + "/resultats/" + $('#buscador').val();
	    }
	});
}

if($('#articles-table').length) {
	//ordenar vista articles
	$("#articles-table").tablesorter( {sortList: [[0,0], [1,0]]} );
	$(function(){
        $('.expand-child').hide();
    })
    $(".Fila_Article").click(function(){
        $(this).next().toggle();
    }) 

    //buscador vista articles
    $(".search").keyup(function(){
        _this = this;
        $.each($(".table tbody tr"), function() {
            if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
               	$(this).hide();
            else
                $(this).show();                
        });
        var asd = $(".search").val().length;
        if(asd == 0){
            $(function(){
                $('.expand-child').hide();
            })
        }
    }); 

	//si hi ha un o mes articles seleccionats activa el boto per eliminar els articles seleccionats si no el desactiva
	function botoEliminar() {
		$('input[type="checkbox"]').each(function(){
			if(this.checked) {
				$('#botoEliminar').prop("disabled", false);
				return false;
			}
			$('#botoEliminar').prop("disabled", true);
		})
	}

	//quan es selecciona o desmarca un article executa la funció botoEliminar()
	$('input[type="checkbox"]').each(function() {
		$(this).change(function() {
			botoEliminar();
		})
	})
}

//permet marcar la posicio al planol de la vista crear o la vista d'editar un article
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

