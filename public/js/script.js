$(document).ready(function(){
	$('.regions').on('click', function(){
		var id = $(this).val();
		$.ajax({
            method: 'POST',
            url: urlD,
            data: {
                region: id,
                _token: token}
        })

		
	})
});

/*$(function() {
  	$('.regions').on('change', function(){
		console.log('hi');
	})
});*/