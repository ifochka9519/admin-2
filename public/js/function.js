$(window).scroll(function(){

	var wScroll = $(this).scrollTop();

	

	$('.hanging-clothes').css({
		'transform' : 'translate(0px, '+ wScroll/40 +'%)'
	});

	$('.hanging-tshort').css({
		'transform' : 'translate(0px, '+ wScroll/40 +'%)'
	});

	$('.stand').css({
		'transform' : 'translate(0px, -'+ wScroll/30 +'%)'
	});

	$('.stand-2').css({
		'transform' : 'translate(0px, -'+ wScroll/30 +'%)'
	});

	$('.boxing-gloves').css({
		'transform' : 'translate(0px, '+ wScroll/40 +'%)'
	});


	if (wScroll > $('#clothes-pics').offset().top - 
	($(window).height() / 1.2)) {
		
		$('#clothes-pics figure').each(function(i){

			setTimeout(function(){
				$('#clothes-pics figure').eq(i).addClass('is-showing');
			}, 150 * (i+1));
		});	
	}

	if(wScroll > $('#large-window').offset().top - $(window).height()){

		$('#large-window').css({'background-position':'center '+ (wScroll - $('#large-window').offset().top)  +'px'})

		var opacity = (wScroll - $('#large-window').offset().top + 400) / (wScroll / 5)

		$('.window-tint').css({'opacity': opacity})
	}
});