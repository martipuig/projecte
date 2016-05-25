jQuery(document).ready(jquery_productes);

function jquery_productes(){
	jQuery(this).find('.contentinner').stop().animate({marginTop: '132px'});
	jQuery('.llistaproductes li').hover(function(){
		jQuery(this).find('.contentinner').stop().animate({marginTop: '0px'});
	},function(){
		jQuery(this).find('.contentinner').stop().animate({marginTop: '132px'});
	});
}